<template>
  <div class="card border-bottom-danger mr-2 ml-2 shadow-lg">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold">
        <i class="fas fa-user-plus"></i>
        Add New User
      </h5>
    </div>

    <div class="card-body">
      <p class="text-success text-center font-weight-bold" v-if="success">
        User Added Successfully
      </p>

      <form action="#" class="row" id="login" @submit.prevent="submit">
        <div class="col-md-6">
          <div class="form-group">
            <label for="fmane" class="font-weight-bold">Frist Name</label>
            <input
              class="form-control"
              id="fmane"
              type="text"
              placeholder="Frist Name"
              v-model="form.fname"
              :class="allerros.fname ? 'border-danger' : ''"
            />
            <p class="text-danger m-0 font-weight-bold" v-if="allerros.fname">
              {{ allerros.fname[0] }}
            </p>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="lmane" class="font-weight-bold">Last Name</label>
            <input
              class="form-control"
              id="lmane"
              type="text"
              placeholder="Last Name"
              v-model="form.lname"
              :class="allerros.lname ? 'border-danger' : ''"
            />
            <p class="text-danger m-0 font-weight-bold" v-if="allerros.lname">
              {{ allerros.lname[0] }}
            </p>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="email" class="font-weight-bold">Email</label>
            <input
              class="form-control"
              id="email"
              type="email"
              placeholder="Email"
              v-model="form.email"
              :class="allerros.email ? 'border-danger' : ''"
            />
            <p class="text-danger m-0 font-weight-bold" v-if="allerros.email">
              {{ allerros.email[0] }}
            </p>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="role" class="font-weight-bold">Role</label>
            <select
              class="form-control"
              id="role"
              v-model="form.role_id"
              :class="allerros.role_id ? 'border-danger' : ''"
            >
              <option value="">Choose Role</option>
              <option v-for="role in roles" :key="role.id" :value="role.id">{{
                role.name
              }}</option>
            </select>
            <p class="text-danger m-0 font-weight-bold" v-if="allerros.role_id">
              {{ allerros.role_id[0] }}
            </p>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="password" class="font-weight-bold">Password</label>
            <input
              class="form-control"
              id="password"
              type="password"
              placeholder="Password"
              v-model="form.password"
              :class="allerros.password ? 'border-danger' : ''"
            />
            <p
              class="text-danger m-0 font-weight-bold"
              v-if="allerros.password"
            >
              {{ allerros.password[0] }}
            </p>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="password_confirmation" class="font-weight-bold"
              >Password Confirmation</label
            >
            <input
              class="form-control"
              id="password_confirmation"
              type="password"
              placeholder="Password Confirmation"
              v-model="form.password_confirmation"
              :class="allerros.password_confirmation ? 'border-danger' : ''"
            />
            <p
              class="text-danger m-0 font-weight-bold"
              v-if="allerros.password_confirmation"
            >
              {{ allerros.password_confirmation[0] }}
            </p>
          </div>
        </div>

        <div class="col-12 align-content-center">
          <button class="btn btn-danger d-block m-auto font-weight-bold">
            <i class="fas fa-user-plus"></i> Add User
          </button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
import axios from "axios";
import store from "@/store";

export default {
  name: "AddUser",
  data() {
    return {
      allerros: [
        { fname: [] },
        { lname: [] },
        { role_id: [] },
        { email: [] },
        { password: [] },
        { password_confirmation: [] }
      ],
      success: false,
      roles: [],
      form: {
        fname: "",
        lname: "",
        role_id: "",
        email: "",
        password: "",
        password_confirmation: ""
      }
    };
  },
  async mounted() {
    await axios.post("get-projects").then(response => {
      this.roles = response.data.projects;
    });
  },
  methods: {
    async submit() {
      await axios
        .post("add-user", this.form)
        .then(() => {
          store.dispatch("auth/attempt", localStorage.getItem("access_token"));
          this.allerros = [];
          this.success = true;
          this.form.fname = "";
          this.form.lname = "";
          this.form.role_id = "";
          this.form.email = "";
          this.form.password = "";
          this.form.password_confirmation = "";
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

<style scoped></style>
