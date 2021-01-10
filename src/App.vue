<template>
  <div id="app">
    <div v-if="isLogin">
      <!--  this component will show after login -->
      <Dashboard />
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
      <Login @loginOn="loginOn" />
    </div>
  </div>
</template>

<script>
require("jquery/src/jquery");
require("bootstrap/dist/js/bootstrap.bundle.min");
require("@fortawesome/fontawesome-free/css/all.min.css");

import Sidebar from "@/components/layouts/Sidebar.vue";
import Navbar from "@/components/layouts/Navbar.vue";
import Login from "@/components/Login/Login.vue";

export default {
  data() {
    return {
      isLogin: false,
      iferror: false
    };
  },
  components: {
    Sidebar,
    Navbar,
    Login
  },
  methods: {
    loginOn() {
      this.isLogin = true;
    }
  }
};
</script>

<style scoped>
@import "assets/css/sb-admin-2.css";
</style>
