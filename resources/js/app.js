import Vue from 'vue'
import VueRouter from 'vue-router'
import Axios from 'axios'

window.axios = Axios;
Vue.use(VueRouter)

var VueTruncate = require('vue-truncate-filter')
Vue.use(VueTruncate)

import App from './components/App'
import Category from './components/Category'
import Product from './components/Product'
import SingleProduct from './components/SingleProduct'
let MyHeader = require('./components/MyHeader.vue');
let MyFooter = require('./components/MyFooter.vue');
let Home = require('./components/Home.vue');
let About = require('./components/About.vue');

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/about',
            name: 'about',
            component: About
        },
        {
            path: '/home',
            name: 'home',
            component: Home
        },
        {
            path: '/show-category',
            name: 'category',
            component: Category,
        },

        {
            path: '/show-products/:category_id',
            name: 'products',
            component: Product,
        },

        {
            path: '/show-product/:product_id',
            name: 'single-product',
            component: SingleProduct,
        },

        {
            path: '/',
            name: 'product',
            component: Product,
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App, Category, VueRouter, Axios, MyHeader, MyFooter, SingleProduct, VueTruncate },
    router,
});