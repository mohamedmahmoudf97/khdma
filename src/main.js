import "@coreui/coreui/scss/coreui.scss";
import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import axios from "axios";
import CoreuiVue from "@coreui/vue";
import { CSwitch, CButton } from "@coreui/vue";
Vue.component("CButton", CButton);

Vue.use(CoreuiVue);

require("@/store/subscriber");
axios.defaults.baseURL = "http://localhost:8000/api";

Vue.config.productionTip = false;

store
  .dispatch("auth/attempt", localStorage.getItem("access_token"))
  .then(() => {
    new Vue({
      router,
      store,
      CSwitch,
      render: h => h(App)
    }).$mount("#app");
  });
