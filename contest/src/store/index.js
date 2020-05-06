import Vue from 'vue'
import Vuex from 'vuex'
import items from '@/store/modules/items'
import { SET_NOTE_INSTANCE, REMOVE_NOTE_INSTANCE } from '@/store/mutation-types'
import router from '@/router'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    notesList: JSON.parse(localStorage.getItem('notes-list')) || []
  },
  mutations: {
    [SET_NOTE_INSTANCE] (state, payload) {
      const [item, index] = payload
      state.notesList.splice(index, 1, item)
    },
    [REMOVE_NOTE_INSTANCE] (state, payload) {
      const notes = [...state.notesList]
      const filtered = notes.filter(item => item !== notes[payload])
      state.notesList = filtered
    }
  },
  actions: {
    async setNoteInstance ({ commit, state }, payload) {
      try {
        commit(SET_NOTE_INSTANCE, payload)
        await localStorage.setItem('notes-list', JSON.stringify(state.notesList))

        if (router.currentRoute !== '/') {
          router.push('/')
        }
      } catch (error) {
        console.error(error)
      }
    },
    async removeNoteInstance ({ commit, state }, payload) {
      try {
        commit(REMOVE_NOTE_INSTANCE, payload)
        await localStorage.setItem('notes-list', JSON.stringify(state.notesList))
      } catch (error) {
        console.error(error)
      }
    }
  },
  modules: {
    items
  }
})
