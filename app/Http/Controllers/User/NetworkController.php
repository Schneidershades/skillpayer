<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class NetworkController extends Controller
{
    public function index()
    {
    	$user =  User::find(Auth::id());

    	if($user->referrals){
    		$referrings = $user->referrals;
    	}

		return view('users.network.index')
			->with('user', $user)
			->with('referrals', $referrings);
    }
}
 