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
                <div class="tz-2-main-com">
                    @include('partials._errors')
                    <div class="tz-2-main-1">
                        <div class="tz-2-main-2"  > 
                            <img src="{{URL::to('assets/images/icon/skc.png')}}" alt="" /><span style="font-size:13px">SKC (Skill Coin) Balance</span>
                            <h3 style="font-size:18px">{{Auth::user()->wallet->skill_coin_balance}} SKC</h3> 
                        </div>
                    </div>
                    <div class="tz-2-main-1">
                        <div class="tz-2-main-2"> 
                            <img src="{{URL::to('assets/images/icon/sp.jpg')}}" alt="" /><span style="font-size:13px">SP (Skill Point) Balance</span>
                            <h3 style="font-size:18px">
                                {{Auth::user()->wallet->pv_balance}} SP
                                </h3> 
                        </div>
                    </div>
                    <div class="tz-2-main-1">
                        <div class="tz-2-main-2"> 
                            <img src="{{URL::to('assets/images/icon/transfer2.png')}}" alt="" /><span style="font-size:13px">Transfer sent</span>
                            <h3 style="font-size:18px">{{$to + $adminDebit}} SKC</h3>
                        </div>
                    </div>

                    <div class="tz-2-main-1">
                        <div class="tz-2-main-2"> 
                            <img src="{{URL::to('assets/images/icon/withdrawals.png')}}" alt="" /><span style="font-size:13px">Transfer Recieved</span>
                            <h3 style="font-size:18px">{{$from + $trfrmAdmin }} SKC</h3>
                        </div>
                    </div>
                    <div class="tz-2-main-1">
                        <div class="tz-2-main-2"> 
                        <img src="{{URL::to('assets/images/icon/sales.png')}}" alt="" /><span style="font-size:13px">Sales</span>
                            <h3 style="font-size:18px">{{$salesData + $salesAirtime + $salesSms + $salesPower}}SKC</h3>
                            </div>
                    </div>
                    <div class="tz-2-main-1">
                        <div class="tz-2-main-2"> 
                        <img src="{{URL::to('assets/images/icon/plans.png')}}" alt="" /><span style="font-size:13px">Plan</span>
                            <h3 style="font-size:18px">
                                {{Auth::user()->package->name}}
                                </h3> 
                            </div>
                    </div>
                </div>
            </div>
        </div>
        @include('users.partials._notification')
    </div>
</section>
<!--END DASHBOARD-->
@include('users.partials._padAdvert')

@endsection
