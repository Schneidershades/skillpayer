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
            <div class="tz-2">
                <div class="tz-2-com tz-2-main">
                    <h4>Manage Listings</h4>
                    <div class="db-list-com tz-db-table">
                        <div class="ds-boar-title">
                            <h2>Advert Listings</h2>
                            <p>All the your adverts</p>
                        </div>
                        <table id="footer-search" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($adverts as $advert)
                                <tr>
                                    <td>{{$advert->title}}</td>
                                    <td>{{$advert->category->name}}</td>
                                    <td><span class="db-list-ststus">{{$advert->price}}SKC</span>
                                    </td>
                                    <td><span class="db-list-rat">{{$advert->created_at}}</span>
                                    </td>
                                    <td><a href="" class="db-list-edit">Edit</a><a href="" class="db-list-edit">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--RIGHT SECTION-->
            @include('users.partials._notification')
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
