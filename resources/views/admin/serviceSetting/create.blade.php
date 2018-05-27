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
              <h2>Create Service Profile</h2>
              <p>You can create a new service profile here</p>

              @include('partials._errors')
            </div>
            <div class="tz2-form-pay tz2-form-com">
              <form action="{{route('admin.service-setting.create')}}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-4">
                        <label for="title">Title</label>
                         <input id="title" type="text" name="title" class="validate form-control" required value="{{$service->title}}">
                    </div>
                    <div class="col-md-4">
                        <label for="title">Service Code</label>
                         <input id="title" type="text" name="code" class="validate form-control" required value="{{$service->code}}">
                    </div>

                    <div class="col-md-4">
                        <label for="title">Type</label>
                         <input id="title" type="text" name="type" class="validate form-control" required value="{{$service->type}}">
                    </div>
                </div><br>                
                <div class="row">
                    <div class="col-md-4">
                        <label for="amount">Service Charge</label>
                        <input id="service_charge" type="text" name="service_charge" class="validate form-control"  value="{{$service->service_charge}}">
                    </div>

                    <div class="col-md-4">
                        <label for="amount">Mimimum Value</label>
                        <input id="minimum_value" type="text" name="minimum_value" class="validate form-control"  value="{{$service->minimum_value}}">
                    </div>

                    <div class="col-md-4">
                        <label for="amount">Maximum Value</label>
                        <input id="maximum_value" type="text" name="maximum_value" class="validate form-control"  value="{{$service->maximum_value}}">
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-md-4">
                        <label for="amount">Service Charge</label>
                        <input id="percentage_commission" type="text" name="percentage_commission" class="validate form-control"  value="{{$service->percentage_commission}}">
                    </div>

                    <div class="col-md-4">
                        <label for="amount">Mimimum Value</label>
                        <input id="minimum_value" type="text" name="minimum_value" class="validate form-control"  value="{{$service->minimum_value}}">
                    </div>

                    <div class="col-md-4">
                        <label for="amount">Maximum Value</label>
                        <input id="api_provider" type="text" name="api_provider" class="validate form-control"  value="{{$service->api_provider}}">
                    </div>
                </div><br>
                                    
                <div class="row">
                    <div class="input-field col s12 v2-mar-top-40"> 
                        <button class="waves-effect waves-light btn-large full-btn" type="submit">Save Settings</button> 
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
