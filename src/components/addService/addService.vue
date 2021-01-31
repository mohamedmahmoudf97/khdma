<template>
  <div id="AddService" class="card-body card mx-3">
    <h2>Add Service</h2>

    <form>
      <div class="mb-3">
        <label for="AddService" class="form-label">Add Service</label>
        <input
          required
          class="form-control col-6 "
          id="AddService"
          placeholder="Service name..."
        />
      </div>

      <button type="submit" class="btn col-6 red">Add</button>
    </form>
  </div>
</template>

<script>
export default {
  name: "AddService"
};
</script>

<style lang="scss" scoped>
.red {
  background: #b11f3f;
  color: #eee;
}
</style>
