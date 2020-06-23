import Vue from "vue";
import Vuex from "vuex";
import listService from "@/services/listService";
import {
  SET_TOURNAMENTS_LIST,
  INCREMENT_START,
  SET_REQUEST_STATUS
} from "./mutation-types";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    start: 0,
    tournamentsData: [],
    pending: false
  },
  getters: {
    tournamentsList: state =>
      state.tournamentsData.map(item => item.tournamentData)
  },
  mutations: {
    [SET_TOURNAMENTS_LIST](state, payload) {
      state.tournamentsData = [...state.tournamentsData, ...payload];
    },
    [INCREMENT_START](state, step) {
      state.start = state.start + step;
    },
    [SET_REQUEST_STATUS](state, payload) {
      state.pending = payload;
    }
  },
  actions: {
    async getTourmentsList({ commit, state }) {
      try {
        commit(SET_REQUEST_STATUS, true);
        commit(SET_TOURNAMENTS_LIST, await listService.getList(state.start));
        commit(SET_REQUEST_STATUS, false);
        commit(INCREMENT_START, 15);
      } catch (error) {
        console.error(error);
      }
    }
  },
  modules: {}
});
