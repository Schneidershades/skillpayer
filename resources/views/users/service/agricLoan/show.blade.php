
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
              <h4>Agric Loan Application information</h4>
              <div class="db-list-com tz-db-table">
                <div class="ds-boar-title">
                  <!--<h2>Agric Loan information</h2>-->
                  @if(Auth::user()->agricLoanProfile->paid == 'Pending')          
                    
                  <p>Make payment to join Loan review </p>
                  @else
                    <p>Your information has been received you would be contacted as soon as reviews are made </p>
                  @endif
                </div>
                @include('partials._errors')

                <div class="db-mak-pay-bot">  
                  @if(Auth::user()->agricLoanProfile->paid == 'Pending')          
                    <a href="{{route('agric-loan.payment', $user->id)}}" class="btn btn-primary">Pay 5000 SKC to join review</a> 
                  @endif
                </div>

                <table id="footer-search" class="table table-striped table-bordered nowrap">
                    
                    <tbody>
                         <tr>
                            <td>National Identity number  </td>
                            <td> {{Auth::user()->agricLoanProfile->identity  ? Auth::user()->agricLoanProfile->identity : 'Not Inputed'}}</td>
                        </tr>

                        <tr>
                            <td>Full Name </td>
                            <td> {{Auth::user()->agricLoanProfile->full_name ? Auth::user()->agricLoanProfile->full_name  : 'Not Inputed'}}</td>
                        </tr>

                        <tr>
                            <td>Gender </td>
                            <td> {{Auth::user()->agricLoanProfile->gender == true ? Auth::user()->agricLoanProfile->gender : 'Not Inputed'}}</td>
                        </tr>

                        <tr>
                            <td>Date of Birth </td>
                            <td>  {{Auth::user()->agricLoanProfile->dob ? Auth::user()->agricLoanProfile->dob  : 'Not Inputed'}}</td>
                        </tr>

                         <tr>
                            <td>Profession </td>
                            <td>  {{Auth::user()->agricLoanProfile->profession ? Auth::user()->agricLoanProfile->profession  : 'Not Inputed'}}</td>
                        </tr>

                         <tr>
                            <td>Business Name </td>
                            <td>  {{Auth::user()->agricLoanProfile->business_name ? Auth::user()->agricLoanProfile->business_name  : 'Not Inputed'}}</td>
                        </tr>

                         <tr>
                            <td>Employment Status </td>
                            <td>{{Auth::user()->agricLoanProfile->employment_status ? Auth::user()->agricLoanProfile->employment_status  : 'Not Inputed'}}</td>
                        </tr>

                        <tr>
                            <td>Bank Verification Number (BVN) </td>
                            <td>{{Auth::user()->agricLoanProfile->bvn ? Auth::user()->agricLoanProfile->bvn  : 'Not Inputed'}}</td>
                        </tr>

                         <tr>
                            <td>Bank Name </td>
                            <td>{{Auth::user()->agricLoanProfile->account_bank_name ? Auth::user()->agricLoanProfile->account_bank_name  : 'Not Inputed'}}</td>
                        </tr>

                         <tr>
                            <td>Account Number </td>
                            <td>{{Auth::user()->agricLoanProfile->account_number ? Auth::user()->agricLoanProfile->account_number  : 'Not Inputed'}}</td>
                        </tr>


                         <tr>
                            <td>Email </td>
                            <td>  {{Auth::user()->email  ? Auth::user()->email  : 'Not Inputed'}}</td>
                        </tr>

                         <tr>
                            <td>Personal Contact</td>
                            <td>{{Auth::user()->agricLoanProfile->phone_number  ? Auth::user()->agricLoanProfile->phone_number  : 'Not Inputed'}}</td>
                        </tr>

                         <tr>
                            <td>Address</td>
                            <td> {{Auth::user()->agricLoanProfile->address  ? Auth::user()->agricLoanProfile->address : 'Not Inputed'}}</td>
                        </tr>

                         <tr>
                            <td> Website</td>
                            <td> {{Auth::user()->profile->website  ? Auth::user()->profile->website : 'Not Inputed'}}</td>
                        </tr>

                         <tr>
                            <td> Guarantor Name</td>
                            <td> {{Auth::user()->agricLoanProfile->guarantor_name  ? Auth::user()->agricLoanProfile->guarantor_name : 'Not Inputed'}}</td>
                        </tr>

                         <tr>
                            <td> Guarantor Phone number</td>
                            <td> {{Auth::user()->agricLoanProfile->guarantor_phone_number  ? Auth::user()->agricLoanProfile->guarantor_phone_number : 'Not Inputed'}}</td>
                        </tr>

                         <tr>
                            <td> Guarantor Address</td>
                            <td> {{Auth::user()->agricLoanProfile->guarantor_address  ? Auth::user()->agricLoanProfile->guarantor_address : 'Not Inputed'}}</td>
                        </tr>

                         <!-- <tr>
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
                        </tr> -->
                    </tbody>
                </table>
            
          </div>
        </div>
      </div>
      <!--RIGHT SECTION-->


      
    </div>
  </section>
  <!--END DASHBOARD-->
<!--MOBILE APP-->
@include('users.partials._padAdvert')


