<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;


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
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function Login(){
        if ((Auth::user() == true) && (Auth::user()->role >= 1) && (Auth::user()->active == 0)) {
            return redirect()->route('Admin.cp');
        }
        else {
           return view('auth.login');
        }
    }
    public function PostLogin(Request $rq){
    
         if (Auth::attempt(['name_login' => $rq->name, 'password' => $rq->password, 'role' => 1, 'active' => 0], $rq->remember)
             || Auth::attempt(['email' => $rq->name, 'password' => $rq->password, 'role' => 1, 'active' => 0], $rq->remember)
             || Auth::attempt(['name_login' => $rq->name, 'password' => $rq->password, 'role' => 2, 'active' => 0], $rq->remember)
             || Auth::attempt(['email' => $rq->name, 'password' => $rq->password, 'role' => 2, 'active' => 0], $rq->remember))
             {
                 return redirect()->route('Admin.cp');
             }
            elseif (Auth::attempt(['name_login' => $rq->name, 'password' => $rq->password, 'role' => 1, 'active' => 1], $rq->remember)
                || Auth::attempt(['email' => $rq->name, 'password' => $rq->password, 'role' => 1, 'active' => 1], $rq->remember
                || Auth::attempt(['name_login' => $rq->name, 'password' => $rq->password, 'role' => 2, 'active' => 1], $rq->remember)
                || Auth::attempt(['email' => $rq->name, 'password' => $rq->password, 'role' => 2, 'active' => 1], $rq->remember))
                    )
            {
                Auth::logout();
                return redirect()->route('login')->with('errMsg', "T??i kho???n c???a b???n t???m th???i b??? kh??a!");
            }
            elseif ($rq->name == '' || $rq->password == '') {
                return redirect()->route('login')->with('errMsg', "Nh???p t??n ????ng nh???p ho???c m???t kh???u!");
            }

             else{
                return redirect()->route('login')->with('errMsg', "Sai t??n ????ng nh???p ho???c m???t kh???u!");
            }
    }

    function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
