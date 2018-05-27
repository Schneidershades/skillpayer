<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => [ //Make an custom array
                'required','string',
                Rule::exists('users')->where(function ($query) { //create closure with query builder to check the users
                    $query->where('verified', true); //where active column is true
                })
            ],
            'password' => 'required|string',
        ], $this->validationErrors());
    }

    public function validationErrors()
    {
        $txt1 = '<a href="{{ route("activation.mail") }}">here</a>';
        return [
            $this->username() . '.exists' => 'To login please click the Resend Activation Email below'
        ];
    }
}
