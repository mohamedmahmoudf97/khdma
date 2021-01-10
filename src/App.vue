<template>
  <div id="app">
    <div v-if="isLogin">
      <!--  this component will show after login -->
      <Dashboard user="userName" />
    </div>
    <div v-else>
      <!--  this component will show before login -->
      <Login />
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
