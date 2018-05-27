<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Advert;
use App\AdvertTag;
use App\Category;
use App\Country;
use App\Tag;
use App\Package;
use Session;
use Image;
use Storage;
use Auth;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adverts = auth()->user()->adverts()->latest()->finished()->get();

        return view('users.advert.index', [
            'adverts' => $adverts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Advert $advert)
    {
        $count = auth()->user()->adverts()->count();

        if (Auth::user()->package_id == 1){
            $count = auth()->user()->adverts()->finished()->count();
            // dd($count);
            if ($count > 1){
                Session::flash('error', 'sorry you cannot create only one advert please upgrade for more features');
                return redirect()->back();
            }
        }

        if (Auth::user()->package_id == 2){
            $count = auth()->user()->adverts()->finished()->count();
            if ($count > 2){
                Session::flash('error', 'Sorry you cannot create only two adverts please upgrade for more features');
                return redirect()->back();
            }
        }

        if (Auth::user()->package_id == 3){
            $count = auth()->user()->adverts()->finished()->count();
            if ($count >= 3){
                Session::flash('error', 'Sorry you cannot create only three adverts please upgrade for more features');
                return redirect()->back();
            }
        }

        if (Auth::user()->package_id == 4){
            $count = auth()->user()->adverts()->finished()->count();
            if ($count > 7){
                Session::flash('error', 'Sorry you cannot create only seven adverts please upgrade for more features');
                return redirect()->back();
            }
        }

        if(!$advert->exists){
            $advert = $this->createAndReturnSkeletonfile();

            return view('users.advert.create')
            ->with('advert', $advert)
            ->with('categories', Category::all())
            ->with('countries', Country::all());
        }
        return view('users.advert.create')
            ->with('categories', Category::all())
            ->with('countries', Country::all());
    }
    protected function createAndReturnSkeletonfile()
    {
        return auth()->user()->adverts()->create([
            'status' => 'Not Available',
            'finished' => 0,
            'title' => 'untitled',
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $advert)
    {   
        $advert = Advert::where('identifier', $advert)->first();
        
        
        $advert->category_id = $request->category_id;
        $advert->sub_category_id = $request->sub_category_id;
        $advert->type = $request->type;
        $advert->title = $request->title;
        $advert->slug = str_slug($request->title);
        $advert->user_id = Auth::id();
        $advert->description = $request->description;
        $advert->sales_price = $request->sales_price;
        $advert->regular_price = $request->regular_price;
        $advert->contact = $request->contact;
        $advert->status = $request->status;
        $advert->country_id = $request->country_id;
        $advert->state_id = $request->state_id;
        $advert->state_id = $request->state_id;
        $advert->city_id = $request->city_id;
        $advert->address = $request->address;
        $advert->finished = true;

        if($request->hasFile('featured')){
            $image_small = $request->file('featured');
            $filename_small = Auth::user()->name.'-'.time().'-'.str_slug($image_small->getClientOriginalName()).'.'.$image_small->getClientOriginalExtension();
            $location_small = 'assets/images/advert-cover/small/' . $filename_small;
            Image::make($image_small)->resize(400, 250)->save($location_small);
            $advert->featured_sm = $location_small;
        }

        if($request->hasFile('featured')){
            $image = $request->file('featured');
            $filename = Auth::user()->name.'-'.time().'-'.str_slug($image->getClientOriginalName()).'.'.$image->getClientOriginalExtension();
            $location = 'assets/images/advert-cover/' . $filename;
            Image::make($image)->resize(1900, 600)->save($location);
            $advert->featured_bg = $location;
        }

        // if($request->hasFile('featured2')){
        //     $image = $request->file('featured2');
        //     $filename = Auth::user()->name.'-'.time().'-'.str_slug($image->getClientOriginalName()).'.'.$image->getClientOriginalExtension();
        //     $location = 'assets/images/advert/' . $filename;
        //     Image::make($image)->resize(750, 500)->save($location);
        //     $advert->featured2 = $location;
        // }

        // if($request->hasFile('featured3')){
        //     $image = $request->file('featured3');
        //     $filename = Auth::user()->name.'-'.time().'-'.str_slug($image->getClientOriginalName()).'.'.$image->getClientOriginalExtension();
        //     $location = 'assets/images/advert/' . $filename;
        //     Image::make($image)->resize(750, 500)->save($location);
        //     $advert->featured3 = $location;
        // }

        // if($request->hasFile('featured4')){
        //     $image = $request->file('featured4');
        //     $filename = Auth::user()->name.'-'.time().'-'.str_slug($image->getClientOriginalName()).'.'.$image->getClientOriginalExtension();
        //     $location = 'assets/images/advert/' . $filename;
        //     Image::make($image)->resize(750, 500)->save($location);
        //     $advert->featured4 = $location;
        // }

        // if($request->hasFile('featured5')){
        //     $image = $request->file('featured5');
        //     $filename = Auth::user()->name.'-'.time().'-'.str_slug($image->getClientOriginalName()).'.'.$image->getClientOriginalExtension();
        //     $location = 'assets/images/advert/' . $filename;
        //     Image::make($image)->resize(750, 500)->save($location);
        //     $advert->featured5 = $location;
        // }

        $advert->save();

        $tags =  array_unique(array_map('strval', explode(',', $request->tags)));

        foreach ($tags as $tag) {
             $check_tag = Tag::where('tag', $tag)->first();
            if($check_tag === null){
                // dd('good');
                $new_tag = new Tag;
                $new_tag->tag = $tag;
                $new_tag->save();

                $advert->tags()->attach($new_tag->id);
                // $advert_tags = new AdvertTag;
                // $advert_tags->advert_id = $advert->id;
                // $advert_tags->tag_id =$new_tag->tag;

            }else{
                // dd('good');
                $advert->tags()->attach($check_tag->id);
            }
        }
           
        Session::flash('success', 'The Advert was saved Successfully');
        
        return redirect()->route('account.advert.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $slug = Advert::where('slug', $slug);
        return view('users.advert.show')->with('slug', $slug);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $slug = Advert::where('slug', $slug)->first();
        return view('users.advert.edit')
            ->with('advert', $slug)
            ->with('categories', Category::all())
            ->with('countries', Country::all())
            ->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {

        // dd($request->tags);
        $advert = Advert::where('identifier', $slug)->first();
        
        $advert->category_id = $request->category_id;
        $advert->sub_category_id = $request->sub_category_id;
        $advert->type = $request->type;
        $advert->title = $request->title;
        $advert->slug = str_slug($request->title);
        $advert->description = $request->description;
        $advert->sales_price = $request->sales_price;
        $advert->regular_price = $request->regular_price;
        $advert->contact = $request->contact;
        $advert->status = $request->status;
        $advert->country_id = $request->country_id;
        $advert->state_id = $request->state_id;
        $advert->state_id = $request->state_id;
        $advert->city_id = $request->city_id;
        $advert->address = $request->address;
        $advert->finished = true;

        if ($request->hasFile('featured')){
            // add the new photo
            $imageSmall = $request->file('featured');
            $filenameSmall = Auth::user()->name.'-'.time().'-'.str_slug($imageSmall->getClientOriginalName()).'.'.$imageSmall->getClientOriginalExtension();
            $location = '/assets/images/advert-cover/small/' . $filenameSmall;
            Image::make($imageSmall)->resize(400, 250)->save($location);

            $oldFilename = $advert->featured_sm;
            // add the new photo
            $advert->featured_sm = $location;
            // delete the old photo
            Storage::delete($oldFilename);


            $image = $request->file('featured');
            $filename = Auth::user()->name.'-'.time().'-'.str_slug($image->getClientOriginalName()).'.'.$image->getClientOriginalExtension();
            $location = '/assets/images/advert-cover/' . $filename;
            Image::make($image)->resize(1900, 600)->save($location);

            $oldFilename = $advert->featured_bg;
            // add the new photo
            $advert->featured_bg = $location;
            // delete the old photo
            Storage::delete($oldFilename);


            $image2 = $request->file('featured2');
            $filename2 = Auth::user()->name.'-'.time().'-'.str_slug($image2->getClientOriginalName()).'.'.$image2->getClientOriginalExtension();
            $location2 = '/assets/images/advert/' . $filename2;
            Image::make($image2)->resize(750, 500)->save($location2);

            $oldFilename = $advert->featured2;
            // add the new photo
            $advert->featured2 = $location2;
            // delete the old photo
            Storage::delete($oldFilename);


            $image3 = $request->file('featured3');
            $filename3 = Auth::user()->name.'-'.time().'-'.str_slug($image3->getClientOriginalName()).'.'.$image3->getClientOriginalExtension();
            $location3 = '/assets/images/advert/' . $filename3;
            Image::make($image3)->resize(750, 500)->save($location3);

            $oldFilename = $advert->featured3;
            // add the new photo
            $advert->featured3 = $location3;
            // delete the old photo
            Storage::delete($oldFilename);



            $image4 = $request->file('featured4');
            $filename4 = Auth::user()->name.'-'.time().'-'.str_slug($image4->getClientOriginalName()).'.'.$image4->getClientOriginalExtension();
            $location4 = '/assets/images/advert/' . $filename4;
            Image::make($image4)->resize(750, 500)->save($location4);

            $oldFilename = $advert->featured4;
            // add the new photo
            $advert->featured4 = $location4;
            // delete the old photo
            Storage::delete($oldFilename);


            $image5 = $request->file('featured4');
            $filename5 = Auth::user()->name.'-'.time().'-'.str_slug($image5->getClientOriginalName()).'.'.$image5->getClientOriginalExtension();
            $location5 = '/assets/images/advert/' . $filename5;
            Image::make($image5)->resize(750, 500)->save($location5);

            $oldFilename = $advert->featured5;
            // add the new photo
            $advert->featured5 = $location5;
            // delete the old photo
            Storage::delete($oldFilename);

        }
        
        $advert->save();

        $tags =  array_unique(array_map('strval', explode(',', $request->tags)));

        foreach ($tags as $tag) {
             $check_tag = Tag::where('tag', $tag)->first();
            if($check_tag === null){
                // dd('good');
                $new_tag = new Tag;
                $new_tag->tag = $tag;
                $new_tag->save();

                $advert->tags()->attach($new_tag->id);
                // $advert_tags = new AdvertTag;
                // $advert_tags->advert_id = $advert->id;
                // $advert_tags->tag_id =$new_tag->tag;

            }else{
                // dd('good');
                $advert->tags()->attach($check_tag->id);
            }
        }
        Session::flash('success', 'The Advert was saved Successfully');
        return redirect()->route('account.advert.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advert = Advert::find($id);
        
        foreach($advert->uploads as $upload){
            if($upload->filename){
                $upload->delete();
                if(file_exists($upload->filename)){
                    @unlink($upload->filename);
                }
            }
        }
        
        $advert->delete();
        Session::flash('success', 'The Advert was deleted Successfully');
        return redirect()->route('account.advert.index');
        
    }
}
