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
              <h2>Edit Profile for {{$user->username}} </h2> 
              <p>You can edit your profile here</p>

              @include('partials._errors')
            </div>
            <div class="tz2-form-pay tz2-form-com">

            <div class="row">
                <div class="col-md-3"> 
                    <a href="{{route('admin.user.transactions', $user->id)}}" class="btn btn-primary" type="submit">Show Transactions</a> 
                </div>
                <div class="col-md-3"> 
                    <a href="{{route('admin.user.credit', $user->id)}}"  class="btn btn-primary" type="submit">Credit Wallet</a> 
                </div>

                <div class="col-md-3"> 
                    <a href="{{route('admin.user.debit', $user->id)}}" class="btn btn-primary" type="submit">Debit Wallet</a> 
                </div>

                <div class="col-md-3"> 
                    <a href="{{route('admin.user.change.password', $user->id)}}" class="btn btn-primary" type="submit">Change Password</a> 
                </div>
            </div>
            
            
            <div class="row">
                <div class="col-md-3"> 
                    <a href="{{route('admin.user.change.package', $user->id)}}" class="btn btn-primary" type="submit">Change Package</a>
                </div>
            </div>

              <form action="{{route('admin.user.update', [$user->id] )}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-4">
                        <label for="title">Full Name</label>
                         <input id="title" type="text" name="fullname" class="validate form-control" required value="{{$user->profile->fullname}}">
                    </div>
                    <div class="col-md-4">
                        <label for="title">Email</label>
                         <input id="title" type="text" name="email" class="validate form-control" disabled required value="{{$user->email}}">
                    </div>

                    <div class="col-md-4">
                        <label for="title">Username</label>
                         <input id="title" type="text" name="username" class="validate form-control" disabled required value="{{$user->username}}">
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-md-12">
                        <label for="description">Biography</label>
                         <textarea name="biography" class="form-control" >{{$user->profile->biography}}</textarea>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-4">
                        <label for="amount">Personal Contact</label>
                        <input id="phone_number" type="text" name="phone_number" class="validate form-control"  value="{{$user->profile->phone_number}}">
                    </div>

                    <div class="col-md-4">
                        <label for="amount">Office Contact</label>
                        <input id="mobile_number" type="text" name="mobile_number" class="validate form-control"  value="{{$user->profile->mobile_number}}">
                    </div>

                    <div class="col-md-4">
                        <label for="amount">Website</label>
                        <input id="contact" type="text" name="website" class="validate form-control"  value="{{$user->profile->website}}">
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



