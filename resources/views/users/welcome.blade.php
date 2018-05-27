@extends('layouts.users')

@section('content')
<!--BANNER AND SERACH BOX-->
    <!--MOBILE MENU ICON:IT'S ONLY SHOW ON MOBILE & TABLET VIEW-->

                    
    <section id="background" class="dir1-home-head">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="dir-ho-tl">
                        <ul>
                            <li>
                                <a href="/"><img src="{{URL::to('/assets/images/logo.png')}}" alt=""> </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    @guest                        
                        <div class="dir-ho-tr">
                            <ul>
                                <li><a target="_blank" href="http://smsc.skillpyersms.com">Skill Payer SMS</a> </li>
                                <li><a href="{{route('register')}}">Register</a> </li>
                                <li><a href="{{route('login')}}">Sign In</a> </li>
                                <li><a href="{{route('account.advert.create.start')}}"><i class="fa fa-plus" aria-hidden="true"></i> Add Listing</a> </li>
                            </ul>
                        </div>
                    @else
                        <div class="dir-ho-tr">
                            <ul>
                                <li><a target="_blank" href="http://smsc.skillpyersms.com">Skill Payer SMS</a> </li>
                                <li><a href="{{route('home')}}">Dashboard</a> </li>
                                <li>
                                    <a href="{{ route('logout') }}" class="v3-menu-sign"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                        >{{Auth()->user()->username}} Logout
                                    </a> 
                                </li>
                                <li><a href="{{route('account.advert.create.start')}}"><i class="fa fa-plus" aria-hidden="true"></i> Add Listing</a> </li>
                            </ul>
                        </div>   
                    @endguest
                    
                </div>
            </div>
        </div>
        <div class="container dir-ho-t-sp">
            <div class="row">
                <div class="dir-hr1">
                    <div class="dir-ho-t-tit">
                        <h1>Connect <strong style="color:yellow">with the</strong> Right Service Experts</h1> 
                        <p>Expose your skills to the world, Make Good Money from your daily <br> consumptions & Fulfil Dreams helping Others to succeed in life</p>
                        @guest
                            <a href="{{route('login')}}" class="btn btn-primary"> Login</a>
                            <a href="{{route('register')}}" class="btn btn-primary"> Register</a>
                            <a href="{{route('register')}}" class="btn btn-primary"> Access Agric Loan</a>
                             <br><br>
                            
                        @else
                             <a href="{{route('home')}}" class="btn btn-primary"> Home</a>
                           
                            <a href="{{route('agric-loan.index')}}" class="btn btn-primary"> Access Agric Loan</a>
                            <br><br>
                        @endguest
                             
                    </div>
                    <form class="tourz-search-form" method="get"  action="{{route('search')}}">
                        <div class="input-field">
                            <select name="state" class="form-control" required>
                                <option value="">Select state</option>
                                @foreach($states as $state)
                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                @endforeach
                            </select>
                            <label for="select-city" style="color:white">Enter city</label>
                        </div>
                        <div class="input-field">
                            <select name="category" class="form-control" required>
                                <option value="">Select Profession</option>
                                @foreach($professions as $p)
                                    <option value="{{$p->name}}">{{$p->name}}</option>
                                @endforeach
                            </select>

                            <label for="select-search" class="search-hotel-type" style="color:white">Search services like Jobs, Properties, Cars, Hotels, Events etc....</label>
                        </div>
                        <div class="input-field">
                            <input type="submit" value="search" class="waves-effect waves-light tourz-sear-btn"> 
                            
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
        
    </section>
    
    

