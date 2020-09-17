@extends('layouts.FrontLayout')
@section('content')
			<!-- Home Banner -->
			<section class="section section-search">
				<div class="container-fluid">
					<div class="banner-wrapper">
						<div class="banner-header text-center">
							<h1>Search Doctor, Make an Appointment</h1>
							<p>Discover the best doctors, clinic & hospital the city nearest to you.</p>
						</div>
                         
						<!-- Search -->
						<div class="search-box">
							<form action="https://doccure-html.dreamguystech.com/template/search.html">
								<div class="form-group search-location">
									<input type="text" class="form-control" placeholder="Search Location">
									<span class="form-text">Based on your Location</span>
								</div>
								<div class="form-group search-info">
									<input type="text" class="form-control" placeholder="Search Doctors, Clinics, Hospitals, Diseases Etc">
									<span class="form-text">Ex : Dental or Sugar Check up etc</span>
								</div>
								<button type="submit" class="btn btn-primary search-btn"><i class="fas fa-search"></i> <span>Search</span></button>
							</form>
						</div>
						<!-- /Search -->
						
					</div>
				</div>
			</section>
			<!-- /Home Banner -->

			<section class="section home-tile-section">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-9 m-auto">
							<div class="section-header text-center">
								<h2>What are you looking for?</h2>
							</div>
							<div class="row">
								<div class="col-lg-4 mb-3">
									<div class="card text-center doctor-book-card">
										<img src="assets/img/doctors/doctor-07.jpg" alt="" class="img-fluid">
										<div class="doctor-book-card-content tile-card-content-1">
											<div>
												<h3 class="card-title mb-0">Visit a Doctor</h3>
												<a href="{{route('doctors')}}" class="btn book-btn1 px-3 py-2 mt-3" tabindex="0">Book Now</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4 mb-3">
									<div class="card text-center doctor-book-card">
										<img src="assets/img/img-pharmacy1.jpg" alt="" class="img-fluid">
										<div class="doctor-book-card-content tile-card-content-1">
											<div>
												<h3 class="card-title mb-0">Find a Pharmacy</h3>
												<a href="javascript:void(0);" class="btn book-btn1 px-3 py-2 mt-3" tabindex="0">Coming Soon</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4 mb-3">
									<div class="card text-center doctor-book-card">
										<img src="assets/img/lab-image.jpg" alt="" class="img-fluid">
										<div class="doctor-book-card-content tile-card-content-1">
											<div>
											<h3 class="card-title mb-0">Find a Lab</h3>
												<a href="javascript:void(0);" class="btn book-btn1 px-3 py-2 mt-3" tabindex="0">Coming Soon</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			  
			<!-- Clinic and Specialities -->
			<section class="section section-specialities">
				<div class="container-fluid">
					<div class="section-header text-center">
						<h2>Clinic and Specialities</h2>
						<p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>
					<div class="row justify-content-center">
						<div class="col-md-9">
							<!-- Slider -->
							<div class="specialities-slider slider">
							   @foreach($department as $count =>$value)
								<!-- Slider Item -->
								<div class="speicality-item text-center">
									<div class="speicality-img">
										<img src="{{asset('assets/img/specialities/'.$value->image)}}" class="img-fluid" alt="Speciality">
										<span><i class="fa fa-circle" aria-hidden="true"></i></span>
									</div>
									<p>{{$value->name}}</p>
								</div>	
								@endforeach
								<!-- /Slider Item -->
								
								
								
							</div>
							<!-- /Slider -->
							
						</div>
					</div>
				</div>   
			</section>	 
			<!-- Clinic and Specialities -->
		  
			<!-- Popular Section -->
			<section class="section section-doctor">
				<div class="container-fluid">
					<div class="section-header text-center">
						<h2>Book Our Doctor</h2>
						<p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>
				   <div class="row">
						
						<div class="col-lg-12">
							<div class="doctor-slider slider">
							@foreach($doctors as $value)
								<!-- Doctor Widget -->
								<div class="profile-widget">
									<div class="doc-img">
										<a href="javascript:void(0)">
											<img class="img-fluid" alt="User Image" src="{{asset('assets/img/doctors/'.$value->image)}}">
										</a>
										<a href="javascript:void(0)" class="fav-btn">
											<i class="far fa-bookmark"></i>
										</a>
									</div>
									<div class="pro-content">
										<h3 class="title">
											<a href="{{route('singleDoctor',[$value->id,$value->user->name])}}">{{$value->user->name}}</a> 
											<i class="fas fa-check-circle verified"></i>
										</h3>
										<p class="speciality">{{$value->specialities}}</p>
										<div class="rating">
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<i class="fas fa-star filled"></i>
											<span class="d-inline-block average-rating">(17)</span>
										</div>
										<ul class="available-info">
											<li>
												<i class="far fa-comment"></i> Chat : {{$value->chat}} TK
											</li>
											<li>
												<i class="fas fa-phone-alt"></i> Audio Call: {{$value->audio}} TK
											</li>
											<li>
												<i class="fas fa-video"></i> Video Call : {{$value->video}} TK
												<i class="fas fa-info-circle" data-toggle="tooltip" title="Lorem Ipsum"></i>
											</li>
										</ul>
										<div class="row row-sm">
											<div class="col-6">
												<a href="{{route('singleDoctor',[$value->id,preg_replace( '/[^a-zA-Z0-9]+/', '-', $value->user->name )])}}" class="btn view-btn">View Profile</a>
											</div>
											<div class="col-6">
												<a href="{{route('bookDoctor',[$value->id,preg_replace( '/[^a-zA-Z0-9]+/', '-', $value->user->name )])}}" class="btn book-btn">Book Now</a>
											</div>
										</div>
									</div>
								</div>
								@endforeach
								<!-- /Doctor Widget -->
						
								
								
							</div>
						</div>
				   </div>
				</div>
			</section>
			<!-- /Popular Section -->
		   
		   <!-- Availabe Features -->
		   <section class="section section-features">
				<div class="container-fluid">
				   <div class="row">
						<div class="col-md-5 features-img">
							<img src="assets/img/features/feature.png" class="img-fluid" alt="Feature">
						</div>
						<div class="col-md-7">
							<div class="section-header">	
								<h2 class="mt-2">Availabe Features in Our Clinic</h2>
								<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
							</div>	
							<div class="features-slider slider">
								<!-- Slider Item -->
								<div class="feature-item text-center">
									<img src="assets/img/features/feature-01.jpg" class="img-fluid" alt="Feature">
									<p>Patient Ward</p>
								</div>
								<!-- /Slider Item -->
								
								<!-- Slider Item -->
								<div class="feature-item text-center">
									<img src="assets/img/features/feature-02.jpg" class="img-fluid" alt="Feature">
									<p>Test Room</p>
								</div>
								<!-- /Slider Item -->
								
								<!-- Slider Item -->
								<div class="feature-item text-center">
									<img src="assets/img/features/feature-03.jpg" class="img-fluid" alt="Feature">
									<p>ICU</p>
								</div>
								<!-- /Slider Item -->
								
								<!-- Slider Item -->
								<div class="feature-item text-center">
									<img src="assets/img/features/feature-04.jpg" class="img-fluid" alt="Feature">
									<p>Laboratory</p>
								</div>
								<!-- /Slider Item -->
								
								<!-- Slider Item -->
								<div class="feature-item text-center">
									<img src="assets/img/features/feature-05.jpg" class="img-fluid" alt="Feature">
									<p>Operation</p>
								</div>
								<!-- /Slider Item -->
								
								<!-- Slider Item -->
								<div class="feature-item text-center">
									<img src="assets/img/features/feature-06.jpg" class="img-fluid" alt="Feature">
									<p>Medical</p>
								</div>
								<!-- /Slider Item -->
							</div>
						</div>
				   </div>
				</div>
			</section>		
			<!-- /Availabe Features -->
			
			<!-- Blog Section -->
		   <section class="section section-blogs">
				<div class="container-fluid">
				
					<!-- Section Header -->
					<div class="section-header text-center">
						<h2>Blogs and News</h2>
						<p class="sub-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>
					<!-- /Section Header -->
					
					<div class="row">

						@foreach($blog as $value)
						<div class="col-md-6 col-lg-3 col-sm-12">
						
							<!-- Blog Post -->
							<div class="blog grid-blog">
								<div class="blog-image">
									<a href="{{route('singlePost',[$value->id,str_replace(' ','-',$value->title)])}}"><img class="img-fluid" src="{{asset('assets/img/blog/'.$value->image)}}" alt="Post Image"></a>
								</div>
								<div class="blog-content">
									<ul class="entry-meta meta-item">
										<li>
											<div class="post-author">
												<a href="{{route('singleDoctor',[$value->user->profile->id,$value->user->name])}}"><img src="{{asset('assets/img/doctors/'.$value->user->profile->image)}}" alt="Post Author"> <span>Posted By {{$value->user->name}}</span></a>
											</div>
										</li>
										<li style="min-width: 200px;"><i class="far fa-clock"></i> {{date('l,jS-F,Y',strtotime($value->created_at))}}</li>
									</ul>
									<h3 class="blog-title"><a href="{{route('singlePost',[$value->id,str_replace(' ','-',$value->title)])}}">{{$value->title}}</a></h3>
									<p class="mb-0">{{substr($value->body,0,50)}}...<a href="{{route('singlePost',[$value->id,str_replace(' ','-',$value->title)])}}" style="color: red;">See More</a></p>

								</div>
							</div>
							<!-- /Blog Post -->
							
						</div>
						@endforeach
						
					</div>
					<div class="view-all text-center"> 
						<a href="{{route('allPost')}}" class="btn btn-primary">View All</a>
					</div>
				</div>
			</section>
			<!-- /Blog Section -->			
			
@endsection