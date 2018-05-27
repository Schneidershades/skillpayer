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
                    <h4>Transactions</h4>
                    <div class="db-list-com tz-db-table">
                        <div class="ds-boar-title">
                            <h2>{{$transaction->identifier}} Transaction Detail</h2>
                            <p>{{$transaction->identifier}} done by {{$transaction->user->username}}</p>
                            @include('partials._errors')
                            <table id="footer-search" class="table table-striped table-bordered nowrap">
                    
                                <tbody>
                                    <td>Modify</td>
                                     <tr>
                                        <td> Created at </td>
                                        <td>{{$transaction->created_at}}</td>
                                    </tr>

                                    <tr>
                                        <td>Title </td>
                                        <td> {{$transaction->title}}</td>
                                    </tr>

                                     <tr>
                                        <td>Details</td>
                                        <td>{{$transaction->details}}</td>
                                    </tr>

                                    <tr>
                                        <td>Transaction by</td>
                                        <td>{{$transaction->user->username}} </td>
                                    </tr>

                                     <tr>
                                        <td> Transaction Type</td>
                                        <td>{{$transaction->transaction_type}}</td>
                                    </tr>

                                     <tr>
                                        <td>Amount Paid</td>
                                        <td> {{$transaction->amount_paid}}</td>
                                    </tr>

                                     <tr>
                                        <td>Remarks</td>
                                        <td>{{$transaction->remarks}}</td>
                                    </tr>                   
                                    <tr>
                                        <td> Balance </td>
                                        <td>{{$transaction->balance}}</td>
                                    </tr>
                                    
                                    @if($transaction->status == 'Refund' || $transaction->status == 'Successful')

                                    @else
                                    <tr>
                                        <td> Make Action</td>
                                        <td>
                                            <a href="{{route('admin.refund.transaction', $transaction->identifier)}}" class="btn btn-primary">
                                                Refund transaction 
                                            </a>
                                        </td>
                                    </tr>
                                    @endif
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
