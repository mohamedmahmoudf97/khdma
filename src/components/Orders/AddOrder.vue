<template>
  <div class="card border-bottom-danger mr-2 ml-2 shadow-lg">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold">
        <i class="fas fa-plus-circle"></i> Add New Order
      </h5>
    </div>

    <div class="card-body">
      <form class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label class="font-weight-bold" for="project">Projects</label>
            <select
              class="form-control"
              id="project"
              v-model="form.project"
              @change="getUnits($event)"
            >
              <option value="">Choose Project</option>

              <option
                v-for="project in projects"
                :key="project.id"
                :value="project.id"
              >
                {{ project.name }}
              </option>
            </select>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label class="font-weight-bold" for="unit">Units</label>
            <select class="form-control" id="unit" v-model="form.unit">
              <option value="">Choose Unit</option>

              <option v-for="unit in units" :key="unit.id" :value="unit.id">
                {{ unit.name }}
              </option>
            </select>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label class="font-weight-bold" for="kind">Order Kind</label>
            <select class="form-control" id="kind" v-model="form.kind">
              <option value="">Choose Kind</option>
              <option v-for="kind in kinds" :key="kind.id" :value="kind.id">
                {{ kind.name }}
              </option>
            </select>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label class="font-weight-bold" for="service">Select Service</label>
            <select
              class="form-control"
              id="service"
              v-model="form.maintenance"
            >
              <option value="">Choose Service</option>
              <option
                v-for="service in services"
                :key="service.id"
                :value="service.id"
              >
                {{ service.name }}
              </option>
            </select>
          </div>
        </div>

        <div class="col-md-4">
          <div class="form-group">
            <label class="font-weight-bold" for="targer_date"
              >Target Date</label
            >
            <input class="form-control" type="date" id="targer_date" />
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
              v-model="form.timeFrom"
            />
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <label class="font-weight-bold" for="target_time_to">Time To</label>
            <input class="form-control" type="time" id="target_time_to" />
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
            ></textarea>
          </div>
        </div>

        <div class="col-12 align-content-center">
          <button class="btn btn-danger d-block m-auto font-weight-bold">
            <i class="fas fa-plus-circle"></i> Add Order
          </button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
import axios from "axios";
export default {
  name: "AddOrder",
  data() {
    return {
      allerros: [],
      success: false,
      projects: [],
      units: [],
      services: [],
      kinds: [
        { id: 1, name: "Maintenance" },
        { id: 2, name: "Previews" }
      ],
      maintenances: [
        { id: 1, name: "Plumper" },
        { id: 2, name: "Electrician" },
        { id: 3, name: "Carpenter" },
        { id: 4, name: "Painting" },
        { id: 5, name: "Satellite" },
        { id: 6, name: "Aluminum" },
        { id: 7, name: "Air Conditioning" },
        { id: 8, name: "Other" }
      ],
      Previews: [
        { id: 1, name: "Car Wash" },
        { id: 2, name: "News Paper" },
        { id: 3, name: "House Keeping" },
        { id: 4, name: "Planting & gardens" },
        { id: 5, name: "Carry Remnants" },
        { id: 6, name: "Others" }
      ],
      form: {
        project: "",
        unit: "",
        maintenance: "",
        targetDate: "",
        timeFrom: "",
        timeTo: "",
        customerDesc: "",
        kind: ""
      }
    };
  },
  async mounted() {
    // get projects
    await axios.post("get-projects").then(response => {
      this.projects = response.data.projects;
    });
    //  get services
    await axios.post("get-services").then(response => {
      this.services = response.data.services;
    });
  },
  methods: {
    async getUnits(event) {
      const projectId = { project_id: event.target.value };
      if (projectId.project_id != "") {
        await axios.post("get-units", projectId).then(response => {
          this.units = response.data.units;
        });
      } else {
        this.units = [];
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
