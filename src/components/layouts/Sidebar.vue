<template>
  <!-- Sidebar -->
  <ul
    class="navbar-nav bg-gradient-light sidebar sidebar-light accordion"
    id="accordionSidebar"
  >
    <router-link
      to="/"
      class="sidebar-brand d-flex align-items-center justify-content-center"
    >
      <div class="sidebar-brand-icon">
        <img src="../../assets/img/khedma.png" />
      </div>
    </router-link>
    <!-- Sidebar - Brand -->

    <!-- Divider -->
    <hr class="sidebar-divider my-0" />

    <!-- Nav Item - Dashboard -->
    <li class="nav-item" v-for="(link, inx) in links" :key="inx">
      <router-link :to="link.to" class="nav-link">
        <i :class="link.icon"></i>
        <span>{{ link.name }}</span>
      </router-link>
      <hr class="sidebar-divider mb-0" />
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a
        class="nav-link collapsed"
        href="#"
        data-toggle="collapse"
        data-target="#Maintenance"
        aria-expanded="true"
        aria-controls="Maintenance"
      >
        <i class="fas fa-fw fa-tools"></i>
        <span>Maintenance</span>
        <span class="counter">15</span>
      </a>
      <div
        id="Maintenance"
        class="collapse"
        aria-labelledby="headingPages"
        data-parent="#accordionSidebar"
      >
        <div class="bg-white collapse-inner">
          <a
            v-for="(link, inx) in MaintenanceLinks"
            :key="inx"
            class="collapse-item"
            :href="link.to"
          >
            <i :class="link.icon"></i> {{ link.name }}
            <span class="counter" :class="link.done ? 'done' : ''">{{
              link.value
            }}</span>
          </a>
        </div>
      </div>
    </li>
    <!-- Divider -->

    <!-- Divider -->
    <hr class="sidebar-divider" />

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a
        class="nav-link collapsed"
        href="#"
        data-toggle="collapse"
        data-target="#Previews"
        aria-expanded="true"
        aria-controls="Previews"
      >
        <i class="fas fa-fw fa-street-view"></i>
        <span>Previews</span>
        <span class="counter">15</span>
      </a>
      <div
        id="Previews"
        class="collapse"
        aria-labelledby="headingPages"
        data-parent="#accordionSidebar"
      >
        <div class="bg-white collapse-inner">
          <a
            v-for="(link, idx) in PreviewsLinks"
            :key="idx"
            :href="link.to"
            :class="link.done ? 'done' : ''"
            class="collapse-item"
          >
            <i class="link.icon"></i> {{ link.name }}
            <span class="counter">{{ link.value }}</span>
          </a>
        </div>
      </div>
    </li>
    <!--
        <div class="text-center d-none d-md-inline">
            <button class="btn btn-danger" id="sidebarToggle"></button>
        </div>  -->
  </ul>
  <!-- End of Sidebar -->
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
