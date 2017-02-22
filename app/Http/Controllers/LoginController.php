<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;

class LoginController extends Controller
{
    public function login()
    {
        return view('authentication.login');
    }

    public function postlogin(Request $request)
    {
        Sentinel::authenticate($request->all());
         $slug = Sentinel::getUser()->roles()->first()->slug;
          if($slug =='admin')
            return redirect('/ernings');
          elseif($slug =='manager')
            return redirect('/tasks');
    }

    public function logout()
    {
        Sentinel::logout();
        return redirect('/login');
    }
}
