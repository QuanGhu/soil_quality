<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    protected $table = 'soil_properties';

    protected $fillable = [
        'code_name','name'
    ];

    public function getCodeNameAttribute($value)
    {
        return ucwords($value);
    }

    public function setCodeNameAttribute($value)
    {
        $this->attributes['code_name'] = strtolower($value);
    }

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    public function causes()
    {
        return $this->hasMany('App\Models\Causes','soil_properties_id');
    }

    public function solutions()
    {
        return $this->hasMany('App\Models\Solution','soil_properties_id');
    }

    public function rules()
    {
        return $this->hasMany('App\Models\Rule','soil_properties_id');
    }
}
