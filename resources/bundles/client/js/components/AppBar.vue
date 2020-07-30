<template>
  <v-app-bar color="white" app>
    <v-app-bar-nav-icon color="primary"/>

    <v-toolbar-title class="font-weight-bold">NEWS</v-toolbar-title>

    <v-spacer/>

    <v-toolbar-items>
      <v-btn :href="$go('login')" color="primary" text>Login</v-btn>
      <v-btn :href="$go('register')" color="primary" text>Register</v-btn>
    </v-toolbar-items>
  </v-app-bar>
</template>

<script>
  export default {
    name: "AppBar"
  }
</script>

<style scoped>

</style>
