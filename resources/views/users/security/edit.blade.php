@extends('layouts.users')

@section('content')
@include('partials._search')
<!--DASHBOARD-->
<section>
    <div class="tz">
        @include('users.partials._user_nav')
        <!--CENTER SECTION-->
            <div class="tz-2">
                <div class="tz-2-com tz-2-main">
                    <h4>Change Password</h4>
                    <div class="db-list-com tz-db-table">
                        <div class="ds-boar-title">
                            <h2>Change Password User : {{$user->username}}</h2>
                        </div>
                        <div class="hom-cre-acc-left hom-cre-acc-right">
                            <div class="">
                                @include('partials._errors')
                                <form action="{{route('account.security.update', $user->id)}}" method="post">
                                    {{ csrf_field() }}

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <label for="password">Current Password</label>
                                            <input id="current_password" type="password" name="current_password" class="validate form-control">
                                        </div>
                                    </div> 

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <label for="password">New Password</label>
                                            <input id="new_password" type="password" name="new_password" class="validate form-control">
                                        </div>
                                    </div>                            
                                                        
                                    <div class="row">
                                        <div class="input-field col s12 v2-mar-top-40"> <button class="waves-effect waves-light btn-large full-btn" type="submit">Change Password</button> </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        <!--RIGHT SECTION-->
    </div>
</section>
<!--END DASHBOARD-->
<!--MOBILE APP-->
@include('users.partials._padAdvert')
@endsection
