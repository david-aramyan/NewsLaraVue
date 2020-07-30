<template>
  <v-container>
    <ValidationObserver tag="div" ref="form" v-slot="{invalid}">
      <v-card :loading="loading">
        <v-card-title>
          <v-btn :href="$go('admin.news.index')" icon>
            <v-icon>mdi-arrow-left</v-icon>
          </v-btn>

          <div class="title mx-3">Update news   <strong>{{item.title}}</strong> </div>
        </v-card-title>
        <v-card-text>
          <ValidationProvider name="title" :rules="news.rules.title" v-slot="{errors}">
            <v-text-field
              v-model="news.title"
              :error-messages="errors"
              prepend-icon="mdi-format-title"
              label="Title"
              clearable
              autofocus
              outlined
            />
          </ValidationProvider>

          <ValidationProvider name="image" :rules="news.rules.image" v-slot="{errors}">
            <v-file-input
              v-model="news.image"
              :error-messages="errors"
              prepend-icon="mdi-image-move"
              accept="image/*"
              label="Image"
              clearable
              show-size
              outlined
            />
          </ValidationProvider>

          <ValidationProvider name="text" :rules="news.rules.text" v-slot="{errors}">
            <v-textarea
              v-model="news.text"
              :error-messages="errors"
              prepend-icon="mdi-text"
              label="Text"
              clearable
              outlined
            />
          </ValidationProvider>
        </v-card-text>
        <v-card-actions>
          <v-spacer/>

          <v-btn @click="createNews" :disabled="invalid" color="primary">Update</v-btn>
        </v-card-actions>
      </v-card>
    </ValidationObserver>
  </v-container>
</template>

<script>
  import { News } from "../../models/News";
  import { ValidationObserver, ValidationProvider } from "vee-validate";

  export default {
    name: "NewsUpdate",
    props: {
      item: {
        required: true,
        type: Object
      }
    },
    components: {
      ValidationObserver,
      ValidationProvider
    },
    data: () => ({
      loading: false,
      news: new News()
    }),
    methods: {
      createNews() {
        this.$refs.form.validate().then(valid => {
          if (!valid) return;

          this.loading = 'primary'
          this.news.update().prefix('admin').send()
            .then(res => {
              console.log(res);
              if (res.status === 200)
                this.$redirect(this.$go('admin.news.index'));
            })
            .catch(err => {
              if (err.response && err.response.status === 422) {
                this.$refs.form.setErrors(err.response.data.errors);
              }
            })
            .finally(() => this.loading = false);
        })
      }
    },
    created() {
      this.news.rules.image.required = false;
      this.news.set(this.item);
    }
  }
</script>

<style scoped>

</style>
