<template>
   <div class="col-md-7 col-lg-8 col-xl-9">


							
							<div class="row">
								<div class="col-md-12">
									<h4 class="mb-4">Patient Appoinment</h4>
									<div class="appointment-tab">
									
										<!-- Appointment Tab -->
										<ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
											<li class="nav-item">
												<a class="nav-link active" href="#today-appointments" data-toggle="tab">Today</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="#upcoming-appointments" data-toggle="tab">Upcoming</a>
											</li> 
										</ul>
										<!-- /Appointment Tab -->
										
										<div class="tab-content">
										
											<!-- Upcoming Appointment Tab -->
											<div class="tab-pane show active" id="today-appointments">
												<div class="card card-table mb-0">
													<div class="card-body">
														<div class="appointments">
																	<!-- Appointment List -->
													<div class="appointment-list"  v-for="value in values">


														<div class="profile-info-widget" v-if="value.date==date">
															<a href="" class="booking-doc-img">
																<img src="assets/img/patients/patient.jpg" alt="User Image">
															</a>
															<div class="profile-det-info">
																<h3><a href="patient-profile.html">{{value.user.name}}</a></h3>
																<div class="patient-details">
																	<h5><i class="far fa-clock"></i> {{value.date}},{{value.time}}</h5>
																	<h5><i class="fas fa-map-marker-alt"></i> {{value.media}}</h5>
																	<h5><i class="fas fa-envelope"></i> {{value.user.email}}</h5>
																	<h5 class="mb-0"><i class="fas fa-phone"></i> {{value.user.mobile}}</h5>
																</div>
															</div>
														</div>
														<div v-if="value.date==date" class="appointment-action">
															<a href="#" class="hidden btn  bg-info-light" data-toggle="modal" data-target="#myModal">
																<i class="far fa-eye"></i> View Details
															</a>
															<a href="javascript:void(0);" class="btn  bg-success-light">
																<i class="fas fa-check"></i> Start Consulted
															</a>
															<a @click="Done(value.id)" href="javascript:void(0);" class="btn  bg-danger-light">
																<i class="fas fa-check-double"></i> Completed
															</a>
														</div>



													</div>
													<!-- /Appointment List -->
														</div>
													</div>
												</div>
											</div>
											<!-- /Upcoming Appointment Tab -->
									   
											<!-- Today Appointment Tab -->
											<div class="tab-pane" id="upcoming-appointments">
												<div class="card card-table mb-0">
													<div class="card-body">
														<div class="appointments">
																	<!-- Appointment List -->
								<div class="appointment-list"  v-for="value in values">
									


														<div class="profile-info-widget" v-if="value.date!=date">
															<a href="" class="booking-doc-img">
																<img src="assets/img/patients/patient.jpg" alt="User Image">
															</a>
															<div class="profile-det-info">
																<h3><a href="patient-profile.html">{{value.user.name}}</a></h3>
																<div class="patient-details">
																	<h5><i class="far fa-clock"></i> {{value.date}},{{value.time}}</h5>
																	<h5><i class="fas fa-map-marker-alt"></i> {{value.media}}</h5>
																	<h5><i class="fas fa-envelope"></i> {{value.user.email}}</h5>
																	<h5 class="mb-0"><i class="fas fa-phone"></i> {{value.user.mobile}}</h5>
																</div>
															</div>
														</div>
														<div v-if="value.date!=date" class="appointment-action">
															<a href="#" class="hidden btn  bg-info-light" data-toggle="modal" data-target="#myModal">
																<i class="far fa-eye"></i> View Details
															</a>
															<a href="javascript:void(0);" class="btn  bg-success-light">
																<i class="fas fa-check"></i> Start Consulted
															</a>
															<a @click="Done(value.id)" href="javascript:void(0);" class="btn  bg-danger-light">
																<i class="fas fa-check-double"></i> Completed
															</a>
														</div>




													</div>
													<!-- /Appointment List -->
														</div>
													</div>	
												</div>	
											</div>
											<!-- /Today Appointment Tab -->
	  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>This is a small modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
											
										</div>
									</div>
								</div>
							</div>

						

						</div>

</template>

<script>
    export default {
        mounted() {
            console.log('Appoinments Component mounted.');
            this.getData();

        },
        data(){
        	return{
        		values:[],

        		date : new Date().toISOString().slice(0,10)
        	}
        },
        methods: {
        	getData(){
        		axios.get('/dp/appointments').then((res)=>{
			      this.values = res.data
			    
			    }).catch((err) => {
			      console.log(err)
			    });
        	},
        	Done(id){
        		axios.get('/dp/appointments/'+id).then((res)=>{
			      this.getData();
			    }).catch((err) => {
			      console.log(err)
			    });
        	}
        }
    }
</script>