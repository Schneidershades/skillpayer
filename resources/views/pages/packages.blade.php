@extends('layouts.users')

@section('content')
@include('partials._search')
<section class="dir-pa-sp-top dir-pa-sp-top-bg v4-pri-bg">
	<div class="rows">
		<div class="container">
			<div class="text-center"><br><br><br>			
				<h2 style="color:white">FIND A PLAN THAT SUITES YOUR OBJECTIVES</h2>
				<p style="color:white">With each plan, be assured of excellent service delivery and awesome support you can rely on. We are committed to making you achieve your financial goals and life increase! Please ensure you have sufficient SkillCoin(SKC) in your wallet before picking a premium package. You shall succeed. </p>
			</div>

			<div class="v4-price-list com-padd">
				@foreach($packages as $package)
				<div class="col-md-4">
					<div class="v4-pril-inn">
						<div class="v4-pril-inn-top">
							<h2>{{$package->name}}</h2>
							<p class="v4-pril-price"><span class="v4-pril-curr"></span> <b>{{$package->amount}}</b> 
								<span class="v4-pril-mon">/ SKC</span></p>
						</div>
						<div class="v4-pril-inn-bot">
							<ul>

							@foreach($package->packageFeatures as $features)	
							<li><i class="fa fa-check"></i>{{$features->description}}</li>
							@endforeach
							</ul>
							<a class="waves-effect waves-light btn-large full-btn" href="{{route('account.buy.package.create.start')}}">Get Started</a>
						</div>
					</div>
				</div>
				@endforeach			
			</div>
		</div>
	</div>
</section>
@endsection