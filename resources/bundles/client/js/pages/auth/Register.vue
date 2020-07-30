<template>
  <v-container fluid fill-height>
    <v-row align="center" justify="center">
      <v-col cols="12" xs="4" sm="8" md="4" lg="4">
        <v-card :loading="loading">
          <v-card-title>
            <v-btn :href="$go('news.index')" icon>
              <v-icon>mdi-arrow-left</v-icon>
            </v-btn>

            <div class="headline mx-3">Register</div>
          </v-card-title>

          <ValidationObserver ref="form" v-slot="{ invalid }">
            <v-form ref="login" method="post" action="/register">

              <input type="hidden" name="_token" :value="$csrf">

              <v-card-text>
                <ValidationProvider name="email" :rules="auth.rules.name" v-slot="{ errors }">
                  <v-text-field
                    v-model="auth.name"
                    :error-messages="errors"
                    prepend-inner-icon="mdi-account-check-outline"
                    label="Full Name"
                    name="name"
                    autofocus
                    outlined
                  />
                </ValidationProvider>

                <ValidationProvider name="email" :rules="auth.rules.email" v-slot="{ errors }">
                  <v-text-field
                    v-model="auth.email"
                    :error-messages="errors"
                    prepend-inner-icon="mdi-account-check-outline"
                    label="Email"
                    name="email"
                    outlined
                  />
                </ValidationProvider>

                <ValidationProvider name="password" :rules="auth.rules.password" v-slot="{ errors }">
                  <v-text-field
                    v-model="auth.password"
                    :error-messages="errors"
                    @click:append="show = !show"
                    :append-icon="icon"
                    :type="type"
                    prepend-inner-icon="mdi-lock-outline"
                    label="Password"
                    name="password"
                    outlined
                  />
                </ValidationProvider>

                <ValidationProvider name="confirm" rules="required" v-slot="{ errors }">
                  <v-text-field
                    v-model="auth.password_confirmation"
                    :error-messages="errors"
                    :type="type"
                    prepend-inner-icon="mdi-lock-outline"
                    name="password_confirmation"
                    label="Password"
                    outlined
                  />
                </ValidationProvider>
              </v-card-text>
              <v-card-actions>
                <v-btn :href="$go('login')" color="primary" text>
                  Login to account
                </v-btn>

                <v-spacer></v-spacer>

                <v-btn :disabled="invalid" color="primary" type="submit">
                  Register
                </v-btn>
              </v-card-actions>
            </v-form>
          </ValidationObserver>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
  import { isEmpty } from "lodash";
  import { Register } from "../../forms/Register";
  import { ValidationObserver, ValidationProvider, extend } from "vee-validate";

  extend('password', {
    params: ['target'],
    validate(value, { target }) {
      return value === target;
    },
    message: 'Password confirmation does not match'
  });

  export default {
    name: "Register",
    props: {
      errors: {
        required: true,
        type: Object
      },
      inputs: {
        required: true,
        type: Object
      }
    },
    components: {
      ValidationObserver,
      ValidationProvider
    },
    computed: {
      type() {
        return this.show ? 'text' : 'password';
      },
      icon() {
        return this.show ? 'mdi-eye-off' : 'mdi-eye';
      },
    },
    data: () => ({
      show: false,
      loading: false,
      auth: new Register()
    }),
    created() {
      this.auth = new Register(this.inputs);
    },
    mounted() {
      if (!isEmpty(this.errors)) this.$refs.form.setErrors(this.errors);
    }
  }
</script>

<style scoped>

</style>
