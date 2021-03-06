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
                    <h4>Self and Referral Downline Transactions</h4>
                    <div class="db-list-com tz-db-table">
                        <div class="ds-boar-title">
                            <h2>Self and Referral Downline Transaction History</h2>
                            <p>All your Self and Referral Downline transaction history overtime</p>
                        </div>
                        <div class="db-mak-pay-bot">              
                            <a href="{{route('account.buy.package.index')}}" class="btn btn-primary">Back to Package History</a> 
                        </div>
                        <table id="footer-search" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Timestamp</th>
                                    <th>Title</th>
                                    <th>Txn No.</th>
                                    <th>Details</th>
                                    <th>Type</th>
                                    <th>Amount Paid</th>
                                    <th>Status</th>
                                    <th>Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $h)
                                <tr>
                                    <td>{{$h->created_at}}</td>
                                    <td>{{$h->title}}</td>
                                    <td>{{$h->identifier}}</td>
                                    <td>{{$h->details}}</td>
                                    <td>{{$h->transaction_type}}</td>
                                    <td>{{$h->amount_paid}}SKC</td>
                                    <td>{{$h->remarks}} </td>
                                    <td>{{$h->balance}}SKC</td>
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
