<template>
  <div id="addProject">
    <h2 class="text-center font-weight-bold">Add Project</h2>

    <p class="text-success text-center font-weight-bold" v-if="success">
      Project Added Successfully
    </p>

    <form @submit.prevent="addProject" class="row justify-content-center">
      <div class="col-md-6">
        <div class="form-group">
          <label class="form-label">Project Name</label>
          <input
            class="form-control"
            placeholder="project name.."
            v-model="form.name"
            :class="allerros.name ? 'border-danger' : ''"
          />
          <p class="text-danger m-0 font-weight-bold" v-if="allerros.name">
            {{ allerros.name[0] }}
          </p>
        </div>
      </div>

      <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-danger">
          <i class="fas fa-plus-circle"></i> Add Project
        </button>
      </div>
    </form>
  </div>
</template>

<script>
import axios from "axios";
import store from "@/store";
export default {
  name: "AddProject",
  data() {
    return {
      allerros: [],
      success: false,
      projects: [],
      form: {
        name: ""
      }
    };
  },
  methods: {
    async addProject() {
      await axios
        .post("add-project", this.form)
        .then(() => {
          store.dispatch("auth/attempt", localStorage.getItem("access_token"));
          this.allerros = [];
          this.success = true;
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
