<?php

namespace App\Http\Controllers\Web\Soil;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SolutionController extends Controller
{
    public function index()
    {
        return view('admin.solution.index');
    }
}
