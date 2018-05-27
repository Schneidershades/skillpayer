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
                    <h4>Submit Listings</h4>
                    <div class="db-list-com tz-db-table">
                        <div class="ds-boar-title">
                            <h2>Services</h2>

                            <p>Transfer id : </p>
                        </div>
                        <div class="hom-cre-acc-left hom-cre-acc-right">
                            <div class="">
                                @include('partials._errors')
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="list-mig-like-com com-mar-bot-30" data-dismiss="modal" data-toggle="modal" data-target="#power" href="#">
                                            <div class="list-mig-lc-img"> <img src="{{URL::to('/assets/images/listing/power.png')}}" alt=""> <span class="home-list-pop-rat list-mi-pr">Power</span> </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-3">
                                        <div class="list-mig-like-com com-mar-bot-30" data-dismiss="modal" data-toggle="modal" data-target="#airtime" href="#">
                                            <div class="list-mig-lc-img"> <img src="{{URL::to('/assets/images/listing/airtime.png')}}" alt=""> <span class="home-list-pop-rat list-mi-pr">Airtime</span> </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="list-mig-like-com com-mar-bot-30" data-dismiss="modal" data-toggle="modal" data-target="#data" href="#">
                                            <div class="list-mig-lc-img"> <img src="{{URL::to('/assets/images/listing/data.png')}}" alt=""> <span class="home-list-pop-rat list-mi-pr">Data</span> </div>
                                            
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="list-mig-like-com com-mar-bot-30" data-dismiss="modal" data-toggle="modal" data-target="#digitalTv" href="#">
                                            <div class="list-mig-lc-img"> <img src="{{URL::to('/assets/images/listing/tv.png')}}" alt=""> <span class="home-list-pop-rat list-mi-pr">Digital Tv</span> </div>
                                            
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="list-mig-like-com com-mar-bot-30" data-dismiss="modal" data-toggle="modal" data-target="#sms" href="#">
                                            <div class="list-mig-lc-img"> <img src="{{URL::to('/assets/images/listing/sms.png')}}" alt=""> <span class="home-list-pop-rat list-mi-pr">SMS</span> </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>
<!--END DASHBOARD-->
<!--MOBILE APP-->
@include('users.partials._padAdvert')


@endsection

@section('scripts')
    <script type="text/javascript">

        function showPlans(network) {
              $('#datacode').empty().append('<option value="">--Please select a plan---</option>');
              //var id = id;
              var url = '{{ URL::to('/js/data')}}/' + network;
              console.log(url);
              $.get(url, function (data) {
                  console.log(data);
                 $.each(data, function (i, data) {
                    //alert(data.code);
                      $("#datacode").append("<option value='"+data.code+"'>"+data.title+"</option>");
                  });
              });
        }


        function showBouquets(network) {
              $('#tvcode').empty().append('<option value="">--Please Select Digital TV Network---</option>');
              //var id = id;
              var url = '{{ URL::to('/js/tv')}}/' + network;
              console.log(url);
              $.get(url, function (data) {
                  console.log(data);
                 $.each(data, function (i, data) {
                    //alert(data.code);
                      $("#tvcode").append("<option value='"+data.code+"'>"+data.title+"</option>");
                  });
              });
        }
    </script>
@endsection
