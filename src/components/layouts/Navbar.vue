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

    <a
      href="#/"
      class="c-header-brand mx-auto d-lg-none router-link-active"
      target="_self"
    >
    </a>
    <ul class="c-header-nav d-md-down-none mr-auto">
      <li class="c-header-nav-item px-3">
        <a
          href="#/dashboard"
          aria-current="page"
          class="c-header-nav-link router-link-exact-active router-link-active"
          target="_self"
        >
          Dashboard
        </a>
      </li>
      <li class="c-header-nav-item px-3">
        <a href="#/users" class="c-header-nav-link" target="_self"> Users </a>
      </li>
      <li class="c-header-nav-item px-3">
        <a href="#" target="_self" class="c-header-nav-link"> Settings </a>
      </li>
    </ul>
    <ul class="c-header-nav mr-4">
      <li data-v-7983366c="" class="c-header-nav-items dropdown nav-item">
        <a
          href="#"
          @click.prevent="logOut"
          target="_self"
          class="c-header-nav-link"
        >
          <i class="fas fa-sign-out-alt mr-1" style="line-height: 1.5"></i>
          Logout
        </a>
      </li>
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
      authenticated: "auth/authenticated",
      user: "auth/user"
    })
  },
  methods: {
    sidebar() {
      this.side = "hide";
    },
    ...mapActions({
      logOutAction: "auth/logOut"
    }),

    logOut() {
      this.logOutAction().then(() => {
        // this.$router.replace({
        //   // name: ""
        // })
      });
    }
  }
};
</script>
