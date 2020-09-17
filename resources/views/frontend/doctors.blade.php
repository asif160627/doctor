@extends('layouts.FrontLayout')
@section('content')

			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">

	            <div class="row">
					<div class="col-xl-9 col-lg-12 order-md-last order-sm-last order-last map-left">
				
						<div class="row align-items-center mb-4">
							<div class="col-md-6 col">
								<h4>Total {{$count}} Doctors found</h4>
							</div>

							<div class="col-md-6 col-auto">
								<div class="view-icons">
									<div class="sort-by d-sm-block d-none">
									<span class="sortby-fliter">
										<select class="select">
											<option>Sort by</option>
											<option class="sorting">Rating</option>
											<option class="sorting">Popular</option>
											<option class="sorting">Latest</option>
											<option class="sorting">Free</option>
										</select>
									</span>
								</div>
								</div>
								
							</div>
						</div>
						@foreach($doctors as $value)

						<!-- Doctor Widget -->
						<div class="card">
							<div class="card-body">
								<div class="doctor-widget">
									<div class="doc-info-left">
										<div class="doctor-img">
											<a href="{{route('singleDoctor',[$value->id,preg_replace( '/[^a-zA-Z0-9]+/', '-', $value->user->name )])}}">
												<img src="{{asset('assets/img/doctors/'.$value->image)}}" class="img-fluid" alt="User Image">
											</a>
										</div>
										<div class="doc-info-cont">
											<h4 class="doc-name"><a href="{{route('singleDoctor',[$value->id,preg_replace( '/[^a-zA-Z0-9]+/', '-', $value->user->name )])}}">{{$value->user->name}}</a></h4>
											<h5 class="doc-department"><img src="{{asset('assets/img/specialities/'.$value->department->image)}}" class="img-fluid" alt="Speciality">{{$value->specialities}}</h5>
											<div class="rating">
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star filled"></i>
												<i class="fas fa-star"></i>
												<span class="d-inline-block average-rating">(17)</span>
											</div>
											<div class="clinic-details">
												<p class="doc-location"><i class="fas fa-map-marker-alt"></i> Clinical Experience {{$value->clinical_experience_year}}+ Years</p>
												
											</div>
											<div class="clinic-services">
												@foreach($value->profile as $val)
												@if($val->field=='Specializations')
												<span>{{$val->title}}</span>
												@endif
												@endforeach
												
											</div>
										</div>
									</div>
									<div class="doc-info-right">
										<div class="clini-infos">
											<ul>
												<li>
												<i class="far fa-comment"></i> Chat : 200TK
											</li>
											<li>
												<i class="fas fa-phone-alt"></i> Audio Call: 500TK
											</li>
											<li>
												<i class="fas fa-video"></i> Video Call : 800 TK
												
											</li>
											</ul>
										</div>
										<div class="clinic-booking">
											<a class="view-pro-btn" href="{{route('singleDoctor',[$value->id,preg_replace( '/[^a-zA-Z0-9]+/', '-', $value->user->name )])}}">View Profile</a>
											<a class="apt-btn" href="{{route('bookDoctor',[$value->id,preg_replace( '/[^a-zA-Z0-9]+/', '-', $value->user->name )])}}">Book Appointment</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /Doctor Widget -->
						@endforeach

						

							
					<div class="load-more text-center row">
						<div class="col-md-5"></div>
						<div class="col-md-4">
							{{ $doctors->links() }}
						</div>
						<div class="col-md-3"></div>
						

					</div>
	            </div>
	            <!-- /content-left-->
	            <div class="col-xl-3 col-lg-12 map-right">
	               
	                <!-- map-->
	            </div>
	            <!-- /map-right-->
	        </div>
	        <!-- /row-->
	   
				</div>

			</div>		
			<!-- /Page Content -->
   

@endsection