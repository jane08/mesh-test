import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './components/App'
import About from './components/About'
import Category from './components/Category'
import Product from './components/Product'


const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/about',
            name: 'about',
            component: About
        },
        {
            path: '/show-category',
            name: 'category',
            component: Category,
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App, Category },
    router,
});