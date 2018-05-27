@extends('layouts.users')

@section('stylesheets')
<link href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" type="text/css" rel="stylesheet" />
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
              <h2>Create Service Profile</h2>
              <p>You can create a new service profile here</p>

              @include('partials._errors')
            </div>
            <div class="tz2-form-pay tz2-form-com">
              <form action="{{route('admin.partner.store')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12">
                        <label for="title">name</label>
                         <input id="title" type="text" name="name" class="validate form-control" required>
                    </div>                    
                </div><br>

                 <div class="row">
                    <div class="col-md-12">
                        <label for="description">Address</label>
                         <textarea name="address" class="form-control" required></textarea>
                    </div>
                </div><br>

                 <div class="row">
                    <div class="col-md-12">
                        <label for="description">Incentives</label>
                         <textarea name="incentives" class="form-control" required></textarea>
                    </div>
                </div><br> 

                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="field">
                                <input type="file" class="dropify" name="featured" />
                            </div>
                        </div>
                    </div>
                </div><br>               
                <div class="row">
                    <div class="input-field col s12 v2-mar-top-40"> 
                        <button class="waves-effect waves-light btn-large full-btn" type="submit">Save Partner</button> 
                    </div>
                </div>
            </form>
            </div>


          </div>

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
                  <p><i>Incentives: {{$partner->incentives}}</i></p>
                  <p>Address: {{$partner->address}} </p>
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
@endsection

@section('scripts')
<script src="{{URL::to('https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js')}}"></script>
<script>
    
    $('.dropify').dropify();

</script>
@endsection

