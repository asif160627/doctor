<template>
   <div class="col-md-7 col-lg-8 col-xl-9">


						

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