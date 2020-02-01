<template>
  <v-footer color="indigo" app>
    <span class="white--text">&copy; 2020</span>
    <button v-if="isLogin" class="button button--link" @click="logout">Logout</button>
    <RouterLink v-else class="button button--link" to="/login">
      Login / Register
    </RouterLink>
  </v-footer>
</template>

<script>
import { mapState, mapGetters } from 'vuex'

export default {
  computed: {
    ...mapState({
      apiStatus: state => state.auth.apiStatus,
    }),
    ...mapGetters({
      isLogin: 'auth/check',
    }),
  },
  methods: {
    async logout() {
      await this.$store.dispatch('auth/logout')
      if (this.apiStatus) {
        this.$router.push('/login')
      }
    },
  },
}
</script>

<style lang="scss" scoped>
.button {
  border: 1px solid #dedede;
  border-radius: 0.25rem;
  color: #8a8a8a;
  cursor: pointer;
  display: inline-block;
  font-family: inherit;
  font-size: 1rem;
  line-height: 1;
  outline: none;
  padding: 0.5rem 0.75rem;
  text-decoration: none;
  -webkit-transition: border-color 300ms ease-in-out, color 300ms ease-in-out;
  transition: border-color 300ms ease-in-out, color 300ms ease-in-out;
}

.button:hover {
  border-color: #333;
  color: inherit;
}

.button--link {
  border: 0;
}
</style>
