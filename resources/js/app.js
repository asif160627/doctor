/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');
window.Vue = require('vue');
import vuetify from './vuetify';
import router from './router';


Vue.use(require('vue-moment'));
const timeFormat = function (str) {
    if (str != null) {
        return moment(str).format("timezone",'Asia/Dhaka',"HH:mm A");
    }
    return "";
};

const filters = {
    timeFormat
};

//register the filters in Vue
Object.keys(filters).forEach(k => Vue.filter(k, filters[k]));


import VueChatScroll from 'vue-chat-scroll';
Vue.use(VueChatScroll);
import App from './components/App.vue';


new Vue({
	
    el: '#app',
    router,
    vuetify,
    components:{
        'App':App

    }

   
});
