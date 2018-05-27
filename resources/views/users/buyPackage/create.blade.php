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
                            <h2>Buy Package</h2>

                            <p>Transfer id : {{$transaction->identifier}}</p>
                        </div>
                        <div class="hom-cre-acc-left hom-cre-acc-right">
                            <div class="">
                                @include('partials._errors')
                                <form action="{{route('account.buy.package.store', $transaction)}}" method="post">
                                    {{ csrf_field() }}

                                    <div class="row">
                                       
                                        <div class="input-field col s6">
                                            <select name="package_id" required>
                                                <option value="" disabled selected>Select Package</option>
                                                @foreach($packages as $package)
                                                <option value="{{$package->id}}">{{$package->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>                            
                                                        
                                    <div class="row">
                                        <div class="input-field col s12 v2-mar-top-40"> <button class="waves-effect waves-light btn-large full-btn" type="submit">Process Transaction</button> </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>
<!--END DASHBOARD-->
<!--MOBILE APP-->
@include('users.partials._padAdvert')
@endsection
