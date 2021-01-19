<template>
  <div id="AddService" class="card-body card mx-3">
    <h2>Add Service</h2>

    <form>
      <div class="mb-3">
        <label for="AddService" class="form-label">Add Service</label>
        <input
          required
          class="form-control"
          id="AddService"
          placeholder="Service name..."
        />
      </div>

      <button type="submit" class="btn btn-primary col-12">Add</button>
    </form>
  </div>
</template>

<script>
export default {
  name: "AddService"
};
</script>
