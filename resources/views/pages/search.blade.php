@extends('layouts.users')

@section('content')
@include('partials._search')
<section class="dir-alp dir-pa-sp-top">
	<div class="container">
		<div class="row">
			<div class="dir-alp-tit">
				<h1>Search Ads State:  </h1>
				<ol class="breadcrumb">
					<li><a href="#">Home</a> </li>
					<li class="active">Ad Listings search</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="dir-alp-con">
				<div class="col-md-3 dir-alp-con-left">
					<div class="dir-alp-con-left-1">
						<h3>Categories({{$categories->count()}})</h3> </div>
					<div class="dir-hom-pre dir-alp-left-ner-notb">
						<ul>
							<!--==========NEARBY LISTINGS============-->
							@foreach($categories as $category)
							<li>
								<a href="listing-details.html">
									<div class="list-left-near lln1"> <img src="{{URL::to('/assets/images/services/s1.jpg')}}" alt="" /> </div>
									<div class="list-left-near lln2">
										<h5>{{$category->name}}</h5> 
										@foreach($category->subCategories as $cat)
										<span>{{$cat->name}}</span>
										@endforeach
									</div>
									<!-- <div class="list-left-near lln3"> <span>5.0</span> </div> -->
								</a>
							</li>
							@endforeach
							<!--==========END NEARBY LISTINGS============-->
							<!--==========NEARBY LISTINGS============-->
						</ul>
					</div>
					<!--==========Sub Category Filter============-->
					<!-- <div class="dir-alp-l3 dir-alp-l-com">
						<h4>Sub Category Filter</h4>
						<div class="dir-alp-l-com1 dir-alp-p3">
							<form action="#">
								<ul>
									<li>
										<input type="checkbox" id="scf1" />
										<label for="scf1">Hortels & Resorts</label>
									</li>
									<li>
										<input type="checkbox" id="scf2" />
										<label for="scf2">Fitness Care</label>
									</li>
									<li>
										<input type="checkbox" id="scf3" />
										<label for="scf3">Educations</label>
									</li>
									<li>
										<input type="checkbox" id="scf4" />
										<label for="scf4">Property</label>
									</li>
									<li>
										<input type="checkbox" id="scf5" />
										<label for="scf5">Home Services</label>
									</li>
								</ul>
							</form> <a href="#!" class="list-view-more-btn">view more</a> </div>
					</div> -->
					<!--==========End Sub Category Filter============-->
					<!--==========Sub Category Filter============-->
					<!-- <div class="dir-alp-l3 dir-alp-l-com">
						<h4>Distance</h4>
						<div class="dir-alp-l-com1 dir-alp-p3">
							<form>
								<ul>
									<li>
										<input class="with-gap" name="group1" type="radio" id="ldis1" />
										<label for="ldis1">00 to 02km</label>
									</li>
									<li>
										<input class="with-gap" name="group1" type="radio" id="ldis2" />
										<label for="ldis2">02 to 05km</label>
									</li>
									<li>
										<input class="with-gap" name="group1" type="radio" id="ldis3" />
										<label for="ldis3">05 to 10km</label>
									</li>
									<li>
										<input class="with-gap" name="group1" type="radio" id="ldis4" />
										<label for="ldis4">10 to 20km</label>
									</li>
									<li>
										<input class="with-gap" name="group1" type="radio" id="ldis5" />
										<label for="ldis5">20 to 30km</label>
									</li>
								</ul>
							</form> <a href="#!" class="list-view-more-btn">view more</a> </div>
					</div> -->
					<!--==========End Sub Category Filter============-->
					<!--==========Sub Category Filter============-->
					<!-- <div class="dir-alp-l3 dir-alp-l-com">
						<h4>Ratings</h4>
						<div class="dir-alp-l-com1 dir-alp-p3">
							<form>
								<ul>
									<li>
										<input type="checkbox" class="filled-in" id="lr1" />
										<label for="lr1"> <span class="list-rat-ch"> <span>5.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> </span>
										</label>
									</li>
									<li>
										<input type="checkbox" class="filled-in" id="lr2" />
										<label for="lr2"> <span class="list-rat-ch"> <span>4.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span>
										</label>
									</li>
									<li>
										<input type="checkbox" class="filled-in" id="lr3" />
										<label for="lr3"> <span class="list-rat-ch"> <span>3.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span>
										</label>
									</li>
									<li>
										<input type="checkbox" class="filled-in" id="lr4" />
										<label for="lr4"> <span class="list-rat-ch"> <span>2.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span>
										</label>
									</li>
									<li>
										<input type="checkbox" class="filled-in" id="lr5" />
										<label for="lr5"> <span class="list-rat-ch"> <span>1.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </span>
										</label>
									</li>
								</ul>
							</form> <a href="javascript:void(0);" class="list-view-more-btn">view more</a> </div>
					</div> -->
					<!--==========End Sub Category Filter============-->
				</div>
				<div class="col-md-9 dir-alp-con-right list-grid-rig-pad">
					<div class="dir-alp-con-right-1">
						<div class="row">
							<!--LISTINGS-->
							<div class="row span-none">
							@if($adverts->count() > 0)
								@foreach($adverts as $advert)
								<div class="col-md-4">
									<a href="{{route('advertSingle', $advert->slug)}}">
										<div class="list-mig-like-com com-mar-bot-30">
											<div class="list-mig-lc-img"> 
												<img src="{{$advert->featured_sm  ? $advert->featured_sm  : '/assets/images/listing/1.jpg'}}" alt="">
												<span class="home-list-pop-rat list-mi-pr">{{$advert->price}}</span> 
											</div>
											<div class="list-mig-lc-con">
												<!-- <div class="list-rat-ch list-room-rati"> <span>4.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div> -->
												<h5>{{$advert->title}}</h5>
												<h6>{{$advert->sales_price}}SKC</h6>
												<p>{{$advert->city->name}} {{$advert->state->name}}</p>
											</div>
										</div>
									</a>
								</div>
								@endforeach

								
								
								<div class="row">
									<ul class="pagination">
									  <li><a href="#">1</a></li>
									  <li><a href="#">2</a></li>
									  <li><a href="#">3</a></li>
									  <li><a href="#">4</a></li>
									  <li><a href="#">5</a></li>
									</ul>
								</div>
								@else
									<div class="col-md-6">
										<a href="{{route('login')}}">
											<div class="list-mig-like-com com-mar-bot-30">
												<div class="list-mig-lc-img"> <img src="/assets/images/listing/1.jpg" alt=""> <span class="home-list-pop-rat list-mi-pr">$720</span> </div>
												<div class="list-mig-lc-con">
													<!-- <div class="list-rat-ch list-room-rati"> <span>4.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div> -->
													<h5>No Ad List Avalable</h5>
													<h6>Login to create an ad</h6>
												</div>
											</div>
										</a>
									</div>
								@endif
							</div>
							<!--LISTINGS END-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection