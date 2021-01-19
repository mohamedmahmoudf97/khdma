import Vue from "vue";
import VueRouter from "vue-router";
// import store from "@/store";

import NotFound from "../views/NotFound.vue";
import Dashboard from "@/components/Dashboard/Dashboard.vue";
import AddOrder from "@/components/Orders/AddOrder";
import AddService from "../components/addService/addService";
import AddUser from "@/components/User/AddUser.vue";
import AddProjectAndUnits from "../components/ProjectsAndunits/AddProjectAndUnits";

Vue.use(VueRouter);

const routes = [
  { path: "/", name: "Dashboard", component: Dashboard },

  { path: "/AddUser", name: "AddUser", component: AddUser },

  { path: "/AddOrder", name: "AddOrder", component: AddOrder },
  { path: "/AddService", name: "AddService", component: AddService },

  {
    path: "/AddProjectAndUnits",
    name: "AddProjectAndUnits",
    component: AddProjectAndUnits
  },

  { path: "/:id", name: "NotFound", component: NotFound }
];
const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes
});
export default router;
