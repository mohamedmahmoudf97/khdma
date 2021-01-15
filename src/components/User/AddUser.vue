<template>
  <div class="card border-bottom-danger mr-2 ml-2">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold">
        <i class="fas fa-user-plus"></i> Add New User
      </h5>
    </div>

    <div class="card-body">
      <p
        class="text-danger m-0 text-center font-weight-bold"
        v-for="err in allerros"
        :key="err.index"
      >
        {{ err[0] }}
      </p>

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
              v-model="form.fname"
              placeholder="Frist Name"
            />
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="lmane" class="font-weight-bold">Last Name</label>
            <input
              class="form-control"
              id="lmane"
              type="text"
              v-model="form.lname"
              placeholder="Last Name"
            />
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="email" class="font-weight-bold">Email</label>
            <input
              class="form-control"
              id="email"
              type="email"
              v-model="form.email"
              placeholder="Email"
            />
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="role" class="font-weight-bold">Role</label>
            <select class="form-control" id="role" v-model="form.role_id">
              <option value="">Choose Role</option>
              <option v-for="role in roles" :key="role.id" :value="role.id">{{
                role.name
              }}</option>
            </select>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="password" class="font-weight-bold">Password</label>
            <input
              class="form-control"
              id="password"
              type="password"
              v-model="form.password"
              placeholder="Password"
            />
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
              v-model="form.password_confirmation"
              placeholder="Password Confirmation"
            />
          </div>
        </div>

        <button class="btn btn-danger">
          <i class="fas fa-user-plus"></i> Add User
        </button>
      </form>
    </div>
  </div>
</template>
<script>
import axios from "axios";
export default {
  name: "AddUser",
  data() {
    return {
      allerros: [],
      success: false,
      roles: [{ id: 1, name: "Admin" }],
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
  methods: {
    submit() {
      axios
        .post("add-user", this.form)
        .then(() => {
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
          this.allerros = error.response.data.errors;
          this.success = false;
          console.log(this.allerros);
        });
    }
  }
};
</script>

<style scoped></style>
