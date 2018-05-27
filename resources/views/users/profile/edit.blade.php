@extends('layouts.users')

@section('stylesheets')
<link href="/assets/css/dropify.css" type="text/css" rel="stylesheet" />
@endsection

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
              <h2>Edit Profile</h2>
              <p>You can edit your profile here</p>

              @include('partials._errors')
            </div>
            <div class="tz2-form-pay tz2-form-com">
              <form action="{{route('account.profile.update', [$user->id] )}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-4">
                        <label for="title">Full Name</label>
                         <input id="title" type="text" name="fullname" class="validate form-control" required value="{{Auth::user()->profile->fullname}}">
                    </div>
                    <div class="col-md-4">
                        <label for="title">Email</label>
                         <input id="title" type="text" name="email" class="validate form-control" disabled required value="{{Auth::user()->email}}">
                    </div>

                    <div class="col-md-4">
                        <label for="title">Username</label>
                         <input id="title" type="text" name="username" class="validate form-control" disabled required value="{{Auth::user()->username}}">
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-md-12">
                        <label for="description">Biography</label>
                         <textarea name="biography" class="form-control" >{{Auth::user()->profile->biography}}</textarea>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-4">
                        <label for="amount">Personal Contact</label>
                        <input id="phone_number" type="text" name="phone_number" class="validate form-control"  value="{{Auth::user()->profile->phone_number}}">
                    </div>

                    <div class="col-md-4">
                        <label for="amount">Office Contact</label>
                        <input id="mobile_number" type="text" name="mobile_number" class="validate form-control"  value="{{Auth::user()->profile->mobile_number}}">
                    </div>

                    <div class="col-md-4">
                        <label for="amount">Website</label>
                        <input id="contact" type="text" name="website" class="validate form-control"  value="{{Auth::user()->profile->website}}">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-4">
                        <label for="amount">Country</label>
                        <select name="country_id" id="countryId"  onchange="showState(this.value)">
                            <option value="" selected>Select Country</option>
                            @foreach($countries as $countries)
                            <option value="{{$countries->id}}">{{$countries->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="amount">State</label>
                        <select name="state_id" id="stateId"  onchange="showCity(this.value)">
                            
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="amount">City</label>
                        <select name="city_id" id="cityId" >
                            
                        </select>
                    </div>
                </div><br>

                 <div class="row">
                    <div class="col-md-12">
                        <label for="description">Address</label>
                         <textarea name="address" class="form-control" ></textarea>
                    </div>
                </div><br>   

                <!--<div class="row">-->
                <!--    <div class="col-md-4">-->
                <!--        <label for="amount">Postal Code</label>-->
                <!--        <input id="phone_number" type="number" name="postal_code" min="0" class="validate form-control"  value="{{Auth::user()->profile->postal_code}}">-->
                <!--    </div>-->

                <!--    <div class="col-md-4">-->
                <!--        <label for="amount">Facebook Username</label>-->
                <!--        <input id="mobile_number" type="text" name="facebook" class="validate form-control"  value="{{Auth::user()->profile->facebook}}">-->
                <!--    </div>-->

                <!--    <div class="col-md-4">-->
                <!--        <label for="amount">Twitter Username</label>-->
                <!--        <input id="mobile_number" type="text" name="twitter" class="validate form-control"  value="{{Auth::user()->profile->twitter}}">-->
                <!--    </div>-->
                <!--</div><br>-->

                <!--<div class="row">-->
                <!--    <div class="col-md-4">-->
                <!--        <label for="amount">Google Plus Link</label>-->
                <!--        <input id="phone_number" type="text" name="googleplus"  class="validate form-control"  value="{{Auth::user()->profile->googleplus}}">-->
                <!--    </div>-->

                <!--    <div class="col-md-4">-->
                <!--        <label for="amount">Instagram Link</label>-->
                <!--        <input id="mobile_number" type="text" name="instagram" class="validate form-control"  value="{{Auth::user()->profile->instagram}}">-->
                <!--    </div>-->

                <!--    <div class="col-md-4">-->
                <!--        <label for="amount">Pinterest Link</label>-->
                <!--        <input id="mobile_number" type="text" name="pinterest" class="validate form-control"  value="{{Auth::user()->profile->pinterest}}">-->
                <!--    </div>-->
                <!--</div><br>-->

                <!-- <div class="row">-->
                <!--    <div class="col-md-4">-->
                <!--        <label for="amount">Linkedin Link</label>-->
                <!--        <input id="phone_number" type="text" name="linkedin" class="validate form-control"  value="{{Auth::user()->profile->linkedin}}">-->
                <!--    </div>-->

                <!--    <div class="col-md-4">-->
                <!--        <label for="amount">Vimeo Link</label>-->
                <!--        <input id="mobile_number" type="text" name="vimeo" class="validate form-control"  value="{{Auth::user()->profile->vimeo}}">-->
                <!--    </div>-->

                <!--    <div class="col-md-4">-->
                <!--        <label for="amount">YouTube Link</label>-->
                <!--        <input id="mobile_number" type="text" name="youtube" class="validate form-control"  value="{{Auth::user()->profile->youtube}}">-->
                <!--    </div>-->
                <!--</div><br>-->
                
                
                
                <!--<div class="row">-->
                <!--    <div class="col-md-4">-->
                <!--        <label for="title">New Password</label>-->
                <!--         <input id="title" type="password" name="password" class="form-control" >-->
                <!--    </div>-->
                <!--</div><br>-->


                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="field">
                                <input type="file" class="dropify" name="avatar" data-max-file-size="3M" />
                            </div>
                        </div>
                    </div>
                </div><br>   
                     
                                    
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
  </section>
  <!--END DASHBOARD-->
  
<!--MOBILE APP-->
@include('users.partials._padAdvert')
@section('scripts')
<script src="{{URL::to('/assets/js/dropify.js')}}"></script>
<script>

    $('.dropify').dropify();

    function showSubCategory(categoryID) {
        $('#subCategoryId').empty().append('<option value="">--Please select a sub category---</option>');
        //var id = id;
        var url = '/js/advert-subcategory/' + categoryID;
        console.log(url);
        $.get(url, function (data) {
            console.log(data);
           $.each(data, function (i, data) {
              //alert(data.code);
                $("#subCategoryId").append("<option value='"+data.id+"'>"+data.name+"</option>");
            });
        });
    }

    function showState(stateId) {
        $('#stateId').empty().append('<option value="">--Please select a State---</option>');
        //var id = id;
        var url = '/js/states/' + stateId;
        console.log(url);
        $.get(url, function (data) {
            console.log(data);
           $.each(data, function (i, data) {
              //alert(data.code);
                $("#stateId").append("<option value='"+data.id+"'>"+data.name+"</option>");
            });
        });
    }

    function showCity(cityId) {
        $('#cityId').empty().append('<option value="">--Please select a City---</option>');
        //var id = id;
        var url = '/js/city/' + cityId;
        console.log(url);
        $.get(url, function (data) {
            console.log(data);
           $.each(data, function (i, data) {
              //alert(data.code);
                $("#cityId").append("<option value='"+data.id+"'>"+data.name+"</option>");
            });
        });
    }

    

</script>
@endsection



