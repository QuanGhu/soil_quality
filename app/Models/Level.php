<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'user_level';

    protected $fillable = [
        'name'
    ];

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    public function users()
    {
        return $this->hasMany('App\Models\Users','user_level_id');
    }
}
