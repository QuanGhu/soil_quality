<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubAnalyze extends Model
{
    protected $table = 'analyze_sub';

    protected $fillable = [
        'analyze_id','soil_criteria'
    ];

    public function analyze()
    {
        return $this->belongsTo('App\Models\Analyze','analyze_id');
    }
}
