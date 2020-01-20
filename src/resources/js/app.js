import './bootstrap'

import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'

import '@mdi/font/css/materialdesignicons.css'
import 'material-design-icons-iconfont/dist/material-design-icons.css'

Vue.use(Vuetify, {
  iconfont: 'md' || 'mdi',
})

const createApp = async () => {
  await store.dispatch('auth/currentUser')
  /* eslint-disable no-new */
  new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    router,
    store,
    components: { App },
    template: '<App/>',
  })
}

createApp()
