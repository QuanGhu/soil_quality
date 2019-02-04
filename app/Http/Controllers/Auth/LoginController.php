<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/penilaian/new';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginView()
    {
        return view('auth.login');
    }

    public function adminLoginView()
    {

        return view('auth.loginadmin');
    }

    public function loginForUser(Request $request)
    {
        if(Auth::attempt(['email' => request('email'),'password' => request('password'),'user_level_id' => 2]))
        {
            $user = Auth::user();

            return redirect()->route('customer.new');
        } else {
            return redirect()->back()->with('danger','Email / Password Salah');
        }
    }

    public function loginForAdmin(Request $request)
    {
        if(Auth::attempt(['email' => request('email'),'password' => request('password'),'user_level_id' => 1]))
        {
            $user = Auth::user();

            return redirect()->route('home');
        } else {
            return redirect()->back()->with('danger','Email / Password Salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.view');
    }
}
