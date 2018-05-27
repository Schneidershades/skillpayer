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
                            <h2>Digital Tv Transaction History</h2>
                            <p>All your digital tv transaction history overtime</p>
                        </div>
                        <table id="footer-search" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Timestamp</th>
                                    <th>Title</th>
                                    <th>Txn No.</th>
                                    <th>Network</th>
                                    <th>Amount (SKC)</th>
                                    <th>Amount Paid (SKC)</th>

                                    <th>Commission</th>
                                    <th>User</th>
                                    <th>Phone</th>

                                    <th>Type</th>
                                    <th>Code</th>

                                    <th>Api Used</th>
                                    <th>Api Response</th>
                                    <th>Status(SKC)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($history as $h)
                                <tr>
                                    <td>{{$h->created_at}}</td>
                                    <td>{{$h->title}}</td>
                                    <td>{{$h->identifier}}</td>
                                    <td>{{$h->tv_network}}</td>
                                    <td>{{$h->amount}}</td>
                                    <td>{{$h->amount_paid}}SKC</td>

                                    <td>{{$h->commission_applied}}SKC</td>
                                    <td>{{$h->user->username}}</td>
                                    <td>{{$h->phone}}</td>

                                    <td>{{$h->tv_type}} </td>
                                    <td>{{$h->tv_code}} </td>

                                    <td>{{$h->api_used}} </td>
                                    <td>{{$h->api_response}} </td>
                                    <td>{{$h->status}} </td>
                                    <td><a class="btn btn-primary"  href="{{route('admin.tv.details', $h->identifier)}}">View Transaction</a></td>
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
    <script src="{{ URL::to('/assets/plugins/datatables/datatables.rowreorder.min.js')}}"></script>
    <script src="{{ URL::to('/assets/plugins/datatables/datatables.responsive.min.js')}}"></script>
    
    <script type="text/javascript">
         $.extend($.fn.dataTable.defaults, {
          dom: 'Bfrtip',
          buttons: ['copy', 'csv', 'excel', 'print'],

        });

        // $("#footer-search").DataTable();  
        
         $('#footer-search').DataTable( {
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true
        } );
    </script>
    
@endsection