<!--HOME PROJECTS-->
<section class="proj mar-bot-red-m30">
    <div class="container">
        <div class="row">
            <!-- <div class="com-title">
                <h2>Find your <span>Services</span></h2>
                <p>Explore some of the best businesses from around the world from our partners and friends.</p>
            </div> -->
            <div class="dir-hli">
                <ul>
                    <!--=====LISTINGS======-->
                    <li class="col-md-3 col-sm-6">
                        <a href="">
                            <div class="dir-hli-5">
                                <div class="dir-hli-1">
                                    <div class="dir-hli-3"><img src="{{URL::to('images/hci1.png')}}" alt=""> </div>
                                    <div class="dir-hli-4"> </div> <img src="{{URL::to('/assets/images/services/15.jpg')}}" alt=""> </div>
                                <div class="dir-hli-2">
                                    <h4>Hotels & Resorts 
                                </div>
                            </div>
                        </a>
                    </li>
                    <!--=====LISTINGS======-->
                    <li class="col-md-3 col-sm-6">
                        <a href="">
                            <div class="dir-hli-5">
                                <div class="dir-hli-1">
                                    <div class="dir-hli-3"><img src="{{URL::to('images/hci1.png')}}" alt=""> </div>
                                    <div class="dir-hli-4"> </div> <img src="{{URL::to('/assets/images/services/13.jpg')}}" alt=""> </div>
                                <div class="dir-hli-2">
                                    <h4>Hospitals 
                                </div>
                            </div>
                        </a>
                    </li>
                    <!--=====LISTINGS======-->
                    <li class="col-md-3 col-sm-6">
                        <a href="">
                            <div class="dir-hli-5">
                                <div class="dir-hli-1">
                                    <div class="dir-hli-3"><img src="{{URL::to('images/hci1.png')}}" alt=""> </div>
                                    <div class="dir-hli-4"> </div> <img src="{{URL::to('/assets/images/services/9.jpg')}}" alt=""> </div>
                                <div class="dir-hli-2">
                                    <h4>Transportation 
                                </div>
                            </div>
                        </a>
                    </li>
                    <!--=====LISTINGS======-->
                    <li class="col-md-3 col-sm-6">
                        <a href="">
                            <div class="dir-hli-5">
                                <div class="dir-hli-1">
                                    <div class="dir-hli-3"><img src="{{URL::to('images/hci1.png')}}" alt=""> </div>
                                    <div class="dir-hli-4"> </div> <img src="{{URL::to('/assets/images/services/12.jpg')}}" alt=""> </div>
                                <div class="dir-hli-2">
                                    <h4>Property 
                                </div>
                            </div>
                        </a>
                    </li>
                    <!--=====LISTINGS======-->
                    <li class="col-md-3 col-sm-6">
                        <a href="">
                            <div class="dir-hli-5">
                                <div class="dir-hli-1">
                                    <div class="dir-hli-3"><img src="{{URL::to('/assets/images/hci1.png')}}" alt=""> </div>
                                    <div class="dir-hli-4"> </div> <img src="{{URL::to('/assets/images/services/2.jpg')}}" alt=""> </div>
                                <div class="dir-hli-2">
                                    <h4>Automobilers 
                                </div>
                            </div>
                        </a>
                    </li>
                    <!--=====LISTINGS======-->
                    <li class="col-md-3 col-sm-6">
                        <a href="">
                            <div class="dir-hli-5">
                                <div class="dir-hli-1">
                                    <div class="dir-hli-3"><img src="{{URL::to('/assets/images/hci1.png')}}" alt=""> </div>
                                    <div class="dir-hli-4"> </div> <img src="{{URL::to('/assets/images/services/6.jpg')}}" alt=""> </div>
                                <div class="dir-hli-2">
                                    <h4>Electricals 
                                </div>
                            </div>
                        </a>
                    </li>
                    <!--=====LISTINGS======-->
                    <li class="col-md-3 col-sm-6">
                        <a href="">
                            <div class="dir-hli-5">
                                <div class="dir-hli-1">
                                    <div class="dir-hli-3"><img src="{{URL::to('/assets/images/hci1.png')}}" alt=""> </div>
                                    <div class="dir-hli-4"> </div> <img src="{{URL::to('/assets/images/services/16.jpg')}}" alt=""> </div>
                                <div class="dir-hli-2">
                                    <h4>Education 
                                </div>
                            </div>
                        </a>
                    </li>
                    <!--=====LISTINGS======-->
                    <li class="col-md-3 col-sm-6">
                        <a href="">
                            <div class="dir-hli-5">
                                <div class="dir-hli-1">
                                    <div class="dir-hli-3"><img src="{{URL::to('/assets/images/hci1.png')}}" alt=""> </div>
                                    <div class="dir-hli-4"> </div> <img src="{{URL::to('/assets/images/services/8.jpg')}}" alt=""> </div>
                                <div class="dir-hli-2">
                                    <h4>Sports
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
</section>
<!--FIND YOUR SERVICE-->
<section class="com-padd com-padd-redu-bot1 pad-bot-red-40">
    <div class="container">
        <div class="row">
            <!--HOME PROJECTS: 1-->
            <div class="col-md-3 col-sm-6">
                <div class="hom-pro"> <img src="{{URL::to('/assets/images/icon/7.png')}}" alt="" />
                    <h4>About us</h4>
                    <p>Get to Know About Skill Payer activities and purpose</p> <a href="{{route('about')}}">Explore Now</a> </div>
            </div>
            <!--HOME PROJECTS: 1-->
            <div class="col-md-3 col-sm-6">
                <div class="hom-pro"> <img src="{{URL::to('/assets/images/icon/3.png')}}" alt="" />
                    <h4>How it works</h4>
                    <p>Get more information on how to gain the most out of the platform</p> <a href="{{route('tour')}}">Explore Now</a> </div>
            </div>
            <!--HOME PROJECTS: 1-->
            <div class="col-md-3 col-sm-6">
                <div class="hom-pro"> <img src="{{URL::to('/assets/images/icon/2.png')}}" alt="" />
                    <h4>Packages</h4>
                    <p>Choose from a collection of packages available to you for more benefits</p> <a href="{{route('packages')}}">Explore Now</a> </div>
            </div>
            <!--HOME PROJECTS: 1-->
            <div class="col-md-3 col-sm-6">
                <div class="hom-pro"> <img src="{{URL::to('/assets/images/icon/1.png')}}" alt="" />
                    <h4>Rewards</h4>
                    <p>Gain more information about what skill payer gives back to you in return</p> <a href="{{route('reward')}}">Explore Now</a> </div>
            </div>
        </div>
    </div>
