<template>
  <div class="container-fluid">
    <!-- 404 Error Text -->
    <div class="text-center">
      <div class="error mx-auto" data-text="404">404</div>
      <p class="lead text-gray-800 mb-5">Page Not Found</p>
      <router-link to="/">
        <i class="fas fa-arrow-left"></i>
        Back to dashboard
      </router-link>
    </div>
  </div>
</template>
<script>
export default {
  name: "NotFound"
};
</script>
<style lang="scss" scoped></style>
