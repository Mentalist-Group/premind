<template>
  <v-app id="inspire">
    <header>
      <Navbar />
    </header>
    <main>
      <v-content>
        <router-view/>
      </v-content>
    </main>
    <Footer />
  </v-app>
</template>

<script>
import Navbar from './components/Navbar.vue'
import Footer from './components/Footer.vue'

export default {
  components: {
    Navbar,
    Footer
  }
}
</script>
