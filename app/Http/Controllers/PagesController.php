<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\Advert;
use App\State;
use App\User;
use App\Category;
use Illuminate\Support\Facades\Input;

class PagesController extends Controller
{
    public function about()
    {
    	return view('pages.about');
    }

    public function contact()
    {
    	return view('pages.contact');
    }

    public function latest()
    {
    	return view('pages.latest')
            ->with('adverts', Advert::where('finished', true)->paginate(30))
            ->with('categories', Category::all());
    }

    public function advertSingle($slug)
    {
    	return view('pages.latest-single')
            ->with('advert', Advert::where('slug', $slug)->first());
    }

    public function packages()
    {
    	return view('pages.packages')
            ->with('packages', Package::all());
    }

    public function reward()
    {
    	return view('pages.reward');
    }

    public function search(){

        $state = Input::get('state');
        $profession = Input::get('category');

        $category = Category::where('name', $profession)->first();
        $pick_state = State::where('name', $state)->first();


        $deal = Advert::where('category_id',$category->id)->latest()->paginate(30);

        // dd($query);
        return view('pages.search')->with(['adverts' => $deal, 'state' => $state, 'profession' => $profession, 'categories' => Category::all()]);

    }

     public function tour()
    {
    	return view('pages.tour');
    }
     public function welcome()
    {
        return view('welcome')
            ->with('adverts', Advert::where('finished', true)->paginate(27))
            ->with('categories', Category::all());
    }

    public function refreshCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }
    
    public function partnersPage()
    {
        $found = null;
        return view('pages.partners')->with('found', $found);
    }

    public function searchUser()
    {
        $username = Input::get('user');

        $found = User::where('username',$username)->first();

        if($found == null){
            return redirect()->back()->with('error', 'No user Available');
        }

        // dd($query);
        return view('pages.partners')->with(['found' => $found , 'error' => 'User Found']);
    }
}
