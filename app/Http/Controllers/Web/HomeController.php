<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Properties;
use App\Models\Criteria;
use App\Models\Analyze;
use App\Models\Users;
use Auth;
use Validator;
use Hash;

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
            return view('home.index')
                ->with('anaylises', Analyze::where('user_id', Auth::user()->id )->orderBy('id', 'desc')->take(10)->get());
        }
    }

    public function myProfile()
    {
        return view('home.myprofile');
    }

    public function editProfileView()
    {
        return view('home.changeprofile');
    }

    public function changePasswordView()
    {
        return view('home.changepassword');
    }

    public function changePasswordProcess(Request $request)
    {
        try {

            $validate = Validator::make($request->all(),[
                'old_password' => 'required',
                'new_password' => 'required'
            ]);

            if ($validate->fails())
                return redirect()->back()->withErrors($validate);
            
            $checkUser = Users::Where('id', Auth::user()->id )->first();
            if(Hash::check($request->old_password, $checkUser->password))
            {
                $updatePassword = Users::where('id', Auth::user()->id)->update(['password' => bcrypt($request->new_password)]);

                return $updatePassword 
                    ? redirect()->route('myprofile')->with('success','Password Berhasil Diperbaruhi')
                    : redirect()->back()->with('danger','Gagal');
            }
            else {
                return redirect()->back()->with('danger','Password Lama Salah');
            }
            
        }
        catch (\Exception $e) {
            return redirect()->back()->with('danger',$e->getMessages());
        }
    }

    public function changeProfile(Request $request)
    {
        try {

            $validate = Validator::make($request->all(),[
                'name' => 'required|string|min:3',
                'email' => 'required|email|unique:users,email,'.Auth::user()->id,
                'address' => 'required|string|min:6',
                'gender' => 'required'
            ]);

            if ($validate->fails())
                return redirect()->back()->withErrors($validate);

            $data = $request->except('_token','_method');
            $update = Users::where('id', Auth::user()->id)->update($data);
            
            return $update 
                    ? redirect()->route('myprofile')->with('success','Profil Berhasil Diperbaruhi')
                    : redirect()->back()->with('danger','Gagal');
        }
        catch (\Exception $e) {
            return redirect()->back()->with('danger',$e->getMessages());
        }
    }
}
