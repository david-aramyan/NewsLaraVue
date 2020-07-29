<template>
  <v-navigation-drawer permanent clipped app>
    <v-list-item>
      <v-list-item-content>
        <v-list-item-title class="title">
          Application
        </v-list-item-title>
        <v-list-item-subtitle>
          subtext
        </v-list-item-subtitle>
      </v-list-item-content>
    </v-list-item>

    <v-divider/>

    <v-list dense nav>
      <v-list-item
        :input-value="$route.name==='admin.news.index'"
        :href="$go('admin.news.index')"
        color="primary"
        link
      >
        <v-list-item-icon>
          <v-icon>mdi-newspaper-variant-outline</v-icon>
        </v-list-item-icon>

        <v-list-item-content>
          <v-list-item-title>News</v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    </v-list>
  </v-navigation-drawer>
</template>

<script>
  export default {
    name: "NavBar"
  }
</script>

<style scoped>

</style>
