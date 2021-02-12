<template>
  <!-- Sidebar -->
  <div class="c-sidebar c-sidebar-dark c-sidebar-lg-show c-sidebar-fixed">
    <router-link to="/" class="c-sidebar-brand d-md-down-none">
      <img src="../../assets/img/khedma.png" class="w-100" />
    </router-link>

    <ul class="navbar-nav" style="position: relative;">
      <li class="c-sidebar-nav-item">
        <router-link to="/" class="c-sidebar-nav-link" target="_self">
          <i class="fas fa-fw fa-tachometer-alt c-sidebar-nav-icon"></i>
          Dashboard
        </router-link>
      </li>

      <li class="c-sidebar-nav-item">
        <router-link class="c-sidebar-nav-link" to="order">
          <i class="fas fa-file-signature c-sidebar-nav-icon"></i> Orders
        </router-link>
      </li>

      <li class="c-sidebar-nav-item">
        <router-link class="c-sidebar-nav-link" to="AddUser">
          <i class="fas fa-users c-sidebar-nav-icon"></i> Users
        </router-link>
      </li>

      <li class="c-sidebar-nav-item">
        <router-link class="c-sidebar-nav-link" to="ProjectAndUnits">
          <i class="fas fa-house-user c-sidebar-nav-icon"></i> Projects And
          Units
        </router-link>
      </li>

      <li class="c-sidebar-nav-item">
        <router-link class="c-sidebar-nav-link" to="ProjectAndUnits">
          <i class="fas fa-concierge-bell c-sidebar-nav-icon"></i> Service
        </router-link>
      </li>
    </ul>
  </div>

  <!-- End of Sidebar -->
</template>

<script>
export default {
  name: "Sidebar"
};
</script>

<style scoped>
.nav-item .router-link-exact-active {
  background: #b11f3f;
  color: #fff !important;
}
.nav-item .router-link-exact-active i {
  color: #fff !important;
}
</style>
