	@extends('layouts.DoctorLayout')
@section('maincontent')

						<div class="col-md-7 col-lg-8 col-xl-9">
						<form method="post" enctype="mulipart/form-data" action="{{route('doctor.profile-setting-add')}}">
							@csrf
							<!-- Basic Information -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Basic Information</h4>
									<div class="row form-row">
										<div class="col-md-12">
											<div class="form-group">
												<div class="change-avatar">
													<div class="profile-img">
														<img src="{{asset('assets/img/doctors/'.$doctor->image)}}" alt="User Image">
													</div>
													<div class="upload-img">
														<div class="change-photo-btn">
															<span><i class="fa fa-upload"></i> Upload Photo</span>
															<input type="file" class="upload" name="image">
														</div>
														<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Username <span class="text-danger">*</span></label>
												<input value="{{Auth::user()->username}}" type="text" class="form-control" readonly>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Email <span class="text-danger">*</span></label>
												<input value="{{Auth::user()->email}}" type="email" class="form-control" readonly>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label>Name <span class="text-danger">*</span></label>
												<input value="{{Auth::user()->name}}" type="text" class="form-control" readonly>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Department</label>
												<select class="form-control" name="dept_id">
													<option selected="1" disabled="1">Select Department</option>
													@foreach($department as $value)
													<option @if($value->id==$doctor->dept_id) selected @endif value="{{$value->id}}">{{$value->name}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Average Patient Consulted Per Week <span class="text-danger">*</span></label>
												<input type="number" placeholder="200" class="form-control" name='avg_patient_week' value="{{$doctor->avg_patient_week}}">
											</div>
										</div>
										
										<div class="col-md-6">
											<div class="form-group">
												<label>Phone Number</label>
												<input type="text" class="form-control" name="mobile" value="{{$doctor->mobile}}">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Gender</label>
												<select class="form-control" name="gender">
													<option selected="1" disabled="1">Select</option>
													<option @if($value->gender=='Male') selected @endif  value="Male">Male</option>
													<option @if($value->gender=='Female') selected @endif value="Female">Female</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group mb-0">
												<label>Date of Birth</label>
												<input type="date" class="form-control" name="dob" value="{{$doctor->dob}}">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group mb-0">
												<label>Blood Group</label>
												<input type="text" class="form-control" name="blood" value="{{$doctor->blood}}">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Specialitie <span class="text-danger">*</span></label>
												<input type="text" class="form-control" name="specialities" value="{{$doctor->specialities}}">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Medical Registration No <span class="text-danger">*</span></label>
												<input type="text" class="form-control" name="medical_reg_no" value="{{$doctor->medical_reg_no}}">
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Basic Information -->
							
							<!-- About Me -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">About Me</h4>
									<div class="form-group mb-0">
										<label>Biography</label>
										<textarea class="form-control" rows="5" name="bio">{{$doctor->bio}}</textarea>
									</div>
								</div>
							</div>
							<!-- /About Me -->
							
							<!-- Clinic Info -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Clinic Info</h4>
									<div class="row form-row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Clinic Name</label>
												<input type="text" class="form-control" name="clinic_name"  value="{{$doctor->clinic_name}}">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Clinic Address</label>
												<input type="text" class="form-control" name="clinic_address" value="{{$doctor->clinic_address}}">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Clinical Experience Year</label>
												<input type="number" class="form-control" name="clinical_experience_year"  value="{{$doctor->clinical_experience_year}}">
											</div>
										</div>
										
									</div>
								</div>
							</div>
							<!-- /Clinic Info -->

							<!-- Contact Details -->
							<div class="card contact-card">
								<div class="card-body">
									<h4 class="card-title">Contact Details</h4>
									<div class="row form-row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Address Line 1</label>
												<input type="text" class="form-control" name="address1"  value="{{$doctor->address1}}">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Address Line 2</label>
												<input type="text" class="form-control" name="address2"  value="{{$doctor->address2}}">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">City</label>
												<input type="text" class="form-control" name="city"  value="{{$doctor->city}}">
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">State / Province</label>
												<input type="text" class="form-control" name="state"  value="{{$doctor->state}}">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Country</label>
												<input type="text" class="form-control" name="country"  value="{{$doctor->country}}">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label">Postal Code</label>
												<input type="text" class="form-control" name="zip"  value="{{$doctor->zip}}">
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Contact Details -->
							
							<!-- Pricing -->
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Pricing</h4>
									
									<div class="form-group mb-0">
										<div id="pricing_select">
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" id="price_free" name="rating_option" class="custom-control-input" value="price_free" @if( $doctor->chat==0 || $doctor->audio==0 || $doctor->video==0) checked @endif name="price">
												<label class="custom-control-label" for="price_free">Free</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input @if($doctor->chat!=0 || $doctor->audio!=0 || $doctor->video!=0) checked @endif type="radio" id="price_custom" name="rating_option" value="custom_price" class="custom-control-input" name="price">
												<label class="custom-control-label" for="price_custom">Custom Price (per hour)</label>
											</div>
										</div>

									</div>
									
									<div class="row custom_price_cont" id="custom_price_cont" @if($doctor->chat!=0 || $doctor->audio!=0 || $doctor->video!=0) style="display:block;" @endif>
										<div class="col-md-4">
											<input type="text" class="form-control" id="custom_rating_input" name="custom_rating_count" value="{{$doctor->chat}}" placeholder="300" name="chat" >
											<small class="form-text text-muted">Chat</small>
										</div>
										<div class="col-md-4">
											<input type="text" class="form-control" id="custom_rating_input" name="custom_rating_count" value="{{$doctor->audio}}" placeholder="500" name="chat">
											<small class="form-text text-muted">Audio Call</small>
										</div>
										<div class="col-md-4">
											<input type="text" class="form-control" id="custom_rating_input" name="custom_rating_count" value="{{$doctor->video}}" placeholder="600" name="chat">
											<small class="form-text text-muted">Video Call</small>
										</div>
									</div>
									
									
								</div>
							</div>
							<!-- /Pricing -->
							
							<!-- Services and Specialization -->
							<div class="card services-card">
								<div class="card-body">
									<h4 class="card-title">Services, Specialization and Languages</h4>
									<div class="form-group">
										<label>{{$doctor->service}}</label>
										<input type="text" data-role="tagsinput" class="input-tags form-control" placeholder="Enter Services" name="services" value="{{$doctor->service}} " id="services">
										<small class="form-text text-muted">Note : Type & Press comma to add new services</small>
									</div> 
									<div class="form-group mb-0">
										<label>Specialization </label>
										<input class="input-tags form-control" type="text" data-role="tagsinput" placeholder="Enter Specialization" name="specialist" value="{{$doctor->specialization}}" id="specialist">
										<small class="form-text text-muted">Note : Type & Press  comma to add new specialization</small>
									</div> 
									<div class="form-group mb-0">
										<label>Languages </label>
										<input class="input-tags form-control" type="text" data-role="tagsinput" placeholder="Enter Language" name="language" value="{{$doctor->language}}" id="specialist">
										<small class="form-text text-muted">Note : Type & Press  comma to add new specialization</small>
									</div> 
								</div>              
							</div>
							<!-- /Services and Specialization -->
						 
							
							
							
							
							<div class="submit-section submit-btn-bottom">
								<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
							</div>
							</form>
						</div>
					
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
	@endsection