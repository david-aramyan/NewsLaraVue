import Vue from "vue";
import Vuex from "vuex";
import { cloneDeep } from "lodash";

Vue.use(Vuex);

const store = new Vuex.Store({
  state: {
    auth: {
      check: false,
      user: null
    }
  },

  getters: {},

  mutations: {
    AUTH: (state, auth) => state.auth = cloneDeep(auth),
  },

  actions: {}
});

export default store;
