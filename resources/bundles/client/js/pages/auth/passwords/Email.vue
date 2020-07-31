<template>
  <v-container>
    <v-row justify="center">
      <v-col md="8">
        <v-card>
          <ValidationObserver ref="form" v-slot="{invalid}">
            <v-form method="post" action="/password/email">
              <input type="hidden" name="_token" :value="$csrf">

              <v-card-title>
                <v-btn :href="$go('login')" icon>
                  <v-icon>mdi-arrow-left</v-icon>
                </v-btn>

                <div class="title mx-3">Reset Password</div>
              </v-card-title>

              <v-card-text>
                <v-alert type="success" v-if="status">{{status}}</v-alert>

                <ValidationProvider name="email" :rules="form.rules.email" v-slot="{errors}">
                    <v-text-field
                      v-model="form.email"
                      :error-messages="errors"
                      label="E-Mail Address"
                      name="email"
                      autofocus
                      outlined
                    />
                </ValidationProvider>
              </v-card-text>

              <v-card-actions>
                <v-spacer/>

                <v-btn :disabled="invalid" color="primary" type="submit">
                  Send Password Reset Link
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
  import { PasswordRequest } from "../../../forms/PasswordRequest";
  import { ValidationObserver, ValidationProvider } from "vee-validate";

  export default {
    name: "Email",
    props: {
      errors: {
        required: true,
        type: Object
      },
      inputs: {
        required: true,
        type: Object
      },
      status: {
        required: true,
        type: String
      }
    },
    components: {
      ValidationObserver,
      ValidationProvider
    },
    data: () => ({
      form: {}
    }),
    created() {
      this.form = new PasswordRequest(this.inputs)

      if (!isEmpty(this.errors)) this.$refs.form.setErrors(this.errors);
    }
  }
</script>

<style scoped>

</style>
