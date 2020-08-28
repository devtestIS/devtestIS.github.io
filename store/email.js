import {
  SET_EMAIL_SENDER,
  SET_EMAIL_NAME,
  SET_EMAIL_TEXT,
  SET_MESSAGE,
} from '@/store//mutation-types'
import EventService from '@/services/EventService.js'
export const state = () => ({
  sender: '',
  name: '',
  text: '',
  message: '',
})
export const mutations = {
  [SET_EMAIL_SENDER](state, payload) {
    state.sender = payload
  },
  [SET_EMAIL_NAME](state, payload) {
    state.name = payload
  },
  [SET_EMAIL_TEXT](state, payload) {
    state.text = payload
  },
  [SET_MESSAGE](state, payload) {
    state.message = payload
  },
}
export const actions = {
  setSender({ commit }, payload) {
    commit(SET_EMAIL_SENDER, payload)
  },
  setName({ commit }, payload) {
    commit(SET_EMAIL_NAME, payload)
  },
  setText({ commit }, payload) {
    commit(SET_EMAIL_TEXT, payload)
  },
  async sendEmail({ commit, state }) {
    const { sender, name, text } = state
    const { data } = await EventService.sendEmail({
      sender,
      name,
      text,
    })
    commit(SET_MESSAGE, data)
  },
}
