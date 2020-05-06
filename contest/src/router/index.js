import Vue from 'vue'
import VueRouter from 'vue-router'
import TheNotesList from '../views/TheNotesList.vue'
import TheNote from '../views/TheNote.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'TheNotesList',
    component: TheNotesList
  },
  {
    path: '/note/:noteIndex',
    name: 'TheNote',
    component: TheNote,
    props: true
  }/* ,
  {
    path: '/about',
    name: 'About',
    component: () => import(\/* webpackChunkName: "about" *\/'../views/About.vue')
  } */
]

const router = new VueRouter({
  routes
})

export default router
