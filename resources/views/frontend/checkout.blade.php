@extends('layouts.FrontLayout')
@section('content')

		<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Checkout</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Checkout</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">

					<div class="row">
						<div class="col-md-7 col-lg-8">
							<div class="card">
								<div class="card-body">
								
									<!-- Checkout Form -->
									<form action="{{route('checkout',[substr($data->order_id,4,strlen($data->order_id)),$data->total_ammount])}}">
									@csrf
										
										
										<div class="payment-widget">
											<h4 class="card-title">Payment Method</h4>
											
											<!-- Credit Card Payment -->
											<div class="payment-list">
												<label class="payment-radio credit-card-option">
													<input type="radio" name="radio" checked>
													<span class="checkmark"></span>
													Bkash
												</label>
												
											</div>
											<!-- /Credit Card Payment -->
											
											<!-- Paypal Payment -->
											<div class="payment-list">
												<label class="payment-radio paypal-option">
													<input type="radio" name="radio">
													<span class="checkmark"></span>
													Rocket
												</label>
											</div>
											<div class="payment-list">
												<label class="payment-radio paypal-option">
													<input type="radio" name="radio" value="Nagad">
													<span class="checkmark"></span>
													Nagad
												</label>
											</div>
											<!-- /Paypal Payment -->
											
											<!-- Terms Accept -->
											<div class="terms-accept">
												<div class="custom-checkbox">
												   <input type="checkbox" id="terms_accept">
												   <label for="terms_accept">I have read and accept <a href="#">Terms &amp; Conditions</a></label>
												</div>
											</div>
											<!-- /Terms Accept -->
											
											<!-- Submit Section -->
											<div class="submit-section mt-4">
												<button type="submit" class="btn btn-primary submit-btn">Confirm and Pay</button>
											</div>
											<!-- /Submit Section -->
											
										</div>
									</form>
									<!-- /Checkout Form -->
									
								</div>
							</div>
							
						</div>
						
						<div class="col-md-5 col-lg-4 theiaStickySidebar">
						
							<!-- Booking Summary -->
							<div class="card booking-card">
								<div class="card-header">
									<h4 class="card-title">Booking Summary</h4>
								</div>
								<div class="card-body">
								
									<!-- Booking Doctor Info -->
									<div class="booking-doc-info">
										<a href="doctor-profile.html" class="booking-doc-img">
											<img src="{{asset('assets/img/doctors/'.$data->doctor->image)}}" alt="User Image">
										</a>
										<div class="booking-info">
											<h4><a href="doctor-profile.html">{{$data->doctor->user->name}}</a></h4>
											
											<div class="clinic-details">
												<p class="doc-location"><i class="fas fa-map-marker-alt"></i> {{$data->doctor->specialities}}</p>
											</div>
										</div>
									</div>
									<!-- Booking Doctor Info -->
									
									<div class="booking-summary mt-5">
										<div class="booking-item-wrap">
											<ul class="booking-date">
												<li>Order ID <span>#{{$data->order_id}}</span></li>
												<li>Date <span>{{date('jS F,Y',strtotime($data->date))}}</span></li>
												<li>Time <span>{{$data->time}}</span></li>
											</ul>
											<ul class="booking-fee">
												<li>Consulting Fee <span>{{$data->doctor_ammount}}</span></li>
												<li>Service Fee <span>{{$data->service_ammount}}</span></li>
											</ul>
											<div class="booking-total">
												<ul class="booking-total-list">
													<li>
														<span>Total</span>
														<span class="total-cost">{{$data->total_ammount}}</span>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Booking Summary -->
							
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
@endsection