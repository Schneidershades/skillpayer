<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserCreated;

class UserController extends Controller
{
    public function verify($token)
    {
        $user = User::where('verification_token', $token)->first();
        
        if ($user === null){
            
            $message = 'Verification expired please resend a verification token again';
            $status = "error";
            
        }
        
        if($user){
            
            $user->verified = true;
            $user->verification_token = null;
    
            $user->save();
            
            // dd($user);
            
             $message = 'Your account has been verified';
            $status = "success";
        }
        
        return view('auth.login')->with($status, $message);
    }

    public function sendToken()
    {
        return view('auth.passwords.activate');
    }

    public function resend(Request $request)
    {
        $user =  User::where('email', $request->email)->first();

        if ($user ===  null){
            return redirect()->back()->with('error', 'Email address not found');
        }else{

            if($user->verified == true){
                return redirect()->back()->with('error', 'Account is already activated!! you can login');
            }else{
                $user->verification_token = User::generateVerificationCode();
                $user->save();

                Mail::to($user)->send(new UserCreated($user));

                return redirect()->back()->with('success', 'The verification email has been sent');
            }
        }
    }
}
