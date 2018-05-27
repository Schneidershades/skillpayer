@extends('layouts.users')

@section('content')
@include('partials._search')
	<section class="com-padd sec-bg-white">
		<div class="container">
			<div class="row">
				<div class="com-title">
					<h2>Find a Community<span> Member</span></h2>
					<p>Please put a username to confirm membership status.</p>
				</div>
				
				<div class="col-md-6">
					<div class="hom-cre-acc-left hom-cre-acc-right">
						
                        @include('partials._errors')
                        @if ($found != null)
                        	<div class="alert alert-success">
                        		<h4>Username: {{$found->username}}</h4>
                        		
                        		<h4>User Package: {{$found->package->name ? $found->package->name : 'Not Available'}}</h4>
                        		
                        		<h4>Joined: {{$found->created_at->diffForHumans()}}</h4>
                        		
                        		<h4>Full Name: {{$found->profile->full_name ? $found->profile->full_name : 'Not Available'}}</h4>
                        		
                        		<h4>Phone number: {{$found->profile->phone_number ? $found->profile->phone_number : 'Not Available'}}</h4>
                        	</div>
                        @endif
						<form method="get" action="{{route('find.user')}}">
							<div class="row">
								<div class="input-field col s12">
									<label for="acc-name">Username</label>
									<input id="acc-name" name="user" type="text" class="validate">
									<br><br>
								</div>
							</div>
							
							<div class="row">
								 <button value="Search" class="waves-effect waves-light btn-large full-btn" >Search </button>
							</div>
						</form>
					</div>
				</div>
				<div class="col-md-6">
					<div class="hom-cre-acc-left">
						<h3>A few reasons you’ll love Skill payer <span>Partners</span></h3>
						<ul>
							<li> <img src="assets/images/icon/7.png" alt="">
								<div>
									<h5>Find opportunity at sales cost</h5>
									<p>Imagine you have made your presence online through a local online directory, but your competitors have..</p>
								</div>
							</li>
							<!-- <li> <img src="images/icon/5.png" alt="">
								<div>
									<h5>Advertising Your Business</h5>
									<p>Advertising your business to area specific has many advantages. For local businessmen, it is an opportunity..</p>
								</div>
							</li>
							<li> <img src="images/icon/6.png" alt="">
								<div>
									<h5>Develop Brand Image</h5>
									<p>Your local business too needs brand management and image making. As you know the local market..</p>
								</div>
							</li> -->
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection