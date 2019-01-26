<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    protected $table = 'solution_to_soil_properties';

    protected $fillable = [
        'name','soil_properties_id'
    ];

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    public function soilProperty()
    {
        return $this->belongsTo('App\Models\Properties','soil_properties_id');
    }
}
