require('./bootstrap');

import router from './routes';

var vm = new Vue({
    el: '#app',
    
    router
});