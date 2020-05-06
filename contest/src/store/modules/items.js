import { SET_TEXT, SET_LIST, REMOVE_ITEM, SET_EXISTING_LIST, RESTORE_LIST, UNDO_ACTION, REDO_ACTION, SET_CHECKED, SET_ITEM_TEXT, SET_HEADING } from '@/store/mutation-types'
import router from '@/router'

const state = () => ({
  list: [],
  text: '',
  heading: '',
  undoCache: [],
  redoCache: []
})

const getters = {}

const mutations = {
  [SET_TEXT] (state, payload) {
    state.text = payload
  },
  [SET_HEADING] (state, payload) {
    state.heading = payload
  },
  [SET_LIST] (state) {
    state.undoCache = [...state.list]
    state.list.push({
      text: state.text,
      checked: false
    })
    state.redoCache = [...state.list]
  },
  [UNDO_ACTION] (state) {
    state.list = [...state.undoCache]
  },
  [REDO_ACTION] (state) {
    state.list = [...state.redoCache]
  },
  [SET_EXISTING_LIST] (state, payload) {
    state.list = payload
  },
  [RESTORE_LIST] (state, payload) {
    state.list = payload
  },
  [REMOVE_ITEM] (state, payload) {
    const list = [...state.list]
    const filtered = list.filter(item => item !== list[payload])
    state.list = filtered
  },
  [SET_CHECKED] (state, payload) {
    state.list[payload].checked = true
  },
  [SET_ITEM_TEXT] (state, payload) {
    const { index, text } = payload
    state.list[index].text = text
  }
}

const actions = {
  async setItem ({ dispatch, commit, state }, payload) {
    try {
      await dispatch('setNoteInstance', [{ list: state.list, heading: state.heading }, payload], { root: true })
      commit(SET_EXISTING_LIST, [])
      commit(SET_TEXT, '')
    } catch (error) {
      console.error(error)
    }
  },
  async removeNote ({ dispatch, commit }, payload) {
    try {
      await dispatch('removeNoteInstance', payload, { root: true })
      commit(SET_EXISTING_LIST, [])
      commit(SET_TEXT, '')
      router.push('/')
    } catch (error) {
      console.error(error)
    }
  },
  async setExistingList ({ commit }, payload) {
    try {
      const list = await JSON.parse(localStorage.getItem('notes-list'))
      if (list[payload] && list[payload].list) {
        commit(SET_EXISTING_LIST, list[payload].list)
      }
    } catch (error) {
      console.error(error)
    }
  },
  async restoreChanges ({ commit }, payload) {
    try {
      const list = await JSON.parse(localStorage.getItem('notes-list'))
      commit(RESTORE_LIST, list[payload] ? list[payload].list : [])
    } catch (error) {
      console.error(error)
    }
  }
}

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}
