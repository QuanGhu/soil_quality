<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Causes extends Model
{
    protected $table = 'causes_of_soil_properties';

    protected $fillable = [
        'name','soil_properties_id'
    ];

    public function soilProperty()
    {
        return $this->belongsTo('App\Models\Properties','soil_properties_id');
    }
}
