<template>
  <v-container>
    <v-data-table
      :items="posts"
      :headers="headers"
      :items-per-page="15"
      class="elevation-1"
    >
      <template v-slot:top>
        <v-toolbar flat color="white">
          <v-toolbar-title>MY NEWS</v-toolbar-title>

          <v-divider class="mx-4" inset vertical/>

          <v-spacer/>

          <v-btn :href="$go('admin.news.create')" color="primary">New Item</v-btn>
        </v-toolbar>
      </template>
      <template v-slot:item.actions="{ item }">
        <v-icon small class="mr-2">
          mdi-pencil
        </v-icon>
        <v-icon small>
          mdi-delete
        </v-icon>
      </template>
    </v-data-table>
  </v-container>
</template>

<script>
  export default {
    name: "PostsIndex",
    data: () => ({
      headers: [
        {
          text: 'ID',
          align: 'start',
          sortable: true,
          value: 'id',
        },
        { text: 'Title', value: 'title' },
        { text: 'Text', value: 'text' },
        { text: 'Actions', value: 'actions', sortable: false },
      ],
      posts: []
    })
  }
</script>

<style scoped>

</style>
