import Vue from "vue";
import VueRouter from "vue-router";
import store from "@/store";

import NotFound from "../views/NotFound.vue";
import Dashboard from "@/components/Dashboard/Dashboard.vue";
import Order from "../components/Orders/Order";
import AddService from "../components/addService/addService";
import AddUser from "@/components/User/AddUser.vue";
import ProjectAndUnits from "@/components/ProjectsAndunits/ProjectAndUnits";

Vue.use(VueRouter);

const routes = [
  { path: "/", name: "Dashboard", component: Dashboard },

  { path: "/AddUser", name: "AddUser", component: AddUser },

  { path: "/order", name: "Order", component: Order },
  { path: "/AddService", name: "AddService", component: AddService },

  {
    path: "/ProjectAndUnits",
    name: "ProjectAndUnits",
    component: ProjectAndUnits
  },

  { path: "/:id", name: "NotFound", component: NotFound }
];
const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes
});
router.beforeEach((to, from, next) => {
  store.dispatch("auth/attempt", localStorage.getItem("access_token"));
  next();
});
export default router;
