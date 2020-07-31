<template>
  <v-app-bar color="white" app>
    <v-app-bar-nav-icon color="primary"/>

    <v-toolbar-title class="font-weight-bold">NEWS</v-toolbar-title>

    <v-spacer/>

    <v-toolbar-items v-if="auth.check">
      <form ref="logout" action="/logout" method="post" style="display: none">
        <input type="hidden" name="_token" :value="$csrf">
      </form>

      <v-btn color="primary" @click="logout" text>Logout</v-btn>
    </v-toolbar-items>

    <v-toolbar-items v-else>
      <v-btn :href="$go('login')" color="primary" text>Login</v-btn>
      <v-btn :href="$go('register')" color="primary" text>Register</v-btn>
    </v-toolbar-items>
  </v-app-bar>
</template>

<script>
  export default {
    name: "AppBar",
    computed: {
      auth() {
        return this.$store.state.auth;
      }
    },
    methods: {
      logout() {
        this.$refs.logout.submit();
      }
    }
  }
</script>

<style scoped>

</style>
