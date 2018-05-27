<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MagicLoginController extends Controller
{
    public function show()
    {
    	return view('auth.magic.login');
    }

    public function sendToken()
    {
    	return view('auth.magic.login');
    }
}
