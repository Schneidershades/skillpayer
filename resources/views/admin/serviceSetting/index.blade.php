@extends('layouts.users')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/assets/plugins/datatables/datatables.css')}}">
@endsection

@section('content')

@include('partials._search')
<!--DASHBOARD-->
<section>
    <div class="tz">
        @include('users.partials._user_nav')
        <!--CENTER SECTION-->
            <div class="tz-4">
                <div class="tz-2-com tz-2-main">
                    <h4>Transactions</h4>
                    <div class="db-list-com tz-db-table">
                        <div class="ds-boar-title">
                            <h2>All available settings installed</h2>
                        </div>
                        <table id="footer-search" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Code.</th>
                                    <th>Type</th>
                                    <th>Service Charge</th>
                                    <th>Minimum</th>
                                    <th>Maximum</th>
                                    <th>Percentage</th>
                                    <th>Api Provider</th>
                                    <th>Available</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $h)
                                <tr>
                                    <td>{{$h->title}}</td>
                                    <td>{{$h->code}}</td>
                                    <td>{{$h->type}}</td>
                                    <td>{{$h->service_charge}}</td>
                                    <td>{{$h->minimum_value}}</td>
                                    <td>{{$h->maximum_value}}</td>
                                    <td>{{$h->percentage_commission}}</td>
                                    <td>{{$h->api_provider}}</td>
                                    <td>{{$h->enable}}</td>
                                </tr>
                                @endforeach
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
@endsection


@section('scripts')    

    <script src="{{ URL::to('/assets/plugins/datatables/datatables.js')}}"></script>
    <script type="text/javascript">
         $.extend($.fn.dataTable.defaults, {
          dom: 'Bfrtip',
          buttons: ['copy', 'csv', 'excel', 'print'],

        });

        $("#footer-search").DataTable();        
    </script>
    
@endsection
