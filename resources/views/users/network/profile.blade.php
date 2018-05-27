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
              <h4>User</h4>
              <div class="db-list-com tz-db-table">
                <div class="ds-boar-title">
                  <h2>Profile</h2>
                  <!-- <p>All the Lorem Ipsum generators on the All the Lorem Ipsum generators on the</p> -->
                </div>

                <div class="col-lg-12 col-sm-12">

                  <div class="card hovercard">
                      <div class="card-background">
                          <img class="card-bkimg" alt="" src="http://lorempixel.com/100/100/people/9/">
                          <!-- http://lorempixel.com/850/280/people/9/ -->
                      </div>
                      <div class="useravatar">
                          <!-- <img alt="" src="{{ $user->profile->avatar  ? $user->profile->avatar : URL::to('/assets/images/db-profile.jpg')}}"> -->
                      </div>
                      <div class="card-info"> <span class="card-title">{{$user->username}}</span>

                      </div>
                  </div>
                  <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
                      <div class="btn-group" role="group">
                          <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                              <div class="hidden-xs">Details</div>
                          </button>
                      </div>
                      <!-- <div class="btn-group" role="group">
                          <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                              <div class="hidden-xs">Favorites</div>
                          </button>
                      </div> -->
                      <!-- <div class="btn-group" role="group">
                          <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                              <div class="hidden-xs">Direct Referrals</div>
                          </button>
                      </div> -->
                  </div>

                    <div class="well">
                      <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1">
                          <h3>Details</h3>
                        </div>
                        <!-- <div class="tab-pane fade in" id="tab2">
                          <h3>This is tab 2</h3>
                        </div>
                        <div class="tab-pane fade in" id="tab3">
                          <h3>This is tab 3</h3>
                        </div> -->
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


