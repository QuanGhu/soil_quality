<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    protected $table = 'soil_properties_to_criteria';

    protected $fillable = [
        'soil_properties_id','soil_criteria_id'
    ];

    public function property()
    {
        return $this->belongsTo('App\Models\Properties','soil_properties_id');
    }

    public function criteria()
    {
        return $this->belongsTo('App\Models\Criteria','soil_criteria_id');
    }
}
