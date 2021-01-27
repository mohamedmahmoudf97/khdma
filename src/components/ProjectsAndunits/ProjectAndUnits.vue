<template>
  <div class="card border-bottom-danger mr-2 ml-2 shadow-lg">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold">
        <i class="fas fa-house-user"></i> Projects And Units
      </h5>
    </div>

    <div class="card-body">
      <div class="d-flex add-header mb-3">
        <div
          class="text-center pt-2 pb-2 w-50 text-white text-center"
          :class="addProject ? 'bg-danger' : 'bg-dark'"
          @click="toggleForms('project')"
        >
          <h5 class="m-0 font-weight-bold">Add Project</h5>
        </div>

        <div
          class="text-center pt-2 pb-2 w-50 text-white text-center"
          :class="addProject ? 'bg-dark' : 'bg-danger'"
          @click="toggleForms('unit')"
        >
          <h5 class="m-0 font-weight-bold">Add Unit</h5>
        </div>
      </div>

      <AddProject v-if="addProject == true" />
      <AddUnits v-if="addProject == false" />

      <hr />
      <h4 class="text-center font-weight-bold">Projets With Units Data</h4>

      <table class="table table-bordered table-hover ml-0 mr-0">
        <thead class="text-center">
          <tr>
            <th>ID</th>
            <th>Project Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr class="text-center" v-for="project in projects" :key="project.id">
            <td>{{ project.id }}</td>
            <td>{{ project.name }}</td>
            <td>
              <button
                @click="getUnits(project.id)"
                title="View Units"
                class="btn-sm btn btn-dark mr-1"
                data-toggle="modal"
                data-target="unitModel"
              >
                <i class="fas fa-eye"></i>
              </button>

              <button title="Delete Project" class="btn-sm btn btn-danger">
                <i class="fas fa-trash-alt"></i>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div
      :class="model ? 'd-block modal-open' : 'd-none'"
      class="modal bd-example-modal-lg"
      id="unitModel"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title w-100 font-weight-bold">
              Project: {{ project }}
            </h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
              @click="closeModel"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <table
              class="table table-bordered table-hover ml-0 mr-0"
              v-if="units.length > 0"
            >
              <thead class="text-center">
                <tr>
                  <th>ID</th>
                  <th>Unit name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr class="text-center" v-for="unit in units" :key="unit.id">
                  <td>{{ unit.id }}</td>
                  <td>{{ unit.name }}</td>
                  <td>
                    <button
                      class="btn btn-sm btn-primary mr-1"
                      title="Edit Unit"
                    >
                      <i class="fas fa-pencil-alt"></i>
                    </button>

                    <button title="Delete Unit" class="btn-sm btn btn-danger">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>

            <p
              v-if="units.length <= 0"
              class="text-center font-weight-bold text-dark"
            >
              Sorry Project <span class="text-danger"> {{ project }}</span> not
              has any units !
            </p>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-dark"
              @click="closeModel"
              data-dismiss="modal"
            >
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import AddUnits from "./forms/AddUnits";
import AddProject from "./forms/AddProject";
import axios from "axios";
import store from "@/store";

export default {
  name: "ProjectAndUnits",
  components: {
    AddProject,
    AddUnits
  },
  data() {
    return {
      addProject: true,
      projects: [],
      units: [],
      project: "",
      model: false
    };
  },
  async mounted() {
    // get projects
    await axios.post("get-projects").then(response => {
      this.projects = response.data.projects;
    });
  },
  methods: {
    toggleForms(data) {
      store.dispatch("auth/attempt", localStorage.getItem("access_token"));
      if (data == "project") {
        this.addProject = true;
      } else if (data == "unit") {
        this.addProject = false;
      }
    },
    async getUnits(e) {
      store.dispatch("auth/attempt", localStorage.getItem("access_token"));
      const projectId = { project_id: e };
      if (projectId.project_id != "") {
        await axios.post("get-units", projectId).then(response => {
          this.units = response.data.units;
          this.model = true;
          this.project = response.data.project.name;
        });
      } else {
        this.units = [];
      }
    },
    closeModel() {
      this.model = false;
    }
  }
};
</script>

<style scoped>
.add-header div {
  cursor: pointer;
}
table tr {
  cursor: default;
}
.table-hover tbody tr:hover td {
  color: #222;
}
</style>
