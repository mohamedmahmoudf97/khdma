<template>
  <div id="addUnits">
    <h2>Add Project</h2>

    <form>
      <div class="mb-3">
        <label for="unitName" class="form-label">Unit Name</label>
        <input
          required
          id="unitName"
          name="unitName"
          class="form-control"
          placeholder="Unit name..."
          aria-describedby="unitName"
        />
      </div>

      <select
        required
        name="unitVal"
        class="form-select d-block mb-3 col-12 p-2"
        aria-label="Default select example"
      >
        <option v-for="unit in allUnits" :value="unit.value" :key="unit.value">
          {{ unit.name }}
        </option>
      </select>

      <button type="submit" class="btn btn-primary col-12">Add</button>
    </form>
  </div>
</template>

<script>
export default {
  name: "AddUnits",
  data() {
    return {
      allUnits: [
        { name: "Select place", value: 0 },
        { name: "place1", value: 1 },
        { name: "place2", value: 2 },
        { name: "place3", value: 3 },
        { name: "place4", value: 4 },
        { name: "place5", value: 5 }
      ]
    };
  }
};
</script>
