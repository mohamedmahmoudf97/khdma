<template>
  <div id="app">
    <!-- <router-view /> -->
    <div v-if="isLogin">
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
      <Login />
      <!--  this component will show before login -->
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
      isLogin: false
    };
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
</style>
