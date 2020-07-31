<template>
  <v-container>
    <v-row justify="center">
      <v-col md="8">
        <v-card>
          <v-card-title>Reset Password</v-card-title>

          <ValidationObserver ref="form" v-slot="{invalid}">
            <v-form method="post" action="/password/reset">
              <v-card-text>
                <input type="hidden" name="_token" :value="$csrf">

                <input type="hidden" name="token" :value="token">

                <ValidationProvider name="email" :rules="form.rules.email" v-slot="{ errors }">
                  <v-text-field
                    v-model="form.email"
                    :error-messages="errors"
                    prepend-inner-icon="mdi-account-check-outline"
                    label="Email"
                    name="email"
                    outlined
                  />
                </ValidationProvider>

                <ValidationProvider name="password" :rules="form.rules.password" v-slot="{ errors }">
                  <v-text-field
                    v-model="form.password"
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
                    v-model="form.password_confirmation"
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
                <v-spacer/>

                <v-btn :disabled="invalid" color="primary" type="submit">Reset Password</v-btn>
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
  import { PasswordReset } from "../../../forms/PasswordReset";
  import { ValidationObserver, ValidationProvider } from "vee-validate";

  export default {
    name: "PasswordReset",
    props: {
      token: {
        required: true,
        type: String
      },
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
      form: {}
    }),
    created() {
      this.form = new PasswordReset(this.inputs);
    },
    mounted() {
      if (!isEmpty(this.errors)) this.$refs.form.setErrors(this.errors);
    }
  }
</script>

<style scoped>

</style>
