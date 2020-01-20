<template>
  <v-app id="inspire">
    <header>
      <Navbar />
    </header>
    <main>
      <v-content>
        <router-view />
      </v-content>
    </main>
    <Footer />
  </v-app>
</template>

<script>
import Navbar from './components/Navbar.vue'
import Footer from './components/Footer.vue'

import { INTERNAL_SERVER_ERROR } from './util'

export default {
  components: {
    Navbar,
    Footer,
  },
  computed: {
    errorCode() {
      return this.$store.state.error.code
    },
  },
  watch: {
    errorCode: {
      handler(val) {
        if (val === INTERNAL_SERVER_ERROR) {
          this.$router.push('/500')
        }
      },
      immediate: true,
    },
    $route() {
      this.$store.commit('error/setCode', null)
    },
  },
}
</script>
