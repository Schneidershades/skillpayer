<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Session;

class SecurityController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('users.security.edit')
            ->with('user', Auth::user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'new_password' => 'required|string|min:6',
        ]);

        $user = User::find($id);

        if($request->has('current_password') && !Hash::check($request->current_password, $user->password))
        {
            Session::flash('error', 'Your current password does not match credentials');
            return redirect()->back();
        }

        if($request->has('new_password'))
        {
            $user->password = bcrypt($request->new_password);
            $user->save();
        }

        Session::flash('success', 'Your password has been updated successfully');
        return redirect()->back();
    }

}
