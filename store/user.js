import {
  SET_AVATAR,
  SET_NAME,
  SET_BIO,
  SET_EMAIL,
} from '@/store//mutation-types'
import EventService from '@/services/EventService.js'
export const state = () => ({
  avatar: '',
  name: '',
  bio: '',
  email: '',
})
export const mutations = {
  [SET_AVATAR](state, payload) {
    state.avatar = payload
  },
  [SET_NAME](state, payload) {
    state.name = payload
  },
  [SET_BIO](state, payload) {
    state.bio = payload
  },
  [SET_EMAIL](state, payload) {
    state.email = payload
  },
}
export const actions = {
  async getUser({ commit }) {
    const { data } = await EventService.getUser()
    const { name, bio, email } = data
    commit(SET_AVATAR, data.avatar_url)
    commit(SET_NAME, name)
    commit(SET_BIO, bio)
    commit(SET_EMAIL, email)
  },
}
