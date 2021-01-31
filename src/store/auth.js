import axios from "axios";

export default {
  namespaced: true,
  state: {
    access_token: null,
    user: null
  },
  getters: {
    authenticated(state) {
      return state.access_token && state.user;
    },
    user(state) {
      return state.user;
    }
  },
  mutations: {
    SET_TOKEN(state, token) {
      state.access_token = token;
    },
    SET_USER(state, data) {
      state.user = data;
    }
  },
  actions: {
    async login({ dispatch }, credentials) {
      let response = await axios.post("login-user", credentials);
      return dispatch("attempt", response.data.access_token);
    },

    async attempt({ commit, state }, access_token) {
      if (access_token) {
        commit("SET_TOKEN", access_token);
      }

      if (!state.access_token) {
        return;
      }

      try {
        let response = await axios.post("get-user", {
          headers: {
            Authorization: "Bearer " + access_token
          }
        });
        commit("SET_USER", response.data);
      } catch (e) {
        commit("SET_TOKEN", null);
        commit("SET_USER", null);
      }
    },

    logOut({ commit }) {
      // return axios.post('login-out').then(() => {
      commit("SET_TOKEN", null);
      commit("SET_USER", null);
      // })
    }
  }
};
