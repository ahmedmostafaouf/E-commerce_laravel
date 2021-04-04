<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use App\Http\Requests\AdminLogin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class AdminController extends Controller
{


    public function index($id)
    {
        if(view()->exists($id)){
            return view($id);
        }
        else
        {
            return view('404');
        }


    }


    public function getDashboard(){
        return view('admin.dashboard');
    }


    public function login()
    {
        return view('admin.auth.login');
    }

    public function logged(Request $request)
    {
        $pass = $request->input('password');
        $email=$request->input('email');
        if (auth()->guard('admin')->attempt(['email'=>$email, 'password'=>$pass])){
           return view('admin.dashboard');
        }
        return redirect()->back()->with(['error'=>'حدث خطأ ما اعد كتابه البيانات مره اخري']);

    }


    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
