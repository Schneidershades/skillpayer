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
                <h4>Dashboard</h4>
                
                <div class="db-list-com tz-db-table">
                    <div class="ds-boar-title">
                        <h2>All Transfer Transactions</h2>
                        <p>All Transfers made by you</p>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{route('account.transfers.create.start')}}" class="btn btn-primary">Create Transfers</a>
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>
                    </div>
                    <table class="responsive-table bordered">
                        <thead>
                            <tr>
                                <th>Transfer id</th>
                                <th>Receiver</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transfers as $transfer)
                            <tr>
                                <td>{{$transfer->identifier}}</td>
                                <td>{{$transfer->sendMoney->name}}</td>
                                <td><span class="db-list-rat">{{$transfer->amount}}-{{$transfer->currency}}</span>
                                </td>
                                <td><span class="db-list-ststus">{{$transfer->status}}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                
            </div>
        </div>
    </div>
</section>
<!--END DASHBOARD-->
<!--MOBILE APP-->
@include('users.partials._padAdvert')
@endsection
