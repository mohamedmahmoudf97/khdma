<template>
  <div class="card border-bottom-danger mr-2 ml-2 shadow-lg">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold">
        <i class="fas fa-plus-circle"></i> Add New Order
      </h5>
    </div>

    <div class="card-body">
      <div class="add-header-btns d-flex pt-2 pb-2">
        <div
          @click="switchOrder('Add_Maintenance')"
          class="text-white text-center font-weight-bold py-2 w-50 h6 m-0"
          :class="Add_Maintenance ? 'bg-danger' : 'bg-dark'"
        >
          <i class="fas fa-fw fa-tools"></i> Add Maintenance
        </div>

        <div
          @click="switchOrder('Add_Previews')"
          class="text-white text-center font-weight-bold py-2 w-50 h6 m-0"
          :class="Add_Maintenance ? 'bg-dark' : 'bg-danger'"
        >
          <i class="fas fa-fw fa-street-view"></i> Add Previews
        </div>
      </div>

      <div class="pt-2">
        <div :class="Add_Maintenance ? 'd-block' : 'd-none'">
          <h5 class="font-weight-bold text-center">
            <i class="fas fa-fw fa-tools"></i> Add Maintenance
          </h5>

          <form class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="font-weight-bold" for="project">Project</label>
                <select
                  @change="getUnits"
                  class="form-control selectpicker"
                  v-model="addMaintenanceForm.project"
                  id="project"
                >
                  <option value="">Choose Project..</option>
                  <option
                    v-for="project in projects"
                    :key="project.id"
                    :value="project.id"
                    >{{ project.name }}</option
                  >
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label class="font-weight-bold" for="unit">Unit</label>
                <select
                  class="form-control"
                  v-model="addMaintenanceForm.unit"
                  id="unit"
                >
                  <option value="">Choose Unit..</option>
                  <option v-for="unit in units" :key="unit.id" :value="unit.id">
                    {{ unit.name }}
                  </option>
                </select>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label class="font-weight-bold" for="maintenance"
                  >Maintenance</label
                >
                <select
                  class="form-control"
                  id="maintenance"
                  v-model="addMaintenanceForm.maintenance"
                >
                  <option value="">Choose Maintenance..</option>
                  <option
                    v-for="maintenance in maintenance"
                    :key="maintenance.id"
                    :value="maintenance.id"
                  >
                    {{ maintenance.name }}
                  </option>
                </select>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label class="font-weight-bold" for="targer_date"
                  >Target Date</label
                >
                <input
                  class="form-control"
                  type="date"
                  id="targer_date"
                  v-model="addMaintenanceForm.targetDate"
                />
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label class="font-weight-bold" for="target_time_from"
                  >Time From</label
                >
                <input
                  class="form-control"
                  type="time"
                  id="target_time_from"
                  v-model="addMaintenanceForm.timeFrom"
                />
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label class="font-weight-bold" for="target_time_to"
                  >Time To</label
                >
                <input
                  class="form-control"
                  type="time"
                  id="target_time_to"
                  v-model="addMaintenanceForm.timeTo"
                />
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <label class="font-weight-bold" for="cusmuer_desc"
                  >Custumer Description Order</label
                >
                <textarea
                  placeholder="Custumer Description Order"
                  class="form-control"
                  id="cusmuer_desc"
                  v-model="addMaintenanceForm.customerDesc"
                ></textarea>
              </div>
            </div>

            <div class="col-12 align-content-center">
              <button class="btn btn-danger d-block m-auto font-weight-bold">
                <i class="fas fa-tools"></i> Add Maintenance Order
              </button>
            </div>
          </form>
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
      allerros: [],
      success: false,
      projects: [
        { id: 1, name: "Palm" },
        { id: 2, name: "Palm Vally" }
      ],
      units: [
        { id: 1, projectId: 1, name: "1" },
        { id: 2, projectId: 1, name: "1/1" },
        { id: 3, projectId: 1, name: "1/2 G" },
        { id: 4, projectId: 1, name: "1/2 F" },
        { id: 5, projectId: 2, name: "2" },
        { id: 6, projectId: 2, name: "2/1" },
        { id: 7, projectId: 2, name: "2/2 G" },
        { id: 8, projectId: 2, name: "50/2" }
      ],
      maintenance: [
        { id: 1, name: "Plumper" },
        { id: 2, name: "Electrician" },
        { id: 3, name: "Carpenter" },
        { id: 4, name: "Painting" },
        { id: 5, name: "Satellite" },
        { id: 6, name: "Aluminum" },
        { id: 7, name: "Air Conditioning" },
        { id: 8, name: "Other" }
      ],
      addMaintenanceForm: {
        project: "",
        unit: "",
        maintenance: "",
        targetDate: "",
        timeFrom: "",
        timeTo: "",
        customerDesc: ""
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
    },
    getUnits() {
      const units = this.units;
      console.log(units);
    }
  }
};
</script>

<style scoped>
.add-header-btns div {
  cursor: pointer;
}
</style>
