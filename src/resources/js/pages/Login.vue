<template>
  <div class="container--small">
    <ul class="tab">
      <li class="tab__item" :class="{ 'tab__item--active': tab === 1 }" @click="tab = 1">Login</li>
      <li class="tab__item" :class="{ 'tab__item--active': tab === 2 }" @click="tab = 2">Register</li>
    </ul>
    <div v-show="tab === 1" class="panel">
      <form class="form" @submit.prevent="login">
        <div v-if="loginErrors" class="errors">
          <ul v-if="loginErrors.email">
            <li v-for="msg in loginErrors.email" :key="msg">{{ msg }}</li>
          </ul>
          <ul v-if="loginErrors.password">
            <li v-for="msg in loginErrors.password" :key="msg">{{ msg }}</li>
          </ul>
        </div>
        <label for="login-email">Email</label>
        <input id="login-email" v-model="loginForm.email" type="text" class="form__item" />
        <label for="login-password">Password</label>
        <input id="login-password" v-model="loginForm.password" type="password" class="form__item" />
        <div class="form__button">
          <button type="submit" class="button button--inverse">login</button>
        </div>
      </form>
    </div>
    <div v-show="tab === 2" class="panel">
      <form class="form" @submit.prevent="register">
        <div v-if="registerErrors" class="errors">
          <ul v-if="registerErrors.name">
            <li v-for="msg in registerErrors.name" :key="msg">{{ msg }}</li>
          </ul>
          <ul v-if="registerErrors.email">
            <li v-for="msg in registerErrors.email" :key="msg">{{ msg }}</li>
          </ul>
          <ul v-if="registerErrors.password">
            <li v-for="msg in registerErrors.password" :key="msg">{{ msg }}</li>
          </ul>
        </div>
        <label for="username">Name</label>
        <input id="username" v-model="registerForm.name" type="text" class="form__item" />
        <label for="email">Email</label>
        <input id="email" v-model="registerForm.email" type="text" class="form__item" />
        <label for="password">Password</label>
        <input id="password" v-model="registerForm.password" type="password" class="form__item" />
        <label for="password-confirmation">Password (confirm)</label>
        <input
          id="password-confirmation"
          v-model="registerForm.password_confirmation"
          type="password"
          class="form__item"
        />
        <div class="form__button">
          <button type="submit" class="button button--inverse">register</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'

export default {
  data() {
    return {
      tab: 1,
      loginForm: {
        email: '',
        password: '',
      },
      registerForm: {
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
      },
    }
  },
  computed: {
    ...mapState({
      apiStatus: state => state.auth.apiStatus,
      loginErrors: state => state.auth.loginErrorMessages,
      registerErrors: state => state.auth.registerErrorMessages,
    }),
  },
  created() {
    this.clearError()
  },
  methods: {
    async login() {
      await this.$store.dispatch('auth/login', this.loginForm)
      if (this.apiStatus) {
        this.$router.push('/')
      }
    },
    async register() {
      await this.$store.dispatch('auth/register', this.registerForm)
      if (this.apiStatus) {
        this.$router.push('/')
      }
    },
    clearError() {
      this.$store.commit('auth/setLoginErrorMessages', null)
      this.$store.commit('auth/setRegisterErrorMessages', null)
    },
  },
}
</script>

<style lang="scss" scoped>
.tab {
  display: -webkit-box;
  display: flex;
  list-style: none;
  margin: 0;
  padding: 0;
}

.tab__item {
  border-bottom: 2px solid #dedede;
  color: #8a8a8a;
  cursor: pointer;
  margin: 0 1rem 0 0;
  padding: 1rem;
}

.tab__item--active {
  border-bottom: 2px solid #222;
  color: #222;
  font-weight: bold;
}

.form__item {
  border: 1px solid #dedede;
  border-radius: 0.25rem;
  font-size: 1rem;
  margin-bottom: 1rem;
  padding: 0.5em 0.75em;
  width: 100%;
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

.button--inverse {
  background: #222;
  border-color: #222;
  color: #fff;
  -webkit-transition: opacity 300ms ease-in-out;
  transition: opacity 300ms ease-in-out;
}

.button--inverse:hover {
  background: #222;
  color: #fff;
  opacity: 0.8;
}
</style>
