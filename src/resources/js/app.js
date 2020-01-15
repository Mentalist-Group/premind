require('./bootstrap');

import Vue from 'vue'
import App from './App.vue'
import router from './router'

import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'

import '@mdi/font/css/materialdesignicons.css'
import 'material-design-icons-iconfont/dist/material-design-icons.css'

Vue.use(Vuetify,{
  iconfont:'md'||'mdi'
})


new Vue({
  el: '#app',
  vuetify: new Vuetify(),
  router,
  components: { App },
  template: '<App/>'
})