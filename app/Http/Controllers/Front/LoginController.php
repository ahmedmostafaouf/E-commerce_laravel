<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\LoginRequest;
use App\Http\Requests\Front\RegisterRequest;
use App\Models\User;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use RegistersUsers;
    protected $redirectTo = RouteServiceProvider::Profile;
    public function __construct()
    {
        $this->middleware('guest');
    }



    public function getUserLogin_register(){
        return view('webSite.auth.login_register');
    }
    public function Login(LoginRequest $request){
        if(auth()->guard('web')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){
            return redirect()->route('get.account')->with(['success'=>'Login Successfully']);
        }
        return redirect()->back()->with(['error'=>'Error Found Or email And Password Not match']);
    }
    public function register(RegisterRequest $request){
        $request_data=$request->except(['password']);
        $request_data['password']=Hash::make($request->get('password'));
        $Students=User::create($request_data);

        return redirect(RouteServiceProvider::Profile)->with(['success'=>'Add Successfully']);
    }
}
