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
</template>

<script>
export default {
  name: "Sidebar",
  data() {
    return {
      links: [
        { to: "/", icon: "fas fa-fw fa-tachometer-alt", name: "Dashboard" },
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
      ],

      MaintenanceLinks: [
        {
          to: "datatables.html",
          done: true,
          icon: "fas fa-network-wired",
          name: "All",
          value: 20
        },
        {
          to: "datatables.html",
          done: false,
          icon: "fas fa-faucet",
          name: "Plumber",
          value: 10
        },
        {
          to: "datatables.html",
          done: true,
          icon: "fas fa-plug",
          name: "Electrician",
          value: 0
        },
        {
          to: "datatables.html",
          done: true,
          icon: "fas fa-hammer",
          name: "Carpenter",
          value: 10
        },
        {
          to: "datatables.html",
          done: false,
          icon: "fas fa-paint-roller",
          name: "Painting",
          value: 12
        },
        {
          to: "datatables.html",
          done: false,
          icon: "fas fa-satellite-dish",
          name: "Satellite",
          value: 14
        },
        {
          to: "datatables.html",
          done: false,
          icon: "fas fa-screwdriver",
          name: "Aluminum",
          value: 24
        },
        {
          to: "datatables.html",
          done: false,
          icon: "fas fa-fan",
          name: "Air Conditioning",
          value: 44
        },
        {
          to: "datatables.html",
          done: false,
          icon: "fab fa-ethereum",
          name: "Others",
          value: 1
        }
      ],

      PreviewsLinks: [
        {
          done: false,
          to: "#",
          icon: "fas fa-network-wired",
          name: "All",
          value: 15
        },
        {
          done: false,
          to: "#",
          icon: "fas fa-car-alt",
          name: "Car Wash",
          value: 10
        },
        {
          done: false,
          to: "#",
          icon: "far fa-newspaper",
          name: "Newspaper",
          value: 0
        },
        {
          done: false,
          to: "#",
          icon: "far fa-house-user",
          name: "Housekeeping",
          value: 1
        },
        {
          done: true,
          to: "#",
          icon: "far fa-pagelines",
          name: "Planting & gardens",
          value: 3
        },
        {
          done: true,
          to: "#",
          icon: "far fa-people-carry",
          name: "Carry Remnants",
          value: 0
        },
        {
          done: false,
          to: "#",
          icon: "far fa-ethereum",
          name: "Others",
          value: 2
        }
      ]
    };
  }
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
