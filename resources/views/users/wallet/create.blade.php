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
                            <h2>Fund Your Wallet</h2>

                            <!--<p>Transfer id : {{$wallet->identifier}}</p>-->
                        </div>
                        <div class="hom-cre-acc-left hom-cre-acc-right">
                            <div class="">
                                @include('partials._errors')
                                
                                <h5>You can only fund your wallet by transfer please talk to your <b>upline</b> or send a mail to <b>skillpayer@yandex.com</b></h5>
                                
                                <!--<form action="{{route('pay')}}" method="post">-->
                                <!--    {{ csrf_field() }}-->

                                <!--    <div class="row">-->
                                <!--        <div class="input-field col s6">-->
                                <!--            <label for="amount">Amount</label>-->
                                <!--            <input id="amount" type="number" name="amount" class="validate" required placeholder="Funding Amount">-->
                                <!--            <input type="hidden" name="email" value="{{Auth::user()->email}}">-->
                                <!--            <input type="hidden" name="transaction_ref" value="fund{{$wallet->identifier}}">-->
                                <!--            <input type="hidden" name="metadata" value="{{ json_encode($array = ['transaction_id' => 'fund'.$wallet->identifier,]) }}" >-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--    <div class="row">-->
                                <!--        <div class="input-field col s12">-->
                                <!--            <label for="amount">Payment Method</label>-->
                                <!--            <select name="payment_method" class="form-control" required>-->
                                <!--                <option value="" disabled selected>Please select Payment Method</option>-->
                                <!--                <option value="card">Card</option>-->
                                <!--            </select>-->
                                <!--        </div>-->
                                <!--    </div>                              -->
                                                        
                                <!--    <div class="row">-->
                                <!--        <div class="input-field col s12 v2-mar-top-40"> <button class="waves-effect waves-light btn-large full-btn" type="submit">Process Transaction</button> </div>-->
                                <!--    </div>-->
                                <!--</form>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--RIGHT SECTION-->
    </div>
</section>
<!--END DASHBOARD-->
<!--MOBILE APP-->
<section class="web-app com-padd">
    <div class="container">
        <div class="row">
            <div class="col-md-6 web-app-img"> <img src="images/mobile.png" alt="" /> </div>
            <div class="col-md-6 web-app-con">
                <h2>Looking for the Best Service Provider? <span>Get the App!</span></h2>
                <ul>
                    <li><i class="fa fa-check" aria-hidden="true"></i> Find nearby listings</li>
                    <li><i class="fa fa-check" aria-hidden="true"></i> Easy service enquiry</li>
                    <li><i class="fa fa-check" aria-hidden="true"></i> Listing reviews and ratings</li>
                    <li><i class="fa fa-check" aria-hidden="true"></i> Manage your listing, enquiry and reviews</li>
                </ul> <span>We'll send you a link, open it on your phone to download the app</span>
                <form>
                    <ul>
                        <li>
                            <input type="text" placeholder="+01" /> </li>
                        <li>
                            <input type="number" placeholder="Enter mobile number" /> </li>
                        <li>
                            <input type="submit" value="Get App Link" /> </li>
                    </ul>
                </form>
                <a href="#"><img src="images/android.png" alt="" /> </a>
                <a href="#"><img src="images/apple.png" alt="" /> </a>
            </div>
        </div>
    </div>
</section>
@endsection
