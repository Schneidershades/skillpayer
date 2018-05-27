@extends('layouts.users')
@section('content')

	<section>
		<div class="email-tem">
			<div class="email-tem-inn">
				<div class="email-tem-main">
					<div class="email-tem-head">
						<h2><img src="images/mail/letter.png" alt=""> Payment was Successfully Done</h2>
					</div>
					<div class="email-tem-body">
						<h3>Listing Invoice</h3>
						<div class="invoice">
							<div class="invoice-1">
								<div class="invoice-1-logo">
									<img src="images/invoice-logo.png" alt="">
								</div>
								<div class="invoice-1-add">
									<div class="invoice-1-add-left">
										<h3>John smith</h3>
										<p>28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A. </p>
										<h5>Bill To</h5>
										<p>Email: johnsmith@gmail.com</p>
									</div>
									<div class="invoice-1-add-right">
										<ul>
											<li><span>Invoice Number</span> ad4582456987</li>
											<li><span>Date</span> 07 Jul 2017</li>
											<li><span>Payment Terms</span> Due on receipt</li>
											<li><span>Due Date</span> 07 Jul 2017</li>
										</ul>
									</div>
								</div>
								<div class="invoice-1-tab">
									<table class="responsive-table bordered">
										<thead>
											<tr>
												<th>Description</th>
												<th>Price</th>
												<th>Duration</th>
												<th>Subtotal</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Premium listing update</td>
												<td>$50</td>
												<td>2 year</td>
												<td class="invo-sub">$100.00</td>									
											</tr>
											<tr>
												<td>Leads</td>
												<td>$100</td>
												<td>4 year</td>
												<td class="invo-sub">$400.00</td>									
											</tr>											
										</tbody>
									</table>								
								</div>
							</div>
							<div class="invoice-2">
								<div class="invoice-price">
									<table class="responsive-table bordered">
										<thead>
											<tr>
												<th>Bank info</th>
												<th>Due By</th>
												<th>Total Due</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Premium listing update</td>
												<td id="invo-date">18 May</td>
												<td id="invo-tot">$500.00</td>									
											</tr>											
										</tbody>
									</table>								
								</div>							
							</div>
						</div>
					</div>
				</div>
				<div class="email-tem-foot">
					<h4>Stay in touch</h4>
					<ul>
						<li><a href="#"><img src="images/mail/s1.png" alt=""></a></li>
						<li><a href="#"><img src="images/mail/s2.png" alt=""></a></li>
						<li><a href="#"><img src="images/mail/s3.png" alt=""></a></li>
						<li><a href="#"><img src="images/mail/s4.png" alt=""></a></li>
						<li><a href="#"><img src="images/mail/s5.png" alt=""></a></li>
					</ul>
					<p>Email send by Rn53themes</p>
					<p>copyrights © 2018 skillpayer.com   All rights reserved.</p>
				</div>
			</div>
		</div>
	</section>

@endsection