<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use Session;
use Image;
use Storage;

class SettingController extends Controller
{
     public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.setting.settings')->with('setting', Setting::first());
    }

    public function update(Request $request)
    {
        $this->validate(request(), [
            'site_name' => 'required',
        ]);

        $settings = Settings::first();

        $settings->site_name = $request->site_name;
        $settings->site_url = $request->site_url;
        $settings->site_logo_header = $request->site_logo_header;
        $settings->site_logo_footer = $request->site_logo_footer;
        $settings->site_slogan = $request->site_slogan;
        $settings->site_state_country = $request->site_state_country;
        $settings->site_main_number = $request->site_main_number;
        $settings->site_whatsapp_number = $request->site_whatsapp_number;
        $settings->site_international_number = $request->site_international_number;
        $settings->site_email = $request->site_email;
        $settings->site_facebook = $request->site_facebook;
        $settings->site_twitter = $request->site_twitter;
        $settings->site_youtube = $request->site_youtube;
        $settings->site_instagram = $request->site_instagram;
        $settings->site_pinterest = $request->site_pinterest;
        $settings->site_about = $request->site_about;
        $settings->site_mission = $request->site_mission;
        $settings->site_vision = $request->site_vision;
        $settings->site_overview = $request->site_overview;
        $settings->site_client_description = $request->site_client_description;
        $settings->site_full_address_local = $request->site_full_address_local;
        $settings->site_full_address_international = $request->site_full_address_international;

        $settings->site_work_days = $request->site_work_days;

         if ($request->hasFile('site_featured_toast')){
            // add the new photo
            $image = $request->file('site_featured_toast');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = 'assets/images/settings/' . $filename;
            Image::make($image)->resize(900, 600)->save($location);

            $oldFilename = $settings->image;
            // add the new photo
            $settings->site_featured_image = $location;
            // delete the old photo
            Storage::delete($oldFilename);

        }

        $settings->save();

        Session::flash('success', 'Website content updated successfully');

        return redirect()->back();
    }
}
