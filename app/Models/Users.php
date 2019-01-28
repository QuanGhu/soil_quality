<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    protected $table = 'users';

    protected $fillable = [
        'name', 'gender', 'address', 'username','email','password','user_level_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function level()
    {
        return $this->belongsTo('App\Models\Level','user_level_id');
    }

    public function analyzes()
    {
        return $this->hasMany('App\Models\Analyze','user_id');
    }
}
