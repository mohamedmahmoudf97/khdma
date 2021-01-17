import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import axios from "axios";
import { Form, HasError, AlertError, AlertErrors, AlertSuccess } from "vform";

window.Form = Form;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
Vue.component(AlertErrors.name, AlertErrors);
Vue.component(AlertSuccess.name, AlertSuccess);

require("@/store/subscriber");
axios.defaults.baseURL = "http://localhost:8000/api";

Vue.config.productionTip = false;

store
  .dispatch("auth/attempt", localStorage.getItem("access_token"))
  .then(() => {
    new Vue({
      router,
      store,
      render: h => h(App)
    }).$mount("#app");
  });
