<template>
	<div class="col-md-7 col-lg-8 col-xl-9">

<div class="row">
								<div class="col-sm-12">
									<div class="card">
										<div class="card-body">
											<h4 class="card-title">Schedule Timings</h4>
											<div class="profile-box">
												<form  @submit.prevent="AddData"  method="post">
												<div class="row">

													<div class="col-md-6">
														<div class="form-group">               
															<label>Timing Slot Duration</label>
															<select v-model="fields.slot" :name="slot" class=" form-control">
																<option>-</option>
																<option value="15">15 mins</option>
																<option value="20">20 mins</option>  
																<option value="25">25 mins</option>  
																<option value="15">30 mins</option>  
																<option value="15">45 mins</option>
																<option value="15">1 Hour</option>
															</select>
														</div>
													</div>

												</div> 
												<div class="row">

													<div class="col-md-6">
														<div class="form-group">               
															<label>Select Appoinment Date </label>
															
															<input v-model="fields.date" :name="date" class=" form-control" type="text"  id="reportrange"> 

														</div>
													</div>

												</div>   
												<div class="row">

													<div class="col-md-6">
														<div class="form-group">               
															<label>Select Appoinment Time</label>
															<input v-model="fields.time" :name="time" class=" form-control" type="text"  id="time">


														</div>
													</div>

												</div>   
												<button type="submit" class="btn btn-primary">Save</button>
												</form>
												
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
            $(function() {

			    var start = moment().subtract(29, 'days');
			    var end = moment();

			    function cb(start, end) {
			        $('#reportrange').val(start + ' - ' + end);
			    }

			    $('#reportrange').daterangepicker({
			        startDate: start,
			        endDate: end,
			        ranges: {
			           'Today': [moment(), moment()],
			           
			           'Next 7 Days': [ moment(),moment().add(6, 'days')],
			           'Next 15 Days': [ moment(),moment().add(14, 'days')],
			           'Next 30 Days': [ moment(),moment().add(29, 'days')],
			           'This Month': [moment().startOf('month'), moment().endOf('month')],
			          
			        }
			    }, cb);

			    cb(start, end);

			});
			$(function() {
   $('#time').daterangepicker({
            timePicker : true,
            timePicker12Hour : true,
            timePickerIncrement : 1,
            timePickerSeconds : false,
            locale : {
                format : 'HH:mm A'
            }
        }).on('show.daterangepicker', function(ev, picker) {
            picker.container.find(".calendar-table").hide();
   });
})
            this.getData();

        },
        data(){
        	return{
        		values:[],
        		fields: {},
        		

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
        	AddData () {
        		axios.post('/dp/scheduling/',this.fields).then((res)=>{
			      console.log(res.data);
			    }).catch((err) => {
			      console.log(err)
			    });
        	}
        }
    }
</script>