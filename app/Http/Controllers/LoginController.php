<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;

class LoginController extends Controller
{
    public function login(){
    	return view('authentication.login');
    }

     public function postLogin(Request $request){
    	//dd($request->all());
    	Sentinel::authenticate($request->all());
        if(Sentinel::getUser()->roles()->first()->slug=='admin')
    	   return redirect('/earnings');
        elseif(Sentinel::getUser()->roles()->first()->slug =='manager')
            return redirect('/tasks');
    }
    public function logout(){
    	Sentinel::logout();
    	return redirect('/login');
    }
}
