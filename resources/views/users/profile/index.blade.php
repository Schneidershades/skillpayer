
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
              <h4>Manage My Profile</h4>
              <div class="db-list-com tz-db-table">
                <div class="ds-boar-title">
                  <h2>Profile</h2>
                  <!-- <p>All the Lorem Ipsum generators on the All the Lorem Ipsum generators on the</p> -->
                </div>

                <table id="footer-search" class="table table-striped table-bordered nowrap">
                    
                    <tbody>
                         <tr>
                            <td>Email  </td>
                            <td> {{Auth::user()->email  ? Auth::user()->email  : 'Not Inputed'}}</td>
                        </tr>

                        <tr>
                            <td>Full Name </td>
                            <td> {{Auth::user()->name  ? Auth::user()->name  : 'Not Inputed'}}</td>
                        </tr>

                         <tr>
                            <td>Biography </td>
                            <td>  {{Auth::user()->profile->biography  ? Auth::user()->profile->biography  : 'Not Inputed'}}</td>
                        </tr>

                         <tr>
                            <td>Personal Contact</td>
                            <td>{{Auth::user()->profile->phone_number  ? Auth::user()->profile->phone_number  : 'Not Inputed'}}</td>
                        </tr>

                         <tr>
                            <td>Office Contact </td>
                            <td> {{Auth::user()->profile->mobile_number  ? Auth::user()->profile->mobile_number : 'Not Inputed'}}</td>
                        </tr>

                         <tr>
                            <td> Website</td>
                            <td> {{Auth::user()->profile->website  ? Auth::user()->profile->website : 'Not Inputed'}}</td>
                        </tr>

                         <tr>
                            <td>Country</td>
                            <td>{{Auth::user()->country  ? Auth::user()->country : 'Not Inputed'}}</td>
                        </tr>

                         <tr>
                            <td>State</td>
                            <td>{{Auth::user()->state  ? Auth::user()->state  : 'Not Inputed'}}</td>
                        </tr>

                         <tr>
                            <td>Country</td>
                            <td>{{Auth::user()->country  ? Auth::user()->country : 'Not Inputed'}}</td>
                        </tr>

                         <tr>
                            <td>City</td>
                            <td>{{Auth::user()->city ? Auth::user()->city : 'Not Inputed'}}</td>
                        </tr>

                         <tr>
                            <td>Postal Code </td>
                            <td>{{Auth::user()->profile->postal_code  ? Auth::user()->profile->postal_code : 'Not Inputed'}}</td>
                        </tr>

                         <tr>
                            <td>Facebook Link</td>
                            <td>{{Auth::user()->profile->facebook  ? Auth::user()->profile->facebook  : 'Not Inputed'}}</td>
                        </tr>


                         <tr>
                            <td>Twitter Link</td>
                            <td>{{Auth::user()->profile->twitter  ? Auth::user()->profile->twitter : 'Not Inputed'}}</td>
                        </tr>

                        <tr>
                            <td>Google Plus Link</td>
                            <td>{{Auth::user()->profile->googleplus  ? $value : 'Not Inputed'}}</td>
                        </tr>

                        <tr>
                            <td>Instagram Link</td>
                            <td>{{Auth::user()->profile->instagram  ? Auth::user()->profile->instagram : 'Not Inputed'}}</td>
                        </tr>
                        <tr>
                            <td>Linkedin Link</td>
                            <td>{{Auth::user()->profile->linkedin  ? Auth::user()->profile->linkedin : 'Not Inputed'}}</td>
                        </tr>
                        <tr>
                            <td>Vimeo Link</td>
                            <td>{{Auth::user()->profile->vimeo  ? Auth::user()->profile->vimeo : 'Not Inputed'}}</td>
                        </tr>
                        <tr>
                            <td>YouTube Link</td>
                            <td>{{Auth::user()->profile->youtube  ? Auth::user()->profile->youtube : 'Not Inputed'}}</td>
                        </tr>
                    </tbody>
                </table>
            <div class="db-mak-pay-bot">              
              <a href="{{route('account.profile.edit', $user->id)}}" class="btn btn-primary">Edit my profile</a> </div>
          </div>
        </div>
      </div>
      <!--RIGHT SECTION-->


      
    </div>
  </section>
  <!--END DASHBOARD-->
<!--MOBILE APP-->
@include('users.partials._padAdvert')


