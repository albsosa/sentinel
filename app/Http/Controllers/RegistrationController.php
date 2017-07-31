<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;

class RegistrationController extends Controller
{
    public function register()
    {
    	return view('authentication.register');
    }
     public function postRegister(Request $request)
    {
        //se crea al usuario
    	$user= Sentinel::registerAndActivate($request->all());
    	//dd($user);

        //y se asigna el role 
        $role= Sentinel::findRoleBySlug('manager');
        //Esto se esta haciendo para una relación correcta

        $role->users()->attach($user);
    	return redirect('/');
    }
}
