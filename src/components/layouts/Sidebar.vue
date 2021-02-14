<template>
  <!-- Sidebar -->
  <div
    class="c-sidebar c-sidebar-dark c-sidebar-lg-show c-sidebar-fixed sidebar"
  >
    <router-link to="/" class="c-sidebar-brand d-md-down-none">
      <img src="../../assets/img/khedma.png" class="w-100" />
    </router-link>

    <ul class="navbar-nav" style="position: relative;">
      <li class="c-sidebar-nav-item" v-for="(link, inx) in links" :key="inx">
        <router-link :to="link.to" class="c-sidebar-nav-link" target="_self">
          <i :class="link.icon" class="fa-fw"></i><span>{{ link.name }}</span>
        </router-link>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "Sidebar",
  data() {
    return {
      links: [
        { to: "/", icon: "fas fa-tachometer-alt", name: "Dashboard" },
        {
          to: "/AddOrder",
          icon: "fas fa-plus-circle fa-sm",
          name: "Add Order"
        },
        { to: "/AddUser", icon: "fas fa-user-plus", name: "Add User" },
        {
          to: "/ProjectAndUnits",
          icon: "fas fa-house-user fa-sm",
          name: "Projects And Units"
        },
        {
          to: "/AddService",
          icon: "fas fa-concierge-bell",
          name: "Add Service"
        }
      ]
    };
  }
};
</script>

<style scoped lang="scss">
.sidebar li {
  a {
    i {
      font-size: 100%;
      line-height: 100%;
      display: block;
      margin: 0 10px;
    }

    &.c-sidebar-nav-link:hover,
    &.router-link-exact-active {
      background: #b21d40;
    }
  }
}
</style>
