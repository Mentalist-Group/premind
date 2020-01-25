import Vue from 'vue'
import Router from 'vue-router'
import store from '../store'

import Home from '../pages/Home.vue'
import Login from '../pages/Login.vue'
import SystemError from '../pages/errors/System.vue'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home,
    },
    {
      path: '/login',
      name: 'Login',
      component: Login,
      beforeEnter(to, from, next) {
        if (store.getters['auth/check']) {
          next('/')
        } else {
          next()
        }
      },
    },
    {
      path: '/500',
      component: SystemError,
    },
  ],
})
