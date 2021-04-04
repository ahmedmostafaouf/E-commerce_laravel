<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\LoginRequest;
use App\Http\Requests\Front\RegisterRequest;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{



    public function getUserLogin_register(){
        return view('webSite.auth.login_register');
    }
    public function Login(LoginRequest $request){
        if(auth()->guard('web')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){
            return redirect()->route('get.home');
        }
        return redirect()->back()->with(['success'=>'Error Found Or email And Password Not match']);
    }
    public function register(RegisterRequest $request){
        $request_data=$request->except(['password']);
        $request_data['password']=Hash::make($request->get('password'));
        $Students=User::create($request_data);
        return redirect()->route('get.front.login')->with(['success'=>'Add Successfully']);
    }
}
