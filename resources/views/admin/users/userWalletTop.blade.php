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
                    <h4>Wallet Crediting by admin</h4>
                    <div class="db-list-com tz-db-table">
                        <div class="ds-boar-title">
                            <h2>Credit User : {{$user->username}}</h2>
                        </div>
                        <div class="hom-cre-acc-left hom-cre-acc-right">
                            <div class="">
                                @include('partials._errors')
                                <form action="{{route('admin.wallet.update', $user->id)}}" method="post">
                                    {{ csrf_field() }}

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="amount" type="number" name="amount" min="0" class="validate form-control" required>
                                            <label for="amount">Amount</label>
                                        </div>
                                    </div> 

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="amount" type="number" name="sp_amount" min="0" class="validate form-control" required>
                                            <label for="amount">SP Amount</label>
                                        </div>  
                                    </div>                              
                                                        
                                    <div class="row">
                                        <div class="input-field col s12 v2-mar-top-40"> <button class="waves-effect waves-light btn-large full-btn" type="submit">Process Transfer</button> </div>
                                    </div>
                                </form>
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
@include('users.partials._padAdvert')
@endsection
