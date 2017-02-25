<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;

class LoginController extends Controller
{
    public function login()
    {
        return view('authentication.login');
    }

    public function postlogin(Request $request)
    {
        try {
            $rememberMe = false;

            if(isset($request->remember_me))
                $rememberMe = true;

            if (Sentinel::authenticate($request->all(), $rememberMe)) {
                $slug = Sentinel::getUser()->roles()->first()->slug;
                if($slug =='admin')
                    return redirect('/ernings');
                elseif($slug =='manager')
                    return redirect('/tasks');
            }else{
                return redirect()->back()->withError('Wrong credentials');
            }
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            return redirect()->back()->withError("You are banned for $delay second");
        } catch(NotActivatedException $e){
            return redirect()->back()->withError("Your account is not activated");
        }

    }

    public function logout()
    {
        Sentinel::logout();
        return redirect('/login');
    }
}
