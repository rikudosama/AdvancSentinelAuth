<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Reminder;
use Mail;
use Sentinel;

class forgotPasswordController extends Controller
{
    public function forgotPassword()
    {
        return view('authentication.forgot-password');
    }

    public function postForgotPassword(Request $request)
    {
        $user = User::whereEmail($request->email)->first();

        if(count($user) ==0)
            return redirect()->back()->whithSuccess('Reset code has been send to your email');
        $reminder = Reminder::exists($user) ?: Reminder::create($user);

        $this->sendEmail($user, $reminder->code);
        return redirect()->back()->withSuccess('Reset code has been send to your email');
    }
    public function resetPassword($email, $resetCode)
    {
        $user = User::byEmail($email);

        if(count($user) == 0)
            abort(404);
        if($reminder = Reminder::exists($user)){
            if($resetCode == $reminder->code)
                return view('authentication.reset-password');
            else
                return redirect('/');
        }else{
            return redirect('/');
        }
    }

    public function postResetPassword(Request $request, $email, $resetCode)
    {
        $this->validate($request, [
            'password' => 'confirmed|required|min:6|max:12',
            'password_confirmation' => 'required|min:6|max:12'

            ]);

        $user = User::byEmail($email);

        if(count($user) == 0)
            abort(404);
        if($reminder = Reminder::exists($user)){
            if($resetCode == $reminder->code){
                 Reminder::complete($user, $resetCode, $request->password);
                 return redirect('/login')->withSuccess('Please login to your account');
            }else
                return redirect('/');
        }else{
            return redirect('/');
        }
    }

    private function sendEmail($user, $code)
    {
        Mail::send('emails.forgot-password', [
            'user' => $user,
            'code' => $code
            ], function($message) use ($user){
                $message->to($user->email);
                $message->subject("Hello $user->first_name reset your password");
            });
    }
}
