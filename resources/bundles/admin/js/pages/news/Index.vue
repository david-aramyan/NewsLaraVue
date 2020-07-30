<template>
  <v-container>
    <v-data-table
      :items="items"
      :headers="headers"
      :loading="loading"
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
      <template v-slot:item.actions="{item, index}">
        <v-btn :href="$go('admin.news.edit', {id: item.id})" class="mr-2" icon small>
          <v-icon small>mdi-pencil</v-icon>
        </v-btn>
        <v-btn @click="deleteNews(item, index)" color="error" icon small>
          <v-icon small>mdi-delete</v-icon>
        </v-btn>
      </template>
    </v-data-table>
  </v-container>
</template>

<script>
  import { News } from "../../models/News";

  export default {
    name: "PostsIndex",
    props: {
      news: {
        required: true,
        type: Array,
      }
    },
    data: () => ({
      loading: false,
      items: [],
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
    }),
    methods: {
      deleteNews(item) {
        const index = this.items.findIndex(i => i.id === item.id);

        this.loading = 'primary';

        item.destroy().prefix('admin').send()
          .then(res => this.items.splice(index, 1))
          .catch(err => console.log(err))
          .finally(() => this.loading = false);
      }
    },
    created() {
      this.items = this.news.map(item => new News(item))
    }
  }
</script>

<style scoped>

</style>
