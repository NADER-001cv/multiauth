<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;


class MultiauthController extends Controller
{
    

    public function site(){

        return view('site');

    }

    public function admin(){

        return view('admin');

    }
    public function loginadmin(){

        return view('auth.loginadmin');

    }
         

    public function authenticate(Request  $request ){

        $validatedData = $request->validate([
            'email' => 'required|unique:admins|max:255',
            'password' => 'required|min:6',
        ]);

           
                  // dd($request->all()) ;
       if (Auth::guard('admin')->attempt([

        'email'  =>  $request->email,
        'password'  => $request->password
       ]) ) {
          return redirect() ->route('admin');
      }
                 return back()-> withInput($request ->only('email')) ;

            return view('auth.adminlogin') ;


    }






}
