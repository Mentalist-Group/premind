<template>
  <v-container class="fill-height" fluid>
    <v-row align="center" justify="center">
      <v-col cols="12" sm="8" md="4">
        <!-- ログインエラー -->
        <v-row v-if="loginErrors" align="center" justify="center">
          <v-alert v-if="loginErrors.email" text outlined color="deep-orange" icon="mdi-alert">
            <div v-for="msg in loginErrors.email" :key="msg">
              {{ msg }}
            </div>
          </v-alert>
          <v-alert v-if="loginErrors.password" text outlined color="deep-orange" icon="mdi-alert">
            <div v-for="msg in loginErrors.password" :key="msg">
              {{ msg }}
            </div>
          </v-alert>
        </v-row>
        <!-- 登録エラー -->
        <v-row v-if="registerErrors" align="center" justify="center">
          <v-alert v-if="registerErrors.name" text outlined color="deep-orange" icon="mdi-alert">
            <div v-for="msg in registerErrors.name" :key="msg">
              {{ msg }}
            </div>
          </v-alert>
          <v-alert v-if="registerErrors.email" text outlined color="deep-orange" icon="mdi-alert">
            <div v-for="msg in registerErrors.email" :key="msg">
              {{ msg }}
            </div>
          </v-alert>
          <v-alert v-if="registerErrors.password" text outlined color="deep-orange" icon="mdi-alert">
            <div v-for="msg in registerErrors.password" :key="msg">
              {{ msg }}
            </div>
          </v-alert>
        </v-row>
        <!-- 認証フォームヘッダ -->
        <v-card class="elevation-12">
          <v-tabs fixed-tabs background-color="indigo" dark>
            <v-tab @click="selectLoginTab">Login</v-tab>
            <v-tab @click="selectRegisterTab">Register</v-tab>
          </v-tabs>
          <!-- ログインタブ -->
          <div v-show="tab === 1">
            <ValidationObserver ref="obs1" v-slot="{ invalid, validated, passes }">
              <v-card-text>
                <v-form ref="form">
                  <VTextFieldWithValidation
                    id="login-email"
                    v-model="loginForm.email"
                    label="E-mail"
                    rules="required|email"
                    prepend-icon="email"
                  />
                  <VTextFieldWithValidation
                    id="login-password"
                    v-model="loginForm.password"
                    label="Password"
                    rules="required|min:4"
                    prepend-icon="lock"
                  />
                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-btn @click="clearLoginForm">Clear</v-btn>
                <v-spacer />
                <v-btn color="primary" :disabled="invalid || !validated" @click="passes(login)">Login</v-btn>
              </v-card-actions>
            </ValidationObserver>
          </div>
          <!-- 登録タブ -->
          <div v-show="tab === 2">
            <ValidationObserver ref="obs2" v-slot="{ invalid, validated, passes }">
              <v-card-text>
                <v-form ref="form">
                  <VTextFieldWithValidation
                    id="username"
                    v-model="registerForm.name"
                    label="UserName"
                    rules="required|max:30"
                    prepend-icon="person"
                  />
                  <VTextFieldWithValidation
                    id="email"
                    v-model="registerForm.email"
                    label="E-mail"
                    rules="required|email"
                    prepend-icon="email"
                  />
                  <VTextFieldWithValidation
                    id="password"
                    v-model="registerForm.password"
                    label="Password"
                    rules="required|min:4"
                    prepend-icon="lock"
                    type="password"
                  />
                  <VTextFieldWithValidation
                    id="password-confirmation"
                    v-model="registerForm.password_confirmation"
                    label="Password Confirmation"
                    rules="required|min:4"
                    prepend-icon="lock"
                    type="password"
                  />
                </v-form>
              </v-card-text>
              <v-card-actions>
                <v-btn @click="clearRegisterForm">Clear</v-btn>
                <v-spacer />
                <v-btn color="primary" :disabled="invalid || !validated" @click="passes(register)">Register</v-btn>
              </v-card-actions>
            </ValidationObserver>
          </div>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import { mapState } from 'vuex'
import { ValidationObserver } from 'vee-validate'
import VTextFieldWithValidation from '../components/inputs/VTextFieldWithValidation'

export default {
  components: {
    ValidationObserver,
    VTextFieldWithValidation,
  },
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
    async clearLoginForm() {
      this.loginForm = { ...this.loginForm, email: '', password: '' }
      requestAnimationFrame(() => {
        this.$refs.obs1.reset()
      })
    },
    async clearRegisterForm() {
      this.registerForm = { ...this.registerForm, name: '', email: '', password: '', password_confirmation: '' }
      requestAnimationFrame(() => {
        this.$refs.obs2.reset()
      })
    },
    selectLoginTab() {
      this.tab = 1
      this.clearError()
    },
    selectRegisterTab() {
      this.tab = 2
      this.clearError()
    },
  },
}
</script>
