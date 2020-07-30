<template>
  <v-container>
    <v-card class="mx-auto my-12">
      <v-img height="250" :src="item.img" alt="news image"/>

      <v-card-title>
        <div class="title" v-text="item.title"></div>
      </v-card-title>

      <v-card-text v-text="item.text" />

      <v-divider class="mx-4"/>

      <v-card-actions>
        <v-btn :href="$go('news.index')" color="primary" text>
          <v-icon>mdi-arrow-left</v-icon> Back
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-container>
</template>

<script>
  export default {
    name: "NewsShow",
    props: {
      item: {
        required: true,
        type: Object
      }
    }
  }
</script>

<style scoped>

</style>
