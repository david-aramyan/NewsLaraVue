import Vue from "vue";
import store from "./plugins/store";
import router from "./plugins/router";
import vuetify from "./plugins/vuetify";
import { auth, csrf, go, redirect } from "./bootstrap";

Vue.config.productionTip = false;

Vue.prototype.$redirect = redirect;
Vue.prototype.$csrf = csrf;
Vue.prototype.$go = go;

new Vue({
  store,
  router,
  vuetify,
  created() {
    this.$store.commit('AUTH', auth);
  }
}).$mount('#app');
