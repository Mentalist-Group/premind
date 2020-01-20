<template>
  <div>
    <v-navigation-drawer v-model="drawer" app>
      <v-list dense>
        <v-list-item link>
          <v-list-item-action>
            <v-icon>mdi-home</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Home</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item link>
          <v-list-item-action>
            <v-icon>mdi-contact-mail</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Contact</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar app color="indigo" dark>
      <v-app-bar-nav-icon @click.stop="drawer = !drawer" />
      <RouterLink class="navbar__brand" to="/">
        <v-toolbar-title>premind</v-toolbar-title>
      </RouterLink>
      <div class="navbar__menu">
        <div v-if="isLogin" class="navbar__item">
          <button class="button">
            <i class="icon ion-md-add"></i>
            Submit a list
          </button>
        </div>
        <span v-if="isLogin" class="navbar__item">
          {{ username }}
        </span>
        <div v-else class="navbar__item">
          <RouterLink class="button button--link" to="/login">
            Login / Register
          </RouterLink>
        </div>
      </div>
    </v-app-bar>
  </div>
</template>

<script>
export default {
  data() {
    return {
      drawer: false, // navbarの開閉
    }
  },
  computed: {
    isLogin() {
      return this.$store.getters['auth/check']
    },
    username() {
      return this.$store.getters['auth/username']
    },
  },
}
</script>

<style lang="scss" scoped>
.navbar__menu {
  -webkit-box-align: center;
  align-items: center;
  display: -webkit-box;
  display: flex;
}

.navbar__item {
  margin-left: 1rem;
}

.navbar__brand {
  font-size: 1.2rem;
  text-decoration: none;
}

.navbar__brand:visited {
  color: inherit;
}

.navbar__brand:hover {
  opacity: 0.6;
}

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
</style>
