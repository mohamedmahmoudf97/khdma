<template>
  <nav
    class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"
  >
    <!-- Sidebar Toggle (Topbar) -->
    <button
      id="sidebarToggleTop"
      class="btn btn-link d-md-none rounded-circle mr-3"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form
      class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
    >
      <div class="input-group">
        <input
          type="text"
          class="form-control"
          placeholder="Search..."
          aria-label="Search"
          aria-describedby="basic-addon2"
        />
        <div class="input-group-append">
          <button class="btn btn-danger" type="button">
            <i class="fas fa-search fa-sm"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
      <!-- Nav Item - Search Dropdown (Visible Only XS) -->
      <li class="nav-item dropdown no-arrow d-sm-none">
        <a
          class="nav-link dropdown-toggle"
          href="#"
          id="searchDropdown"
          role="button"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
        >
          <i class="fas fa-search fa-fw"></i>
        </a>
        <!-- Dropdown - Messages -->
        <div
          class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
          aria-labelledby="searchDropdown"
        >
          <form class="form-inline mr-auto w-100 navbar-search">
            <div class="input-group">
              <input
                type="text"
                class="form-control bg-light border-0 small"
                placeholder="Search.."
                aria-label="Search"
                aria-describedby="basic-addon2"
              />
              <div class="input-group-append">
                <button class="btn btn-danger" type="submit">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Nav Item - Alerts -->
      <li class="nav-item dropdown no-arrow mx-1">
        <a
          class="nav-link dropdown-toggle"
          href="#"
          id="alertsDropdown"
          role="button"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
        >
          <i class="fas fa-bell fa-fw"></i>
          <!-- Counter - Alerts -->
          <span class="badge badge-danger badge-counter">10+</span>
        </a>
        <!-- Dropdown - Alerts -->
        <div
          class="dropdown-list dropdown-menu dropdown-menu-right shadow-lg animated--grow-in"
          aria-labelledby="alertsDropdown"
        >
          <h6 class="dropdown-header">
            Alerts Center
          </h6>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
              <div class="icon-circle">
                <i class="fas fa-faucet"></i>
                Plumber
              </div>
            </div>

            <div>
              <div class="small text-gray-700">06/01/2021 5:30 PM</div>
              <p class="m-0 font-weight-bold">Project: PH.4 Unit: 130</p>
              <p class="m-0 font-weight-bold">Order has been completed</p>
            </div>
          </a>
          <a class="dropdown-item d-flex align-items-center read" href="#">
            <div class="mr-3">
              <div class="icon-circle">
                <i class="fas fa-donate"></i>
              </div>
            </div>
            <div>
              <div class="small text-gray-700">06/01/2021 5:30 PM</div>
              <p class="m-0 font-weight-bold">Project: PH.4 Unit: 130</p>
              <p class="m-0 font-weight-bold">Order has been cancelled</p>
            </div>
          </a>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
              <div class="icon-circle">
                <i class="fas fa-exclamation-triangle"></i>
              </div>
            </div>
            <div>
              <div class="small text-gray-700">06/01/2021 5:30 PM</div>
              <p class="m-0 font-weight-bold">Project: PH.4 Unit: 130</p>
              <p class="m-0 font-weight-bold">Order has been delayed</p>
            </div>
          </a>
        </div>
      </li>

      <div class="topbar-divider d-none d-sm-block"></div>

      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown">
        <a
          class="nav-link"
          href="#"
          id="userDropdown"
          role="button"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
        >
          <span class="mr-2 d-none d-lg-inline text-gray-600 small"
            >User name</span
          >
        </a>
        <!-- Dropdown - User Information -->
        <div
          class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
          aria-labelledby="userDropdown"
        >
          <a class="dropdown-item" href="login.html">
            <i class="fas fa-power-off  fa-fw mr-2 text-gray-700"></i>
            Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>
</template>
<script>
export default {
  name: "Navbar"
};
</script>
