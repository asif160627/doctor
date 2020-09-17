<template>
   <div class="col-md-7 col-lg-8 col-xl-9">
	<div class="row row-grid">
		<div class="col-md-6 col-lg-4 col-xl-3" v-for="value in values">
			<div class="card widget-profile pat-widget-profile">
				<div class="card-body">
					<div class="pro-widget-content">
						<div class="profile-info-widget">
							<a href="patient-profile.html" class="booking-doc-img">
								<img src="assets/img/patients/patient.jpg" alt="User Image">
							</a>
							<div class="profile-det-info">
								<h3><a href="patient-profile.html">{{value.user.name}}</a></h3>
								
								<div class="patient-details">
									<h5><b>Patient ID :</b> P000{{value.id}}</h5>
									
								</div>
							</div>
						</div>
					</div>
					<div class="patient-info">
						<ul>
							<li>Phone <span style=" text-transform: lowercase;">{{value.user.mobile}}</span></li>
							<li>Email <span style=" text-transform: lowercase;">{{value.user.email}}</span></li>
							
						</ul>
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
        		axios.get('/dp/patients').then((res)=>{
			      this.values = res.data
			    
			    }).catch((err) => {
			      console.log(err)
			    });
        	}
        
        }
    }
</script>