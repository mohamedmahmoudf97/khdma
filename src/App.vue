<template>
  <div id="app">
    <div v-if="authenticated">
      <!--  this component will show after login -->
      <!-- Page Wrapper -->
      <div id="wrapper">
        <Sidebar />
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
          <!-- Main Content -->
          <div id="content">
            <Navbar />
            <router-view />
          </div>
        </div>
      </div>
    </div>

    <div v-else>
      <!--  this component will show before login -->
      <Login />
    </div>
  </div>
</template>

<script>
require("jquery/src/jquery");
require("bootstrap/dist/js/bootstrap.bundle.min");
require("@fortawesome/fontawesome-free/css/all.min.css");
// require('vue-search-select');

import { mapGetters } from "vuex";

import Sidebar from "@/components/layouts/Sidebar.vue";
import Navbar from "@/components/layouts/Navbar.vue";
import Login from "@/components/Login/Login.vue";

export default {
  computed: {
    ...mapGetters({
      authenticated: "auth/authenticated"
    })
  },
  components: {
    Sidebar,
    Navbar,
    Login
  }
};
</script>

<style scoped>
@import "assets/css/sb-admin-2.css";
@import "~vue-search-select/dist/VueSearchSelect.css";
</style>
