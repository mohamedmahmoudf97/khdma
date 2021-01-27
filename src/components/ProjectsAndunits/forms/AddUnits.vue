<template>
  <div id="addUnits">
    <h2 class="text-center font-weight-bold">Add Unit</h2>

    <p class="text-success text-center font-weight-bold" v-if="success">
      Unit Added Successfully
    </p>

    <form class="row" @submit.prevent="addUnit">
      <div class="col-md-6">
        <div class="form-group">
          <label class="form-label">Choose Project</label>
          <select
            class="form-control"
            v-model="form.project_id"
            :class="allerros.project_id ? 'border-danger' : ''"
          >
            <option value="">Select Project..</option>
            <option
              v-for="project in projects"
              :value="project.id"
              :key="project.id"
            >
              {{ project.name }}
            </option>
          </select>

          <p
            class="text-danger m-0 font-weight-bold"
            v-if="allerros.project_id"
          >
            {{ allerros.project_id[0] }}
          </p>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label class="form-label">Unit Name</label>
          <input
            class="form-control"
            placeholder="Unit Name.."
            v-model="form.name"
            :class="allerros.name ? 'border-danger' : ''"
          />

          <p class="text-danger m-0 font-weight-bold" v-if="allerros.name">
            {{ allerros.name[0] }}
          </p>
        </div>
      </div>

      <div class="col-12 text-center">
        <button type="submit" class="btn btn-danger">
          <i class="fas fa-plus-circle"></i> Add Unit
        </button>
      </div>
    </form>
  </div>
</template>

<script>
import axios from "axios";
import store from "@/store";

export default {
  name: "AddUnits",
  data() {
    return {
      allerros: [],
      success: false,
      projects: [],
      form: {
        project_id: "",
        name: ""
      }
    };
  },
  async mounted() {
    // get projects
    await axios.post("get-projects").then(response => {
      this.projects = response.data.projects;
    });
  },
  methods: {
    async addUnit() {
      await axios
        .post("add-unit", this.form)
        .then(() => {
          store.dispatch("auth/attempt", localStorage.getItem("access_token"));
          this.allerros = [];
          this.success = true;
          this.form.project_id = "";
          this.form.name = "";
        })
        .catch(error => {
          store.dispatch("auth/attempt", localStorage.getItem("access_token"));
          if (error.response.status == 422) {
            this.allerros = error.response.data.errors;
            this.success = false;
          }
        });
    }
  }
};
</script>
