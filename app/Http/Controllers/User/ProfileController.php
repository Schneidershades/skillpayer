<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;
use App\Country;
use App\Profile;
use App\User;
use Image;
use Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // check if the user has a profile
        $profile = Profile::where('user_id', Auth::id())->first();
        if($profile == null){
            // if he doesent have just create
            $profile = new Profile;
            $profile->user_id =  Auth::id();
            $profile->save();
        }
        return view('users.profile.index')
            ->with('user', Auth::user());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('users.profile.edit')
            ->with('user', Auth::user())
            ->with('countries', Country::all());
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
        $user = User::find($id);
        
        if ($request->avatar){
            // add the new photo
            $image = $request->file('avatar');
            $filename = $user->username.'-'.time().'-'.str_slug($image->getClientOriginalName()).'.'.$image->getClientOriginalExtension();
            $location = 'assets/images/users/' . $filename;
            
            Image::make($image)->resize(490, 250)->save($location);

            $oldFilename = $user->profile->avatar;
            // add the new photo
            $user->profile->avatar = $location;
            // delete the old photo
            Storage::delete($oldFilename);
        }

        $user->profile->fullname = $request->fullname;
        $user->profile->facebook = $request->facebook;
        $user->profile->twitter = $request->twitter;
        $user->profile->youtube = $request->youtube;
        $user->profile->googleplus = $request->googleplus;
        $user->profile->instagram = $request->instagram;
        $user->profile->pinterest = $request->pinterest;
        $user->profile->linkedin = $request->linkedin;
        $user->profile->vimeo = $request->vimeo;
        $user->profile->biography = $request->biography;
        $user->profile->mobile_number = $request->mobile_number;
        $user->profile->phone_number = $request->phone_number;
        $user->profile->website = $request->website;
        $user->profile->country = $request->country_id;
        $user->profile->state = $request->state_id;
        $user->profile->city = $request->city_id;
        $user->profile->postal_code = $request->postal_code;
        $user->profile->address = $request->address;

        $user->save();
        $user->profile->save();

        // if($request->has('password'))
        // {
        //     $user->password = bcrypt($request->password);
        //     $user->save();
        // }

        Session::flash('success', 'Account profile updated');
        return redirect()->back();
    }
}
