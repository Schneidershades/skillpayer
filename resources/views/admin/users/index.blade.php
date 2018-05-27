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
                    <h4>Manage Users</h4>
                    <div class="db-list-com tz-db-table">
                        <div class="ds-boar-title">
                            <h2>Manage Users</h2>
                            <p>All the your Users</p>
                        </div>
                        @include('partials._errors')
                        <table id="footer-search" class="table table-striped table-bordered nowrap" style="overflow-x:auto;">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <!--<th>Upline</th>-->
                                    <th>Email</th>
                                    <th>Package</th>
                                    <th>SKC Balance</th>
                                    <th>PV Balance</th>
                                    <th>Action</th>
                                    <th>Date Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->username}}</td>
                                    <!--<td>{{$user->connection}}</td>-->
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->package->name}}</td>
                                    <td>{{number_format($user->wallet->skill_coin_balance, 2, '.', ',')}}
                                    </td>

                                    <td>{{$user->wallet->pv_balance}}</td>
                                    
                                    <td><a href="{{route('admin.user.edit', $user->id)}}" class="db-list-edit">View</a>
                                    </td>
                                    
                                    <td>{{$user->created_at}}</td>
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
