<template>
  <div class="container-login">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-5">
              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>

                <div class="col-lg-6">
                  <div class="pt-5 pb-5">
                    <div class="text-center">
                      <h2 class="text-dark mb-4">Login</h2>
                    </div>
                    <form class="user" action="#" @submit.prevent="login">
                      <div class="form-group">
                        <input
                          v-model="form.email"
                          type="text"
                          name="email"
                          id="email"
                          placeholder="Enter Email Address..."
                          class="form-control"
                        />
                      </div>

                      <div class="form-group">
                        <input
                          type="password"
                          v-model="form.password"
                          name="password"
                          class="form-control"
                          id="exampleInputPassword"
                          placeholder="Password"
                        />
                      </div>

                      <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input
                            type="checkbox"
                            class="custom-control-input"
                            id="customCheck"
                          />
                          <label class="custom-control-label" for="customCheck"
                            >Remember Me</label
                          >
                        </div>
                      </div>

                      <button class="btn btn-danger btn-user btn-block">
                        Login
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";

export default {
  name: "Login",
  data() {
    return {
      form: {
        email: "",
        password: ""
      }
    };
  },
  methods: {
    async login() {
      const response = axios
        .post("http://localhost:8000/api/login-user", this.form)
        .then()
        .catch()
        .finally();

      console.log(response);
    }
  }
};
</script>
<style lang="scss" scoped></style>
