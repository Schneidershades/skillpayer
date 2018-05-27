@extends('layouts.users')

@section('content')

@include('partials._search')
<section class="tz-register" style="background: url('/assets/images/naijanaira.jpg') #e6e6e6">
    <div class="log-in-pop">
        <div class="log-in-pop-left">
            <h1>Hello... <span></span></h1>
            <p>Don't have an account? Create your account. It takes less then a minute</p>
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
            <h4>Create an Account</h4>
            @include('partials._errors')
            <form class="s12" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div>
                    <div class="input-field s12">
                        <label>Username</label>
                        <input type="text" data-ng-model="name1" class="validate form-control" name="username" value="{{ old('username') }}" required >
                    </div>
                </div>
                <div>
                    <div class="input-field s12">
                        <label>Email</label>
                        <input type="email" class="validate form-control" name="email" value="{{ old('email') }}" required>
                    </div>
                </div>
                <div>
                    <div class="input-field s12">
                        <label>Your Password</label>
                        <input type="password" class="validate form-control" name="password" required>
                    </div>
                </div>
                <div>
                    <div class="input-field s12">
                        <label>Your Referal Email</label>
                        <input type="email" class="validate form-control" name="referral" value="{{ old('referral') }}">
                    </div>
                </div>

                <div class="row m-t-25 text-left">
                    <div class="col-sm-12 col-xs-12">
                        <div class="checkbox-fade fade-in-primary">
                            <input type="checkbox" class="form-control" name="no_referral" style=" width: 20px;">
                            <label>Please Click if you dont have a referral. Please be informed that you should have a referral.</label>
                        </div>
                    </div>
                </div> 
                <div>
                    <div class="input-field s4">
                        <input type="submit" value="Register" class="waves-effect waves-light log-in-btn"> </div>
                </div>
                <div>
                    <div class="input-field s12"> <a href="{{route('login')}}">Are you a already member ? Login</a> </div>
                </div>
            </form>
        </div>
    </div>
</section>

@include('users.partials._padAdvert')
@endsection
