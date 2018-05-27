@extends('layouts.users')

@section('content')
@include('partials._search')
<!--<section>-->
<!--	<div class="v3-list-ql">-->
<!--		<div class="container">-->
<!--			<div class="row">-->
<!--				<div class="v3-list-ql-inn">-->
<!--					<ul>-->
<!--						<li class="active"><a href="#ld-abour"><i class="fa fa-user"></i> About</a>-->
<!--						</li>-->
						<!-- <li><a href="#ld-ser"><i class="fa fa-cog"></i> Services</a>
<!--						</li>-->
<!--						<li><a href="#ld-gal"><i class="fa fa-photo"></i> Gallery</a>-->
<!--						</li> -->-->
<!--					</ul>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</section>-->
<!--LISTING DETAILS-->
<!--<section class="pg-list-1" style="background:url({{URL::to($advert->featured_bg)}}) no-repeat;">-->
<!--	<div class="container">-->
<!--		<div class="row">-->
<!--			<div class="pg-list-1-left"> <a href="#"><h3>{{$advert->title}}</h3></a>-->
<!--				<div class=""> -->
					
<!--				</div>-->
<!--				<h3> {{$advert->sales_price}} SKC</h3> -->
<!--				<h4>{{$advert->city->name}}, {{$advert->state->name}}</h4>-->
<!--				<p><b>Address:</b> {{$advert->address}}</p>-->
<!--				<div class="list-number pag-p1-phone">-->
<!--					<ul>-->
<!--						<li><i class="fa fa-phone" aria-hidden="true"></i> {{$advert->contact}}</li>-->
<!--						<li><i class="fa fa-envelope" aria-hidden="true"></i> {{$advert->user->email}}</li>-->
<!--						<li><i class="fa fa-user" aria-hidden="true"></i> {{$advert->user->name}}</li>-->
<!--					</ul>-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="pg-list-1-right">-->
<!--				<div class="list-enqu-btn pg-list-1-right-p1">-->
<!--					<ul>-->
						<!-- <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i> Write Review</a> </li> -->
						<!-- <li><a href="#"><i class="fa fa-commenting-o" aria-hidden="true"></i> Send SMS</a> </li> -->
<!--						<li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> Call {{$advert->contact}}</a> </li>-->
						<!-- <li><a href="#" data-dismiss="modal" data-toggle="modal" data-target="#list-quo"><i class="fa fa-usd" aria-hidden="true"></i> Get Quotes</a> </li> -->
