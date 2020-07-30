<template>
  <v-container>
    <v-row>
      <v-col v-for="item in items" :key="`news-${item.id}`" cols="12">
        <v-skeleton-loader
          :loading="loading"
          elevation="1"
          height="365"
          type="card"
        >
          <v-card class="mx-auto my-12">
            <v-img height="250" :src="item.img" alt="news image"/>

            <v-card-title v-text="item.title" />

            <v-divider class="mx-4"/>

            <v-card-actions>
              <v-btn :href="$go('news.show', {id: item.id})" color="primary" text>
                Read More
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-skeleton-loader>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
  export default {
    name: "Welcome",
    props: {
      items: {
        required: true,
        type: Array
      }
    },
    components: {
      VBoilerplate: {
        functional: true,

        render(h, {data, props, children}) {
          return h('v-skeleton-loader', {
            ...data,
            props: {
              boilerplate: true,
              elevation: 2,
              ...props,
            },
          }, children)
        },
      },
    },
    data: () => ({
      loading: true
    }),
    mounted() {
      window.onload = () => setTimeout(() => this.loading = false, 1500);
    }
  }
</script>

<style scoped>

</style>
