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
    <li class="nav-item">
      <router-link to="/" class="nav-link">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </router-link>
    </li>

    <hr class="sidebar-divider" />

    <li class="nav-item">
      <router-link class="nav-link" to="AddOrder">
        <i class="fas fa-plus-circle fa-sm"></i> Add Order
      </router-link>
    </li>

    <hr class="sidebar-divider" />

    <li class="nav-item">
      <router-link class="nav-link" to="AddUser">
        <i class="fas fa-user-plus"></i> Add User
      </router-link>
    </li>

    <hr class="sidebar-divider" />

    <li class="nav-item">
      <router-link class="nav-link" to="AddService">
        <i class="fas fa-concierge-bell"></i> Add Service
      </router-link>
    </li>

    <hr class="sidebar-divider" />

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
          <a class="collapse-item" href="datatables.html"
            ><i class="fas fa-network-wired"></i> All
            <span class="counter">15</span></a
          >
          <a class="collapse-item" href="datatables.html"
            ><i class="fas fa-faucet"></i> Plumber
            <span class="counter">10</span></a
          >
          <a class="collapse-item" href="datatables.html"
            ><i class="fas fa-plug"></i> Electrician
            <span class="counter done">0</span></a
          >
          <a class="collapse-item" href="datatables.html"
            ><i class="fas fa-hammer"></i> Carpenter
            <span class="counter">1</span></a
          >
          <a class="collapse-item" href="datatables.html"
            ><i class="fas fa-paint-roller"></i> Painting
            <span class="counter done">0</span></a
          >
          <a class="collapse-item" href="datatables.html"
            ><i class="fas fa-satellite-dish"></i> Satellite
            <span class="counter done">0</span></a
          >
          <a class="collapse-item" href="datatables.html"
            ><i class="fas fa-screwdriver"></i> Aluminum
            <span class="counter">1</span></a
          >

          <a class="collapse-item" href="datatables.html"
            ><i class="fas fa-fan"></i> Air Conditioning
            <span class="counter">1</span></a
          >
          <a class="collapse-item" href="datatables.html"
            ><i class="fab fa-ethereum"></i> Others
            <span class="counter">2</span></a
          >
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
          <a class="collapse-item" href=""
            ><i class="fas fa-network-wired"></i> All
            <span class="counter">15</span></a
          >
          <a class="collapse-item" href=""
            ><i class="fas fa-car-alt"></i> Car Wash
            <span class="counter">10</span></a
          >
          <a class="collapse-item" href=""
            ><i class="far fa-newspaper"></i> Newspaper
            <span class="counter done">0</span></a
          >
          <a class="collapse-item" href=""
            ><i class="fas fa-house-user"></i> Housekeeping
            <span class="counter">1</span></a
          >
          <a class="collapse-item" href=""
            ><i class="fab fa-pagelines"></i> Planting & gardens<span
              class="counter"
              >3</span
            ></a
          >
          <a class="collapse-item" href=""
            ><i class="fas fa-people-carry"></i> Carry Remnants
            <span class="counter done">0</span></a
          >
          <a class="collapse-item" href=""
            ><i class="fab fa-ethereum"></i> Others
            <span class="counter">2</span></a
          >
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
  name: "Sidebar"
};
</script>

<style scoped>
.nav-item .router-link-exact-active {
  background: #b11f3f;
  color: #fff !important;
}
</style>
