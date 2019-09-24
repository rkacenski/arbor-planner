<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estimate;

class Manager extends Controller
{
    public function main() {
        return \Inertia\Inertia::render('Manager/Main', [
            'estimates' => Estimate::all()
        ]);
    }

    public function createEstimate(Request $req) {
        $e = $req->input();
        $e['status'] = 'new';
        return Estimate::create($e);
    }

    public function work() {
        return \Inertia\Inertia::render('Manager/Work', [
            'work_orders' => \App\WorkOrder::with('estimate')->get()
        ]);
    }

    public function createWorkOrder(Request $req) {
        $estimate = Estimate::find($req->input('estimate'));
        $estimate->status = 'ordered';
        $estimate->save();
        
        $form = $req->input('form');
        $form['status'] = 'new';
        $work = \App\WorkOrder::create($form);
        $work->estimate()->save($estimate);
    }
}
