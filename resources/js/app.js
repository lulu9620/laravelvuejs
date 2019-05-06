import Vue from 'vue'
import VueRouter from 'vue-router'
import VueAxios from 'vue-axios'
import Axios from 'axios'
import BootstrapVue from 'bootstrap-vue'
import VueResource from 'vue-resource'

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

import App from './components/App.vue'
import Home from './components/Home.vue'
import AddArticle from './components/articles/AddArticle.vue'
import ListArticles from './components/articles/ListArticles.vue'
import ViewArticle from './components/articles/ViewArticle.vue'

//Authentication
import Register from './components/authentication/Register.vue'
import Login from './components/authentication/Login.vue'

require('./bootstrap');

window.Vue = require('vue');
Vue.use(BootstrapVue);
Vue.use(VueRouter);
Vue.use(VueAxios,Axios);

//
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// const home = Vue.component('home', require('./components/Home.vue').default);

const routes = [
    {path: '/', component: Home, name: 'Home'},
    {path: '/articles', component: ListArticles, name: 'ListArticle'},
    {path: '/articles/add-article', component: AddArticle, name: 'AddArticle'},
    {path: '/articles/:id', component: ViewArticle, name: 'ViewArticle'},
];
const router = new VueRouter({
    routes,
    mode:'history',
});

const app = new Vue({
    el: '#app',
    router,
    render: h => h(App)
});
