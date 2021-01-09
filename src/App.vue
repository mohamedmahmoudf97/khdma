<template>
  <div id="app">
    <!-- <router-view /> -->
    <div v-if="isLogin">
      <Dashboard user="userName" />
      <!--  this component will show after login -->
    </div>
    <div v-else>
      <Login />
      <!--  this component will show before login -->
    </div>
  </div>
</template>

<script>
import Dashboard from "@/components/Dashboard/Dashboard.vue";
import Login from "@/components/Login/Login.vue";

export default {
  data() {
    return {
      isLogin: true
    };
  },
  components: {
    Dashboard,
    Login
  }
};
</script>

<style lang="scss">
* {
  // simple reset for all tags
  margin: 0;
  padding: 0;
  color: inherit;
  box-sizing: border-box;
  list-style: none;
  outline: none;
}
</style>
