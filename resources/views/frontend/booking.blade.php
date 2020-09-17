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
									<li class="breadcrumb-item active" aria-current="page">Booking</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Booking</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">
				
					<div class="row">
						<div class="col-12">
						
							<div class="card">
								<div class="card-body">
									<div class="booking-doc-info">
										<a href="doctor-profile.html" class="booking-doc-img">
											<img src="{{asset('assets/img/doctors/'.$doctor->image)}}" alt="User Image">
										</a>
										<div class="booking-info">
											<h4><a href="{{route('singleDoctor',[$doctor->id,$doctor->user->name])}}">{{$doctor->user->name}}</a></h4>
											
											<p class="text-muted mb-0"><i class="fas fa-marker-alt"></i> {{$doctor->specialities}}</p>
										</div>
									</div>
								</div>
							</div>
						
							<!-- Schedule Widget -->
							<div class="card booking-schedule schedule-widget">
							
								<!-- Schedule Header -->
								<div class="schedule-header">
									<form action="{{route('bookingDetails')}}" method="post" enctype="multipart/form-data">
										@csrf
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
											  <label for="comment">Enter Your Problem Details:</label>
											  <textarea required="1" class="form-control" rows="5" id="comment" name="query"></textarea>
											</div>
											<div class="row">
												<div class="form-group col-md-6">
											  <label for="sel1">Select Booking Avilable Date:</label>
											  <select required="1" class="form-control dynamic" data-dependent="time" id="date"  name="date">
											    <option>Choose Avilable Time</option>
											    @foreach($doctime->unique('date') as $value)
											    <option value="{{$value->date}}">{{$value->date}}</option>
											    @endforeach
											  </select>
											</div>
											<div class="form-group col-md-6">
											  <label for="sel1">Select Booking Avilable Time:</label>
											  <select required="1" class="form-control" id="time" name="time">
											  	<option>Choose Avilable Time</option>
											</select>
											</div>
											</div>
											<label for="sel1">Select Communication Medium :</label>
											<div class="form-check-inline">

											  <label class="form-check-label">
											    <input required="1" type="radio" class="form-check-input" name="media" value="msg"><i class="fas fa-comment"></i> Chat (BDT. {{$doctor->chat}} TK)
											  </label>
											</div>
											<div class="form-check-inline">
											  <label class="form-check-label">
											    <input required="1"  type="radio" class="form-check-input" name="media" value="Audio"><i class="fas fa-phone-alt"></i> Audio Call (BDT. {{$doctor->audio}} TK)
											  </label>
											</div>
											<div class="form-check-inline ">
											  <label class="form-check-label">
											    <input required="1" type="radio" class="form-check-input" name="media" value="Video"><i class="fas fa-video"></i> Video Call (BDT. {{$doctor->video}} TK)
											  </label>
											</div>
											    <div class="form-group">
						                        <label class="control-label">
						                            Important File Attach(Report or Others File)
						                            (Attach multiple files)
						                        </label>
						                        <div class="form-group">
						                           
						                                <input type="file" id="images"  class="form-control col-md-7 col-xs-12" name="image[]" multiple>
						                            
						                        </div>
						                        <input type="hidden" name="doctor_id" value="{{$doctor->id}}">
						                    </div>

											
											
										</div>
									
									</div>
								</div>
								<!-- /Schedule Header -->
								
							
								
							</div>
							<!-- /Schedule Widget -->
							
							<!-- Submit Section -->
							<div class="submit-section proceed-btn text-right">
								<button type="submit" class="btn btn-primary submit-btn ">Proceed to Pay</button>
							</div>
							<!-- /Submit Section -->
							</form>
						</div>
					</div>
				</div>

			</div>		
			<!-- /Page Content -->
@endsection