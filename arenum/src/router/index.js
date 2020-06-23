import Vue from "vue";
import VueRouter from "vue-router";
import TournamentsList from "../views/TournamentsList.vue";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "TournamentsList",
    component: TournamentsList
  }
];

const router = new VueRouter({
  routes
});

export default router;
