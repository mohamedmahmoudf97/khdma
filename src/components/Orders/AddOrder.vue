<template>
  <div class="card border-bottom-danger mr-2 ml-2">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold">
        <i class="fas fa-plus-circle"></i> Add New Order
      </h5>
    </div>

    <div class="card-body">
      <div class="add-header-btns d-flex pt-2 pb-2">
        <div
          @click="switchOrder('Add_Maintenance')"
          class="bg-danger text-white text-center font-weight-bold py-2 w-50 h6 m-0"
        >
          <i class="fas fa-fw fa-tools"></i> Add Maintenance
        </div>

        <div
          @click="switchOrder('Add_Previews')"
          class="bg-dark text-white text-center font-weight-bold py-2 w-50 h6 m-0"
        >
          <i class="fas fa-fw fa-street-view"></i> Add Previews
        </div>
      </div>

      <div class="pt-2">
        <div :class="Add_Maintenance ? 'd-block' : 'd-none'">
          <h5 class="font-weight-bold text-center">
            <i class="fas fa-fw fa-tools"></i> Add Maintenance
          </h5>
        </div>

        <div :class="Add_Maintenance ? 'd-none' : 'd-block'">
          <h5 class="font-weight-bold text-center">
            <i class="fas fa-fw fa-street-view"></i> Add Previews
          </h5>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "AddOrder",
  data() {
    return {
      Add_Maintenance: true,
      form: {
        project: "",
        unit: "",
        desc: ""
      }
    };
  },
  methods: {
    switchOrder(status) {
      if (status === "Add_Maintenance") {
        this.Add_Maintenance = true;
      } else {
        this.Add_Maintenance = false;
      }
    }
  }
};
</script>

<style scoped>
.add-header-btns div {
  cursor: pointer;
}
</style>
