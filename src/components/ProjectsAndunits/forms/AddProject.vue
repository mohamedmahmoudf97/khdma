<template>
  <div id="addProject">
    <h2>Add Project</h2>

    <form>
      <div class="mb-3">
        <label for="addProject" class="form-label">Add Project</label>
        <input
          required
          class="form-control"
          id="addProject"
          placeholder="project name..."
        />
      </div>

      <button type="submit" class="btn btn-primary col-12">Add</button>
    </form>
  </div>
</template>

<script>
export default {
  name: "AddProject"
};
</script>
