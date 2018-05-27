@extends('layouts.users')

@section('stylesheets') 
    <li class="ref" rel="stylesheet" type="text/css" href="{{ URL::to('/assets/css/organo.css')}}">
    <style type="text/css">


/*Now the CSS*/
.tree * {margin: 0; padding: 0;}

.tree ul {
    padding-top: 20px; position: relative;
    
    transition: all 0.5s;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
}

.tree li {
    float: left; text-align: center;
    list-style-type: none;
    position: relative;
    padding: 20px 5px 0 5px;
    
    transition: all 0.5s;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
}

/*We will use ::before and ::after to draw the connectors*/

.tree li::before, .tree li::after{
    content: '';
    position: absolute; top: 0; right: 50%;
    border-top: 1px solid #263a78;
    width: 50%; height: 20px;
}
.tree li::after{
    right: auto; left: 50%;
    border-left: 1px solid #263a78;
}

/*We need to remove left-right connectors from elements without 
any siblings*/
.tree li:only-child::after, .tree li:only-child::before {
    display: none;
}

/*Remove space from the top of single children*/
.tree li:only-child{ padding-top: 0;}

/*Remove left connector from first child and 
right connector from last child*/
.tree li:first-child::before, .tree li:last-child::after{
    border: 0 none;
}

/*Adding back the vertical connector to the last nodes*/
.tree li:last-child::before{
    border-right: 1px solid #263a78;
    border-radius: 0 5px 0 0;
    -webkit-border-radius: 0 5px 0 0;
    -moz-border-radius: 0 5px 0 0;
}
.tree li:first-child::after{
    border-radius: 5px 0 0 0;
    -webkit-border-radius: 5px 0 0 0;
    -moz-border-radius: 5px 0 0 0;
}

/*Time to add downward connectors from parents*/
.tree ul ul::before{
    content: '';
    position: absolute; top: 0; left: 50%;
    border-left: 1px solid #263a78;
    width: 0; height: 20px;
}

.tree li a{
    border: 1px solid #263a78;
    padding: 1em 0.75em;
    text-decoration: none;
    color: #666767;
    font-family: arial, verdana, tahoma;
    font-size: 0.85em;
    display: inline-block;
  
  /*
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
  */
    
    transition: all 0.5s;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
}

/* -------------------------------- */
/* Now starts the vertical elements */
/* -------------------------------- */

.tree ul.vertical, ul.vertical ul {
  padding-top: 0px;
  left: 50%;
}

/* Remove the downward connectors from parents */
.tree ul ul.vertical::before {
    display: none;
}

.tree ul.vertical li {
    float: none;
  text-align: left;
}

.tree ul.vertical li::before {
  right: auto;
  border: none;
}

.tree ul.vertical li::after{
    display: none;
}

.tree ul.vertical li a{
    padding: 10px 0.75em;
  margin-left: 16px;
}

.tree ul.vertical li::before {
  top: -20px;
  left: 0px;
    border-bottom: 1px solid #263a78;
    border-left: 1px solid #263a78;
    width: 20px; height: 60px;
}

.tree ul.vertical li:first-child::before {
  top: 0px;
  height: 40px;
}

/* Lets add some extra styles */

div.tree > ul > li > ul > li > a {
  width: 11em;
}

div.tree > ul > li > a {
  font-size: 1em;
  font-weight: bold;
}


/* ------------------------------------------------------------------ */
/* Time for some hover effects                                        */
/* We will apply the hover effect the the lineage of the element also */
/* ------------------------------------------------------------------ */
.tree li a:hover, .tree li a:hover+ul li a {
    background: #8dc63f;
  color: white;
  /* border: 1px solid #aaa; */
}
/*Connector styles on hover*/
.tree li a:hover+ul li::after, 
.tree li a:hover+ul li::before, 
.tree li a:hover+ul::before, 
.tree li a:hover+ul ul::before{
    border-color:  #aaa;
}


    </style>
@endsection

@section('content')

@include('partials._search')
<!--DASHBOARD-->
<section>
    <div class="row">
        <!--CENTER SECTION-->
            <div class="col-md-12">
                <div class="tz-2-com tz-2-main">
                    <h4>My Team</h4>
                    <div class="db-list-com tz-db-table">
                        <div class="ds-boar-title">
                            <h2>My Team</h2>
                        </div>

                        <div class="tree col-md-12">
                            <ul>
                                <li>
                                    <a href="#">{{$user->username}}</a>
                                    <ul>
                                        <li>
                                            @if($referrals)
                                            <ul class="vertical">
                                                @foreach($referrals as $first)
                                                <li><a href="#">{{$first->user->username}}</a>
                                                    @if($first->user->referrals)
                                                    <ul class="vertical">
                                                        @foreach($first->user->referrals as $second)
                                                        <li><a href="#">{{$second->user->username}}</a>
                                                            @if($second->user->referrals)
                                                            <ul class="vertical">
                                                                @foreach($second->user->referrals as $third)
                                                                <li><a href="#">{{$third->user->username}}</a>
                                                                    @if($third->user->referrals)
                                                                    <ul class="vertical">
                                                                        @foreach($third->user->referrals as $four)
                                                                        <li><a href="#">{{$four->user->username}}</a>
                                                                            @if($four->user->referrals)
                                                                            <ul class="vertical">
                                                                                @foreach($four->user->referrals as $five)
                                                                                <li><a href="#">{{$five->user->username}}</a>
                                                                                    @if($five->user->referrals)
                                                                                    <ul class="vertical">
                                                                                        @foreach($five->user->referrals as $six)
                                                                                        <li><a href="#">{{$six->user->username}}</a>
                                                                                            @if($six->user->referrals)
                                                                                            <ul class="vertical">
                                                                                                @foreach($six->user->referrals as $seven)
                                                                                                <li><a href="#">{{$seven->user->username}}</a>
                                                                                                    @if($seven->user->referrals)
                                                                                                    <ul class="vertical">
                                                                                                        @foreach($seven->user->referrals as $eight)
                                                                                                        <li><a href="#">{{$eight->user->username}}</a>
                                                                                                            @if($eight->user->referrals)
                                                                                                            <ul class="vertical">
                                                                                                                @foreach($eight->user->referrals as $nine)
                                                                                                                <li><a href="#">{{$nine->user->username}}</a>
                                                                                                                    @if($nine->user->referrals)
                                                                                                                    <ul class="vertical">
                                                                                                                        @foreach($nine->user->referrals as $ten)
                                                                                                                        <li><a href="#">{{$ten->user->username}}</a>

                                                                                                                        </li>
                                                                                                                        @endforeach
                                                                                                                    </ul>
                                                                                                                    @endif
                                                                                                                </li>
                                                                                                                @endforeach
                                                                                                            </ul>
                                                                                                            @endif
                                                                                                        </li>
                                                                                                        @endforeach
                                                                                                    </ul>
                                                                                                    @endif
                                                                                                </li>
                                                                                                @endforeach
                                                                                            </ul>
                                                                                            @endif
                                                                                        </li>
                                                                                        @endforeach
                                                                                    </ul>
                                                                                    @endif
                                                                                </li>
                                                                                @endforeach
                                                                            </ul>
                                                                            @endif
                                                                        </li>
                                                                        @endforeach
                                                                    </ul>
                                                                    @endif
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                            @endif
                                                        </li>
                                                        @endforeach
                                                    </ul>
                                                    @endif
                                                </li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        
                                </div>
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
