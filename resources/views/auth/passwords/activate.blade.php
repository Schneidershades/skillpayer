@extends('layouts.users')

@section('content')
@include('partials._search')
<section class="tz-register" style="background: url('/assets/images/naijanaira.jpg') #e6e6e6">
    <div class="log-in-pop">
        <div class="log-in-pop-left">
            <h1>Hello... <span></span></h1>
            <p>Don't have an account? Create your account. It's take less then a minutes</p>
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
            </a>
            <h4>Email Verification</h4>
            
            @include('partials._errors')

            <form class="s12"  method="POST" action="{{ route('activate') }}">
                {{ csrf_field() }}
                <div>
                    <div class="input-field s12">
                        <label>Input your registered email address</label>
                        <input type="text" class="form-control" name="email" value="{{ old('email') }}" required>
                    </div>
                </div><br><br>
                <div>
                    <div class="input-field s4">
                    <input type="submit" value="Send activation mail" class="waves-effect waves-light log-in-btn "> </div>
                </div>
                <div>
                    <div class="input-field s12"> <a href="">Forgot password</a> | <a href="{{ route('register') }}">Create a new account</a> </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!--MOBILE APP-->

@include('users.partials._padAdvert')

@endsection
