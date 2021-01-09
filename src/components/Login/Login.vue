<template>
  <div class="container-login">
    <LoginForm />
  </div>
</template>
<script>
import LoginForm from "./form"; // incloud Login Form component

export default {
  name: "Login",
  components: { LoginForm }
};
</script>
<style lang="scss" scoped>
.container-login {
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background: #a62440;
}
</style>
