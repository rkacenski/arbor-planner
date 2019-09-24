<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    protected $guarded = [];

    protected $casts = [
        'equipment' => 'array'
    ];
    
    public function estimate() {
        return $this->hasOne('App\Estimate');
    }
}
