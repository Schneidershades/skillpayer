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
                    <h4>Agric Loans</h4>
                    <div class="db-list-com tz-db-table">
                        <div class="ds-boar-title">
                            <h2>Fill up the credentials for agric loan</h2>
                        </div>

                        <div class="tz2-form-pay tz2-form-com">
                          <form action="{{route('agric-loan.update', [$user->id] )}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="amount">National Identity number</label>
                                    <input id="identity" type="text" name="identity" class="validate form-control"  value="{{Auth::user()->agricLoanProfile->identity}}" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="title">Full Name</label>
                                     <input id="title" type="text" name="full_name" class="validate form-control"  value="{{Auth::user()->agricLoanProfile->full_name}}" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="title">Email</label>
                                     <input id="title" type="text" name="email" class="validate form-control"   value="{{Auth::user()->email}}" required>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="amount">Gender</label>
                                    <select name="gender" class="form-control" required>
                                        @if(Auth::user()->agricLoanProfile->gender)
                                        
                                        <option value="{{Auth::user()->agricLoanProfile->gender}}">{{Auth::user()->agricLoanProfile->gender}}</option>
                                        
                                        @else
                                            <option value="">--Select Gender--</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        @endif
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="amount">Phone Contact</label>
                                    <input id="phone_number" type="text" name="phone_number" class="validate form-control"  value="{{Auth::user()->agricLoanProfile->phone_number}}" required >
                                </div>
                            </div>
                            <br>

                             <div class="row">
                                <div class="col-md-12">
                                    <label for="description">Address</label>
                                     <textarea name="address" class="form-control" required>{{Auth::user()->agricLoanProfile->address}}</textarea>
                                </div>
                            </div><br>

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="title">Date of birth</label>
                                     <input id="title" type="date" name="dob" class="validate form-control"  value="{{Auth::user()->agricLoanProfile->dob}}" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="title">Profession</label>
                                     <input id="title" type="text" name="profession" class="validate form-control"  value="{{Auth::user()->agricLoanProfile->profession}}" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="amount">Business Name</label>
                                    <input id="business_name" type="text" name="business_name" class="validate form-control"  value="{{Auth::user()->agricLoanProfile->phone_number}}" required >
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="title">Employment Status</label>
                                     <input id="title" type="text" name="employment_status" class="validate form-control"  value="{{Auth::user()->agricLoanProfile->employment_status}}"  required>
                                </div>
                                <div class="col-md-4">
                                    <label for="title">BVN Data</label>
                                     <input id="title" type="number" name="bvn" class="validate form-control"  value="{{Auth::user()->agricLoanProfile->bvn}}" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="amount">Account Bank Name</label>
                                    <input id="account_bank_name" type="text" name="account_bank_name" class="validate form-control"  value="{{Auth::user()->agricLoanProfile->account_bank_name}}"  required>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="title">Account Number</label>
                                     <input id="title" type="text" name="account_number" class="validate form-control"  value="{{Auth::user()->agricLoanProfile->account_number}}" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="title">Guarantor Name</label>
                                     <input id="title" type="text" name="guarantor_name" class="validate form-control"  value="{{Auth::user()->agricLoanProfile->guarantor_name}}" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="amount">Guarantor Phone Number</label>
                                    <input id="guarantor_phone_number" type="text" name="guarantor_phone_number" class="validate form-control"  value="{{Auth::user()->agricLoanProfile->guarantor_phone_number}}" required>
                                </div>
                            </div>
                            <br>


                            <div class="row">
                                <div class="col-md-12">
                                    <label for="description">Guarantor Address</label>
                                     <textarea name="guarantor_address" class="form-control" required>{{Auth::user()->agricLoanProfile->guarantor_address}}</textarea>
                                </div>
                            </div><br>

                            <!-- <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="field">
                                            <input type="file" class="dropify" name="avatar" data-max-file-size="3M" />
                                        </div>
                                    </div>
                                </div>
                            </div><br> -->   
                                 
                                                
                            <div class="row">
                                <div class="input-field col s12 v2-mar-top-40"> 
                                    <button class="waves-effect waves-light btn-large full-btn" type="submit">Save Profile</button> 
                                </div>
                            </div>
                        </form>
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
