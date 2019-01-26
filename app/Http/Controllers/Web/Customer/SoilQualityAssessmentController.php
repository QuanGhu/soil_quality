<?php

namespace App\Http\Controllers\Web\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Criteria;

class SoilQualityAssessmentController extends Controller
{
    public function index()
    {
        return view('user.soilform.index');
    }

    public function new()
    {
        return view('user.soilform.new')
        ->with('criterias', Criteria::all());
    }
}
