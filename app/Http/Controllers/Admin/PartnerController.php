<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Partner;
use Session;
use Image;

class PartnerController extends Controller
{

    public function index()
    {
        return view('admin.partner.index')
            ->with('partners', Partner::all());
    }
    

    public function store(Request $request)
    {
        $partner = new Partner;

        $partner->name = $request->name;
        $partner->address = $request->address;
        $partner->incentives = $request->incentives;

        if($request->hasFile('featured')){
            $image_small = $request->file('featured');
            $filename_small = time().'-'.str_slug($image_small->getClientOriginalName()).'.'.$image_small->getClientOriginalExtension();
            $location_small = 'assets/images/partners/' . $filename_small;
            Image::make($image_small)->resize(150, 100)->save($location_small);
            $partner->featured = $location_small;
        }
        
        $partner->save();
           
        Session::flash('success', 'The partner was saved Successfully');
        
        return redirect()->route('admin.partner.index');
    }

    public function destroy($id)
    {
        $partner = Partner::find($id);

        if(file_exists($partner->featured)){
            @unlink($partner->featured);
        }

        $partner->delete();

        Session::flash('success', 'The partner was just trashed');

        return redirect()->back();
     }
}
