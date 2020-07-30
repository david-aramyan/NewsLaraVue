import Vue from "vue";
import Vuex from "vuex";
import { cloneDeep } from "lodash";

Vue.use(Vuex);

const store = new Vuex.Store({
  state: {
    auth: {
      user: null,
      check: false
    }
  },

  mutations: {
    AUTH: (state, auth) => state.auth = cloneDeep(auth),
  }
});

export default store;
