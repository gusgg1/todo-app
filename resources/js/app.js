require('./bootstrap');

window.Vue       = require('vue');
window.VueRouter = require('vue-router').default;
window.VueAxios  = require('vue-axios').default;
window.Axios     = require('axios').default;

let AppLayout = require('./components/App.vue');

// Templates:
const Listposts = Vue.component('Listposts', require('./components/Listposts.vue'));
const Addpost = Vue.component('Addpost', require('./components/Addpost.vue'));
const Editpost = Vue.component('Editpost', require('./components/Editpost.vue'));
const Deletepost = Vue.component('Deletepost', require('./components/Deletepost.vue'));
const Viewpost = Vue.component('Viewpost', require('./components/Viewpost.vue'));


// registering modules:
Vue.use(VueRouter, VueAxios, Axios);

const routes = [
    {
        name: 'Listposts',
        path: '/',
        component: Listposts
    },
    {
        name: 'Addpost',
        path: '/add-post',
        component: Addpost
    },    
    {
        name: 'Editpost',
        path: '/edit/:id',
        component: Editpost
    },
    {
        name: 'Deletepost',
        path: '/post-delete',
        component: Deletepost
    },    
    {
        name: 'Viewpost',
        path: '/view/:id',
        component: Viewpost
    },
];


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });


const router = new VueRouter({ mode: 'history', routes });

new Vue(
    Vue.util.extend(
        { router },
        AppLayout
    )
).$mount('#app');
