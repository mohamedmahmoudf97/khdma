<template>
  <div class="card-body">
    <p v-if="success" class="text-center text-success font-weight-bold">
      Order has been added successfully
    </p>

    <form class="row" @submit.prevent="addOrder">
      <div class="col-md-4">
        <div class="form-group">
          <label class="font-weight-bold" for="project">Projects</label>
          <select
            class="form-control"
            id="project"
            v-model="form.project_id"
            @change="getUnits($event)"
            :class="allerros.project_id ? 'border-danger' : ''"
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

          <span class="text-danger" v-if="allerros.project_id">{{
            allerros.project_id[0]
          }}</span>
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <label class="font-weight-bold" for="unit">Units</label>
          <select
            class="form-control"
            id="unit"
            v-model="form.unit_id"
            :class="allerros.unit_id ? 'border-danger' : ''"
          >
            <option value="">Choose Unit</option>

            <option v-for="unit in units" :key="unit.id" :value="unit.id">
              {{ unit.name }}
            </option>
          </select>
          <span class="text-danger" v-if="allerros.unit_id">{{
            allerros.unit_id[0]
          }}</span>
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <label class="font-weight-bold" for="kind">Order Type</label>
          <select
            class="form-control"
            id="kind"
            v-model="form.type"
            :class="allerros.type ? 'border-danger' : ''"
          >
            <option value="">Choose Type</option>
            <option v-for="kind in kinds" :key="kind.id" :value="kind.name">
              {{ kind.name }}
            </option>
          </select>
          <span class="text-danger" v-if="allerros.type">{{
            allerros.type[0]
          }}</span>
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <label class="font-weight-bold" for="service">Select Service</label>
          <select
            class="form-control"
            id="service"
            v-model="form.service_id"
            :class="allerros.service_id ? 'border-danger' : ''"
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
          <span class="text-danger" v-if="allerros.service_id">{{
            allerros.service_id[0]
          }}</span>
        </div>
      </div>

      <div class="col-md-4">
        <div class="form-group">
          <label class="font-weight-bold" for="targer_date">Target Date</label>
          <input
            v-model="form.target_date"
            class="form-control"
            type="date"
            id="targer_date"
            :class="allerros.target_date ? 'border-danger' : ''"
          />
          <span class="text-danger" v-if="allerros.target_date">{{
            allerros.target_date[0]
          }}</span>
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group">
          <label class="font-weight-bold">Time From</label>
          <input
            class="form-control"
            type="time"
            v-model="form.time_from"
            :class="allerros.time_from ? 'border-danger' : ''"
          />
          <span class="text-danger" v-if="allerros.time_from">{{
            allerros.time_from[0]
          }}</span>
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group">
          <label class="font-weight-bold" for="target_time_to">Time To</label>
          <input
            v-model="form.time_to"
            class="form-control"
            type="time"
            id="target_time_to"
            :class="allerros.time_to ? 'border-danger' : ''"
          />
          <span class="text-danger" v-if="allerros.time_to">{{
            allerros.time_to[0]
          }}</span>
        </div>
      </div>

      <div class="col-md-12">
        <div class="form-group">
          <label class="font-weight-bold">Description</label>
          <textarea
            v-model="form.description"
            placeholder="Description.."
            class="form-control"
            :class="allerros.description ? 'border-danger' : ''"
          ></textarea>
          <span class="text-danger" v-if="allerros.description">{{
            allerros.description[0]
          }}</span>
        </div>
      </div>

      <div class="col-12 align-content-center">
        <button class="btn btn-danger d-block m-auto font-weight-bold">
          <i class="fas fa-plus-circle"></i> Add Order
        </button>
      </div>
    </form>
  </div>
</template>
<script>
import axios from "axios";
import store from "@/store";

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
        { id: 1, name: "maintenance" },
        { id: 2, name: "preview" },
        { id: 3, name: "other" }
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
        project_id: "",
        unit_id: "",
        service_id: "",
        target_date: "",
        time_from: "",
        time_to: "",
        description: "",
        type: ""
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
      store.dispatch("auth/attempt", localStorage.getItem("access_token"));
      const projectId = { project_id: event.target.value };
      if (projectId.project_id != "") {
        await axios.post("get-units", projectId).then(response => {
          this.units = response.data.units;
        });
      } else {
        this.units = [];
      }
    },
    async addOrder() {
      store.dispatch("auth/attempt", localStorage.getItem("access_token"));
      await axios
        .post("add-order-cs", this.form)
        .then(() => {
          this.allerros = [];
          this.success = true;
          this.form = {
            project_id: "",
            unit_id: "",
            service_id: "",
            target_date: "",
            time_from: "",
            time_to: "",
            description: "",
            kind: ""
          };
        })
        .catch(error => {
          if (error.response.status == 422) {
            this.allerros = error.response.data.errors;
          } else {
            this.allerros = [];
          }
        });
    }
  }
};
</script>

<style scoped>
.add-header-btns div {
  cursor: pointer;
}
</style>
