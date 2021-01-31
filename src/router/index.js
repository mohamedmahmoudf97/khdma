import Vue from "vue";
import VueRouter from "vue-router";
import store from "@/store";

import Dashboard from "@/components/Dashboard/Dashboard.vue";
import AddUser from "@/components/User/AddUser.vue";
import AddOrder from "@/components/Orders/AddOrder";
import AddService from "@/components/addService/addService";
import ProjectAndUnits from "@/components/ProjectsAndunits/ProjectAndUnits";
import NotFound from "@/views/NotFound.vue";

Vue.use(VueRouter);

const routes = [
  { path: "/", name: "Dashboard", component: Dashboard },
  { path: "/AddUser", name: "AddUser", component: AddUser },
  { path: "/AddOrder", name: "AddOrder", component: AddOrder },
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
