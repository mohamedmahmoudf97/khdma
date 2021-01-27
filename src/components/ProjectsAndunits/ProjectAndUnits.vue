<template>
  <div class="card border-bottom-danger mr-2 ml-2 shadow-lg">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold">
        <i class="fas fa-house-user"></i> Add Projects And Units
      </h5>
    </div>

    <div class="card-body">
      <AddUnits />
      <hr />
      <AddProject />
    </div>
  </div>
</template>
<script>
import AddUnits from "./forms/AddUnits";
import AddProject from "./forms/AddProject";

export default {
  name: "ProjectAndUnits",
  components: {
    AddProject,
    AddUnits
  }
};
</script>

<style scoped></style>
