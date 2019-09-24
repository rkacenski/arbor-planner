<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    protected $dates = [ 'date_needed' ];
    protected $guarded = [];
    protected $casts = [
        'cords' => 'array'
    ];

    public function workOrder() {
        return $this->belongsTo('App\WorkOrder');
    }
}
