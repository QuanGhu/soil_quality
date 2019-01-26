<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    protected $table = 'soil_properties';

    protected $fillable = [
        'code_name','name'
    ];

    public function causes()
    {
        return $this->hasMany('App\Models\Causes','soil_properties_id');
    }

    public function solutions()
    {
        return $this->hasMany('App\Models\Solution','soil_properties_id');
    }
}
