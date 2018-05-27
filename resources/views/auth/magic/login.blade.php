@extends('layouts.users')

@section('content')
@include('partials._search')
<section class="tz-register" style="background: url('/assets/images/naijanaira.jpg') #e6e6e6">
    
    
    
    
    <div class="log-in-pop">
        
        <div class="alert alert-danger" role="alert">
			<h1>Hello... WE HAPPILY MAKE MONEY HERE <span></span></h1>
                        <p>Dear Community Member,<p>
            We welcome you to the 3rd month of the year and wish you a great success in it.</p><p>
                </b> Please make sure your Password is always kept safe to prevent intrusion.</p>
            <p>If you have difficulties loging in, simply click forgot password and check your email for the password reset message and follow the process thereafter. You can also reach support via skillpayer@yandex.com for further assistance.</p>
            <p><b style="color:red">COMING SOON:</b> 'Buying & Selling' an online live TV show on Skillpayer's members' businesses and services will be coming your way on www.jobseekerstv.com.ng from Next week. Seize this opportunity to push your business to the world platform by appearing on the show to talk about what you do. Kindly visit the facebook page: 'Buying&Selling with Billiondollars', like the page, drop a comment and indicate interest to participate. Also subscribe to our youtube channel SkillPayer TV and twit at us @skillpayertv</p><p>
            May you March into your financial freedom this month of March. You are unstoppable as you share this good news with everyone you know on earth.</p><p>
            Team Skillpayer</p>
		</div>
        <div class="log-in-pop-left">=
            <h1>Hello... <span></span></h1>
            <p>Don't have an account? Create One Now. It takes less then a minute</p>
            <h4>Login with social media</h4>
            <ul>
                <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
                </li>
                <li><a href="#"><i class="fa fa-google"></i> Google+</a>
                </li>
                <li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
                </li>
            </ul>
        </div>
        <div class="log-in-pop-right">
            <h4>Login</h4>
            @include('partials._errors')

            <form class="s12"  method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div>
                    <div class="input-field s12">
                        <label>Username</label>
                        <input type="text" data-ng-model="name1" class="validate form-control" name="username" value="{{ old('username') }}" required>
                    </div>
                </div>
                
                <div class="row m-t-25 text-left">
                    <div class="col-sm-12 col-xs-12">
                        <div class="checkbox-fade fade-in-primary">
                            <input type="checkbox" class="form-control" name="remember" style=" width: 20px;">
                            <label>Remember me </label>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="input-field s4">
                        <input type="submit" value="Send magic link" class="waves-effect waves-light log-in-btn "> 
                    </div>
                </div>
                <div>
                    <div class="input-field s12"> 
                        <a href="{{ route('password.request') }}">Forgot password</a> | 
                        <a href="{{ route('register') }}">Create a new account</a> | 
                        <a href="{{ route('activation.mail') }}">Resend Activation Email</a> 
                        <a href="{{ route('magic.login') }}">Magic Login</a> 
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!--MOBILE APP--> 
@include('users.partials._padAdvert')
@endsection

