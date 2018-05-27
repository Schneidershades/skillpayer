@extends('layouts.users')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/assets/plugins/datatables/datatables.css')}}"/>
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
                    <h4>Manage Listings</h4>
                    <div class="db-list-com tz-db-table">
                        <div class="ds-boar-title">
                            <h2>All Pending Withdrawals</h2>
                        </div>
                        <table id="footer-search" class="table table-striped table-bordered"  style="overflow-x:auto;">
                            <thead>
                                <tr>
                                    <th>Timestamp</th>
                                    <th>Username</th>
                                    <th>Account Name</th>
                                    <th>Bank Name</th>
                                    <th>Account Number</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($withdrawals as $withdrawal)
                                <tr>
                                    <td>{{$withdrawal->created_at}}</td>
                                    <td>{{$withdrawal->user->username}}</td>
                                    <td><span class="db-list-ststus">{{$withdrawal->account_name}}</span>
                                    <td>{{$withdrawal->bank}}</td>
                                    <td><span class="db-list-ststus">{{$withdrawal->account_number}}</span>
                                    </td>

                                    <td><span class="db-list-rat">{{number_format($withdrawal->amount , 2, '.', ',')}}</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if($withdrawals->count() > 0)
                        <a href="{{route('admin.withdrawal.clear')}}" class="btn btn-primary">Clear The Withdrawls</a>
                        @endif
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
