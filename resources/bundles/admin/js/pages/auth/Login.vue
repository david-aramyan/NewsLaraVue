<template>
  <v-container fluid fill-height>
    <v-row align="center" justify="center">
      <v-col cols="12" xs="4" sm="8" md="4" lg="4">
        <v-card :loading="loading">
          <v-toolbar color="white" flat>
            <v-btn icon @click="back">
              <v-icon>mdi-chevron-left</v-icon>
            </v-btn>

            <v-spacer></v-spacer>

            <v-toolbar-title>
              <a href="/">
                <v-avatar tile size="36">
                  <v-img src="/img/newspaper.svg" alt="news" />
                </v-avatar>
              </a>
            </v-toolbar-title>

            <v-spacer></v-spacer>

            <v-btn icon>
              <v-icon>mdi-dots-vertical</v-icon>
            </v-btn>
          </v-toolbar>

          <v-card-title>
            <div class="text-center" style="width: 100%">
              <div class="headline" v-text="heading.header"></div>
              <span class="body-2 grey--text" v-html="heading.text"></span>
            </div>
          </v-card-title>

          <ValidationObserver ref="form" v-slot="{ validated, passes }">
            <v-form ref="login" method="post" action="/admin/login">

              <input type="hidden" name="_token" :value="$csrf">

              <v-window v-model="step">
                <v-window-item :value="1" eager>
                  <v-card-text>
                    <ValidationProvider :name="login.name" :rules="login.rule" v-slot="{ errors }">
                      <v-text-field
                        v-model="auth.login"
                        :error-messages="errors"
                        @keypress.enter.prevent="next"
                        prepend-inner-icon="mdi-account-check-outline"
                        label="Email Or Username"
                        :name="login.name"
                        autofocus
                        outlined
                      />
                    </ValidationProvider>
                  </v-card-text>
                </v-window-item>

                <v-window-item :value="2">
                  <v-card-text>
                    <v-row justify="center">
                      <v-chip class="ma-2" outlined @click="step=1">
                        <v-avatar left>
                          <v-icon>mdi-account-circle-outline</v-icon>
                        </v-avatar>
                        {{ auth.login }}
                        <v-icon right>mdi-chevron-down</v-icon>
                      </v-chip>
                    </v-row>

                    <ValidationProvider name="password" :rules="auth.rules.password" v-slot="{ errors }">
                      <v-text-field
                        v-model="auth.password"
                        :error-messages="errors"
                        @click:append="show = !show"
                        @keypress.enter="next"
                        :append-icon="icon"
                        :type="type"
                        prepend-inner-icon="mdi-lock-outline"
                        label="Password"
                        name="password"
                        autofocus
                        outlined
                      />
                    </ValidationProvider>

                    <ValidationProvider name="remember" rules="required" v-slot="{ errors }">
                      <v-checkbox
                        v-model="auth.remember"
                        :error-messages="errors"
                        :false-value="null"
                        :true-value="1"
                        autocomplete="off"
                        label="Remember Me?"
                        type="checkbox"
                        color="primary"
                        name="remember"
                      />
                    </ValidationProvider>
                  </v-card-text>
                </v-window-item>

                <v-window-item :value="3">
                  <v-card-text>
                    <v-row justify="center" align="center">
                      <v-progress-circular
                        color="primary"
                        :size="70"
                        :width="7"
                        indeterminate
                      />
                    </v-row>
                  </v-card-text>
                </v-window-item>
              </v-window>

              <v-card-actions>
                <v-spacer></v-spacer>

                <v-btn v-show="step < 3" :disabled="validated && !passes" color="primary" @click="next">
                  {{ text }}
                </v-btn>
              </v-card-actions>
            </v-form>
          </ValidationObserver>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script lang="js">
  import { isEmpty } from "lodash";
  import { Login } from "../../forms/auth/Login";
  import { ValidationProvider } from "vee-validate";
  import { ValidationObserver } from "vee-validate";

  export default {
    name: "Login",
    props: {
      errors: {
        default: () => ({}),
        required: false,
        type: Object
      },
      inputs: {
        default: () => ({}),
        required: false,
        type: Object
      },
    },
    components: {
      ValidationProvider,
      ValidationObserver,
    },
    computed: {
      type() {
        return this.show ? 'text' : 'password';
      },
      icon() {
        return this.show ? 'mdi-eye-off' : 'mdi-eye';
      },
      text() {
        return this.step === 2 ? 'Login' : 'Next';
      },
      heading() {
        switch (this.step) {
          case 1:
            return {
              header: 'Sign in',
              text: 'To continue to AutoParts'
            };
          case 2:
            return {
              header: 'Welcome',
              text: ''
            };
          default: return {}
        }
      },
      login() {
        if (this.auth.regexp.test(this.auth.login)) {
          return {rule: this.auth.rules.email, name: 'email'};
        }

        return {rule: this.auth.rules.username, name: 'username'};
      }
    },
    methods: {
      next() {
        this.loading = 'primary';
        this.$refs.form.validate().then(valid => {
          if (valid) this.step++;
          if (this.step === 3) this.$refs.login.$el.submit();
        }).finally(() => this.loading = (this.step === 3));
      },
      back() {
        this.step > 1 ? this.step-- : window.history.back();
      }
    },
    data: () => ({
      loading: false,
      show: false,
      auth: {},
      step: 1
    }),
    created() {
      this.auth = new Login(this.inputs);
    },
    mounted() {
      /* adding backend validation errors to error bag*/
      if (!isEmpty(this.errors)) this.$refs.form.setErrors(this.errors);
    }
  }
</script>