<!--					</ul>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--</section>-->
<section class="list-pg-bg">
	<div class="container">
		<div class="row">
			<div class="com-padd">
				<div class="list-pg-lt list-page-com-p">
				    
				    <div class="pglist-p3 pglist-bg pglist-p-com">
						<div class="pglist-p-com-ti">
							<h3><span>Photo</span> Gallery</h3> 
						</div>
					    {{$advert->uploads}}
						<div class="list-pg-inn-sp">
							<div id="myCarousel" class="carousel slide" data-ride="carousel">
								<!-- Indicators -->
								<ol class="carousel-indicators">
									<li data-target="#myCarousel" data-slide-to="0" class=""></li>
									<li data-target="#myCarousel" data-slide-to="1" class=""></li>
									<li data-target="#myCarousel" data-slide-to="2" class="active"></li>
									<li data-target="#myCarousel" data-slide-to="3" class=""></li>
								</ol>
								<!-- Wrapper for slides -->
								<div class="carousel-inner">
								 <!--   @if($advert->uploads->count() > 0)-->
									<!--<div class="item"> <img src="/assets/images/slider/p1.jpg" alt="Los Angeles"> -->
									<!--</div>-->
									<!--@endif-->
									<!--<div class="item"> <img src="/assets/images/slider/p2.jpg" alt="Chicago"> -->
									<!--</div>-->
									<!--<div class="item active"> <img src="/assets/images/slider/p3.jpg" alt="New York">-->
									<!--</div>-->
									<!--<div class="item"> <img src="/assets/images/slider/p4.jpg" alt="New York"> -->
									<!--</div>-->
								</div>
								<!-- Left and right controls -->
								<a class="left carousel-control" href="#myCarousel" data-slide="prev"> <i class="fa fa-angle-left list-slider-nav" aria-hidden="true"></i> </a>
								<a class="right carousel-control" href="#myCarousel" data-slide="next"> <i class="fa fa-angle-right list-slider-nav list-slider-nav-rp" aria-hidden="true"></i> </a>
							</div>
						</div>
					</div>
				    
					
					<!--LISTING DETAILS: LEFT PART 1-->
					<div class="pglist-p1 pglist-bg pglist-p-com" id="ld-abour">
						<div class="pglist-p-com-ti">
							<h3> {{$advert->title}}</h3> 
						</div>
						<div class="list-pg-inn-sp">
							<!-- <div class="share-btn">
								<ul>
									<li><a href="#"><i class="fa fa-facebook fb1"></i> Share On Facebook</a> </li>
									<li><a href="#"><i class="fa fa-twitter tw1"></i> Share On Twitter</a> </li>
									<li><a href="#"><i class="fa fa-google-plus gp1"></i> Share On Google Plus</a> </li>
								</ul>
							</div> -->
							<div class="single-post">
													<!-- post title-->
								<div class="single-post-title">
									<div class="post-price visible-xs visible-sm">
										<h4>{{$advert->sales_price}}	</h4>
									</div>
									<h4 class="text-uppercase">
										<a href=""> Category  {{$advert->category->name}}</a>
												
										<!--Edit Ads Button-->
									</h4>
									<!-- <p class="post-category">
											<i class="fa fa-folder-open-o"></i>:
										<span>
										<a href="https://www.skillpayer.com/category/real-estate/" title="View all posts in Real Estate">Real Estate</a>		</span>
										<i class="fa fa-map-marker"></i>:<span><a href="#">Ado-Odo/Ota</a></span>
									</p> -->
								</div>
								<!-- post title-->
								<!-- single post carousel-->
								<!-- single post carousel-->										<!-- ad deails -->
								<div class="border-section border details">
			                        <h4 class="border-section-heading text-uppercase"><i class="fa fa-file-text-o"></i>Ad Details</h4>
			                        <div class="post-details">
			                            <ul class="list-unstyled clearfix">
			                                <li>
			                                    <p>Added: 
												<span class="pull-right flip">{{$advert->created_at}}</span>
												</p>
			                                </li><!--PostDate-->								
											<!--Price Section -->
											<li>
			                                    <p>Sale Price: 
												<span class="pull-right flip">{{$advert->sales_price}}	</span>
												</p>
			                                </li><!--Sale Price-->
																											<li>
			                                    <p>Regular Price: 
												<span class="pull-right flip">{{$advert->regular_price}}</span>
												</p>
			                                </li><!--Regular Price-->
																			<!--Price Section -->
											<li>
			                                    <p>Condition: <span class="pull-right flip">{{$advert->status}}</span></p>
			                                </li><!--Condition-->
											<li>
			                                    <p>Location: <span class="pull-right flip">{{$advert->address}}</span></p>
			                                </li><!--Location-->
											<li>
			                                    <p>State: 
												<span class="pull-right flip">{{$advert->state->name}}</span>
												</p>
			                                </li><!--state-->
											<li>
			                                    <p>City: 
												<span class="pull-right flip">{{$advert->city->name}}</span>
												</p>
			                                </li>
			                                <!--City-->
											<li>
			                                    <p>Phone: 
												<span class="pull-right flip">
													<a href="tel:{{$advert->contact}}">{{$advert->contact}}</a>
												</span>
												</p>
			                                </li>
			                                <!--Phone-->
											<!-- <li>
			                                    <p>Views: 
												<span class="pull-right flip">
													35									</span>
												</p>
			                                </li> -->
			                                <!--Views-->
										</ul>
			                        </div><!--post-details-->
			                    </div>
								<!-- ad deails -->
								<!--PostVideo-->
													<!--PostVideo-->
								<!-- post description -->
								<div class="border-section border description">
									<h4 class="border-section-heading text-uppercase">Description</h4>
									<p>{{$advert->description}}</p>
									<!-- <div class="tags">
			                            <span>
			                                <i class="fa fa-tags"></i>
			                                Tags :
			                            </span>
										<a href="https://www.skillpayer.com/tag/land/" rel="tag">land</a>   
									</div> -->
								</div>
								<!-- post description -->
								<!--comments-->
													<!--comments-->
							</div>
						</div>
					</div>
				</div>

					<div class="list-pg-rt">
						<!--END LISTING DETAILS: LEFT PART 7-->
						<!--LISTING DETAILS: LEFT PART 7-->
						<div class="pglist-p3 pglist-bg pglist-p-com">
							<div class="pg-list-user-pro"> <img src=" {{$advert->user->profile->avatar ? $advert->user->profile->avatar : '/assets/images/users/8.png'}}" alt=""> </div>
							<div class="list-pg-inn-sp">
								<div class="list-pg-upro">
									<h5>{{$advert->user->name}}</h5>
									<!-- <p>Member since July 2017</p> <a class="waves-effect waves-light btn-large full-btn list-pg-btn" href="#!">Contact User</a> </div> -->
									<p>{{$advert->user->email}}</p> 
									<!-- <a class="waves-effect waves-light btn-large full-btn list-pg-btn" href="#!">Contact User</a>  -->
								</div>
							</div>
						</div>
						<!--END LISTING DETAILS: LEFT PART 7-->
						<!--END LISTING DETAILS: LEFT PART 8-->
						<!--LISTING DETAILS: LEFT PART 9-->
						<div class="pglist-p3 pglist-bg pglist-p-com">
							<div class="pglist-p-com-ti pglist-p-com-ti-right">
								<h3><span>Other</span> Categories</h3> </div>
							<div class="list-pg-inn-sp">
								<div class="list-pg-oth-info">
									<ul>
										@foreach($professions as $category)
										<!-- <li>Today Shop <span class="green-bg">open</span> </li> -->
										<li>{{$category->name}} 
										<!--<span>16</span> -->
										</li>
										@endforeach
									</ul>
								</div>
							</div>
						</div>
						<!--END LISTING DETAILS: LEFT PART 9-->
						<!--LISTING DETAILS: LEFT PART 10-->
						<!-- <div class="list-mig-like">
							<div class="list-ri-spec-tit">
								<h3><span>You might</span> like this</h3> </div>
							<a href="#!">
								<div class="list-mig-like-com">
									<div class="list-mig-lc-img"> <img src="/assets/images/listing/1.jpg" alt="" /> <span class="home-list-pop-rat list-mi-pr">$720</span> </div>
									<div class="list-mig-lc-con">
										<div class="list-rat-ch list-room-rati"> <span>4.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
										<h5>Holiday Inn Express</h5>
										<p>Illinois City,</p>
									</div>
								</div>
							</a>
							<a href="#!">
								<div class="list-mig-like-com">
									<div class="list-mig-lc-img"> <img src="/assets/images/listing/2.jpg" alt="" /> <span class="home-list-pop-rat list-mi-pr">$420</span> </div>
									<div class="list-mig-lc-con">
										<div class="list-rat-ch list-room-rati"> <span>3.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
										<h5>InterContinental</h5>
										<p>Illinois City,</p>
									</div>
								</div>
							</a>
							<a href="#!">
								<div class="list-mig-like-com">
									<div class="list-mig-lc-img"> <img src="/assets/images/listing/3.jpg" alt="" /> <span class="home-list-pop-rat list-mi-pr">$380</span> </div>
									<div class="list-mig-lc-con">
										<div class="list-rat-ch list-room-rati"> <span>5.0</span> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> </div>
										<h5>Staybridger Suites</h5>
										<p>Illinois City,</p>
									</div>
								</div>
							</a>
						</div> -->
						<!--END LISTING DETAILS: LEFT PART 10-->
					</div>
			</div>
		</div>
	</div>
	</section>
@endsection