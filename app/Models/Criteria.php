<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    protected $table = 'soil_criteria';

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

    public function criterias()
    {
        return $this->hasMany('App\Models\Rule','soil_criteria_id');
    }
}
