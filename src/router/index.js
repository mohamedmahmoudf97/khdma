import Vue from "vue";
import VueRouter from "vue-router";

import NotFound from "../views/NotFound.vue";
import Dashboard from "@/components/Dashboard/Dashboard.vue";
import AddOrder from "../components/Orders/AddOrder";
import AddUser from "../components/User/AddUser.vue";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Dashboard",
    component: Dashboard
    // beforeEnter: (to, from, next) ={
    //   if(!store.getters['auth/authenticated']){
    //     return next({
    //       name: "Login"
    //     })
    //   }
    //   next()
    // }
  },
  // { path: "/Login", name: "Login", component: Login },

  { path: "/AddUser", name: "AddUser", component: AddUser },

  { path: "/AddOrder", name: "AddOrder", component: AddOrder },

  { path: "/:id", name: "NotFound", component: NotFound }
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes
});

export default router;
