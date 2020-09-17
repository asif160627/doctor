import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);
import dashboard from './components/dashboard.vue';
import appointments from './components/appointments.vue';
import patients from './components/patients.vue';
import schedule from './components/scheduleTiming.vue';
import ChatComponent from './components/ChatComponent.vue';
const routes = [
{ path: '/dashboard', component: dashboard ,name:'dashboard' },
{ path: '/appointments', component: appointments ,name:'appointments' },
{ path: '/patients', component: patients ,name:'patients' },
{ path: '/schedule', component: schedule ,name:'schedule' },
{ path: '/messages', component: ChatComponent ,name:'ChatComponent' },
];

const router=new VueRouter({routes})
// router.beforeEach((to, from, next) => {
  
//     axios.get('/verify')
//     .then(res=> {
//     	//console.log(res.data);
//     	next();
//     })
//     .catch(err=>{console.log(err)});
       
      
// });
export default router