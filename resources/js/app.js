/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import App from './components/App.vue';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

Vue.use(VueRouter);
Vue.use(VueSweetalert2);
Vue.use(VueAxios, axios);

import Home from './components/Home.vue';
import ListKamar from './components/ListKamar.vue';
import Pemesanan from './components/Pemesanan.vue';
import PemesananSelesai from './components/PemesananSelesai.vue';
import Vue from 'vue';

const plugin = {
    install() {
      Vue.prototype.$isEmpty = (item) => {
        if(!item) return true;
        if(item == undefined) return true;
        if(item == '') return true;
      }
    }
  }
  
Vue.use(plugin)

const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'list',
        path: '/list',
        component: ListKamar
    },
    {
        name: 'pemesanan',
        path: '/pemesanan/:id_kamar',
        component: Pemesanan
    },
    {
      name: 'pemesanan-selesai',
      path: '/pemesanan-selesai/:id_transaksi',
      component: PemesananSelesai
    },
    {
        path: '*',
        component: Home
    }
];


const router = new VueRouter({ mode: 'history', routes: routes, scrollBehavior(to, from, savedPosition){
  return { x: 0, y: 0 }
}});
router.beforeResolve((to, from, next) => {
  if (to.name) {
      document.body.classList.add('loading');
  }
  next()
})

router.afterEach((to, from) => {
  document.body.classList.remove('loading');
})
const setLoading = (status) => {
  if(status){
    document.body.classList.add('loading');
  }else{
    document.body.classList.remove('loading');
  }
}
const app = new Vue(Vue.util.extend({ router, methods:{setLoading:setLoading} }, App)).$mount('#app');
