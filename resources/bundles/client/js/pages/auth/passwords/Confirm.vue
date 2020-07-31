<template>
  <v-container>
    <v-row justify="center">
      <v-col md="8">
        <v-card>
          <ValidationObserver ref="form" v-slot="{invalid}">
            <v-form method="post" action="/password/confirm">
              <v-card-title>Confirm Password</v-card-title>

              <v-card-text>
                <input type="hidden" name="_token" :value="$csrf">

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
              </v-card-text>

              <v-card-text>
                <a href="/password/reset">Forgot Your Password?</a>
              </v-card-text>

              <v-card-actions>
                <v-spacer/>

                <v-btn :disabled="invalid" color="primary" type="submit">Confirm Password</v-btn>
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
  import { PasswordConfirm } from "../../../forms/PasswordConfirm";
  import { ValidationObserver, ValidationProvider } from "vee-validate";

  export default {
    name: "Confirm",
    props: {
      errors: {
        required: true,
        type: Object
      },
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
      form: new PasswordConfirm()
    }),
    mounted() {
      if (!isEmpty(this.errors)) this.$refs.form.setErrors(this.errors);
    }
  }
</script>

<style scoped>

</style>
