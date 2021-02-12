<template>
  <div id="app">
    <div v-if="authenticated">
      <!--  this component will show after login -->
      <!-- Page Wrapper -->
      <div class="c-app">
        <Sidebar />
        <div class="c-wrapper">
          <Navbar />
          <!-- Content Wrapper -->
          <div class="c-body">
            <!-- Main Content -->
            <main class="c-main">
              <router-view />
            </main>
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
require("@fortawesome/fontawesome-free/css/all.min.css");

import { mapGetters } from "vuex";

import Sidebar from "@/components/layouts/Sidebar.vue";
import Navbar from "@/components/layouts/Navbar.vue";
import Login from "@/components/Login/Login.vue";

export default {
  computed: {
    ...mapGetters({
      authenticated: "auth/authenticated",
      user: "auth/user"
    })
  },
  components: {
    Sidebar,
    Navbar,
    Login
  }
};
</script>

<style lang="scss" scoped>
.form-control.border-danger:focus {
  box-shadow: 0 0 0 0.2rem rgba(229, 83, 83, 0.25) !important;
}
</style>