</section>


<!--MOBILE APP-->
<section class="web-app com-padd">
    <div class="container">
        <div class="row">
            <div class="col-md-6 web-app-img"> <img src="{{URL::to('/assets/images/mobile.png')}}" alt="" /> </div>
            <div class="col-md-6 web-app-con">
                <h2>Looking for the Best Service Provider? <span>Get the App!</span></h2>
                <ul>
                    <li><i class="fa fa-check" aria-hidden="true"></i> Find nearby listings</li>
                    <li><i class="fa fa-check" aria-hidden="true"></i> Easy service enquiry</li>
                    <li><i class="fa fa-check" aria-hidden="true"></i> Listing reviews and ratings</li>
                    <li><i class="fa fa-check" aria-hidden="true"></i> Manage your listing, enquiry and reviews</li>
                </ul> <span>We'll send you a link, open it on your phone to download the app</span>
                <!-- <form>
                    <ul>
                        <li>
                            <input type="text" placeholder="+01" /> </li>
                        <li>
                            <input type="number" placeholder="Enter mobile number" /> </li>
                        <li>
                            <input type="submit" value="Get App Link" /> </li>
                    </ul>
                </form> -->
                <a href="#"><img src="{{URL::to('/assets/images/android.png')}}" alt="" /> </a>
                <a href="#"><img src="{{URL::to('/assets/images/apple.png')}}" alt="" /> </a>
            </div>
        </div>
    </div>
</section>

@endsection