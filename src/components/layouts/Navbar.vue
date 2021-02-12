<template>
  <header
    class="c-header c-header-light c-header-fixed c-header-with-subheader"
    light=""
  >
    <button type="button" class="ml-3 d-lg-none c-header-toggler">
      <span class="c-header-toggler-icon"></span>
    </button>

    <button
      type="button"
      class="ml-3 d-md-down-none c-header-toggler"
      @click="sidebar('hide')"
    >
      <span class="c-header-toggler-icon"></span>
    </button>

    <router-link
      to="/"
      class="c-header-brand mx-auto d-lg-none router-link-active"
      target="_self"
    >
      <img src="../../assets/img/khedma.png" width="120px" />
    </router-link>

    <ul class="c-header-nav mr-4 ml-auto">
      <CDropdown nav togglerText="User" placement="bottom-end" class="p-0">
        <CDropdownItem class="text-center"
          ><i class="fas fa-user-alt c-icon mr-1"></i> Profile</CDropdownItem
        >
        <CDropdownItem class="text-center"
          ><i class="fas fa-cog c-icon mr-1"></i> Sittings</CDropdownItem
        >
        <CDropdownItem @click.prevent="logOut" class="text-center"
          ><i class="fas fa-sign-out-alt c-icon mr-1"></i>Logout</CDropdownItem
        >
      </CDropdown>
    </ul>
  </header>
</template>
<script>
import { mapGetters, mapActions } from "vuex";
export default {
  name: "Navbar",
  data() {
    return {
      side: "show"
    };
  },
  computed: {
    ...mapGetters({
      user: "auth/user"
    })
  },
  methods: {
    sidebar() {
      this.side = "hide";
    },
    ...mapActions({
      logOut: "auth/logOut"
    })
  }
};
</script>
<style lang="scss">
.dropdown-item {
  display: block;
}
.c-header-nav .dropdown-item {
  min-width: auto;
}
header {
  .btn:focus,
  .btn.focus {
    box-shadow: none;
  }
}
</style>
