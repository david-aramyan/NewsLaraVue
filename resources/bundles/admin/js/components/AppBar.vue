<template>
  <v-app-bar clipped-left app>
    <v-app-bar-nav-icon/>

    <v-toolbar-title>Page title</v-toolbar-title>

    <v-spacer/>

    <form action="/admin/logout" method="post">
      <input type="hidden" name="_token" :value="$csrf">
      <v-btn type="submit" color="primary" icon>
        <v-icon>mdi-logout-variant</v-icon>
      </v-btn>
    </form>
  </v-app-bar>
</template>

<script>
  export default {
    name: 'AppBar',
    mounted() {
      console.log('AppBar mounted.')
    }
  }
</script>
