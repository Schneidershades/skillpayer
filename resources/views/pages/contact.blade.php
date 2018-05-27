@extends('layouts.users')

@section('content')
@include('partials._search')
	<section>
		<div class="con-page">
			<div class="con-page-ri">
				<div class="con-com">
					<h4 class="con-tit-top-o">Get in touch with us</h4>
					<p>28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A. Landmark : Next To Airport</p> <span><img src="images/icon/phone.png" alt="" /> Phone: +01 3214 6581</span> <span><img src="images/icon/mail.png" alt="" /> Email: support@listing.com</span>
					<h4>Follow us on</h4>
					<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here</p>
					<div class="share-btn">
						<ul>
							<li><a href="#"><i class="fa fa-facebook fb1"></i> Share On Facebook</a> </li>
							<li><a href="#"><i class="fa fa-twitter tw1"></i> Share On Twitter</a> </li>
							<li><a href="#"><i class="fa fa-google-plus gp1"></i> Share On Google Plus</a> </li>
						</ul>
					</div>
				</div>
				<div class="con-com">
					<div class="cpn-pag-form">
						<form>
							<h3>Support and Contact Enquiry</h3>
							<p>It is a long established fact that a reader will be distracted by the readable.The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here</p>
							<div>
								<div class="input-field col s12">
									<input id="gfc_name" type="text" class="validate" required>
									<label for="gfc_name">Name</label>
								</div>
							</div>
							<div>
								<div class="input-field col s12">
									<input id="gfc_mob" type="number" class="validate">
									<label for="gfc_mob">Mobile</label>
								</div>
							</div>
							<div>
								<div class="input-field col s12">
									<input id="gfc_mail" type="email" class="validate">
									<label for="gfc_mail">Email</label>
								</div>
							</div>
							<div>
								<div class="input-field col s12">
									<textarea id="gfc_msg" class="validate"></textarea>
									<label for="gfc_msg">Message</label>
								</div>
							</div>
							<div>
								<div class="input-field col s12">
									<input type="submit" value="SUBMIT" class="waves-effect waves-light btn-large full-btn list-red-btn"> </div>
							</div>
						</form>
					</div>
				</div>
				<div class="con-com con-pag-map con-com-mar-bot-o">
					<h4 class="con-tit-top-o">Touch with us</h4>
					<p>28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A. Landmark : Next To Airport</p>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6290413.804893654!2d-93.99620524741552!3d39.66116578737809!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880b2d386f6e2619%3A0x7f15825064115956!2sIllinois%2C+USA!5e0!3m2!1sen!2sin!4v1469954001005" allowfullscreen=""></iframe>
				</div>
			</div>
		</div>
	</section>
@endsection