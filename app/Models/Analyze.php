<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Analyze extends Model
{
    protected $table = 'analyze';

    protected $fillable = [
        'result','user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\Users','user_id');
    }

    public function subAnalyzes()
    {
        return $this->hasMany('App\Models\SubAnalyze','analyze_id');
    }
}
