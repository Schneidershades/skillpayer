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
          <h4>Profile</h4>
          <div class="db-list-com tz-db-table">
            <div class="ds-boar-title">
              <h2>Our Current Partners</h2>
              <p>List of all partners available</p>
            </div>
            <div class="tz2-form-pay tz2-form-com">

              @if($partners->count() > 0)
              @foreach($partners as $partner)
               <div class="col-sm-6 col-md-6">
                  <div class="list-mig-like-com com-mar-bot-30">
                      <div class="list-mig-lc-img"> <img src="{{URL::to($partner->featured)}}" alt=""> 
                        <span class="home-list-pop-rat list-mi-pr">{{$partner->name}}</span> 
                      </div>
                  </div>
                  <a href="{{route('admin.partner.delete', $partner->id)}}" class="waves-effect waves-light btn-large full-btn">Delete</a> 
              </div>
              @endforeach

              @else
                <h4>There are no partners at the moment please insert a partner above</h4>
              @endif

            </div>            
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--END DASHBOARD-->
  
<!--MOBILE APP-->
@include('users.partials._padAdvert')
