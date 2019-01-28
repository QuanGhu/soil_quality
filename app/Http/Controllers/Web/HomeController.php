<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Properties;
use App\Models\Criteria;
use App\Models\Analyze;
use App\Models\Users;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::user()->id == 1)
        {
            return view('home.index')
                ->with('totalProperty', Properties::count())
                ->with('totalCriteria', Criteria::count())
                ->with('totalAnalyze', Analyze::count())
                ->with('totalUser', Users::count());
        } else {
            return view('home.index');
        }
    }

    public function myProfile()
    {
        return view('home.myprofile');
    }
}
