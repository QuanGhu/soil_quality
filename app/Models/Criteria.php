<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    protected $table = 'soil_criteria';

    protected $fillable = [
        'code_name','name'
    ];
}
