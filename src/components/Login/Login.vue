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

                    <!-- Error Message -->
                    <!-- Start Error -->
                    <div
                      v-if="iferror"
                      class="p-2 mb-3 bg-danger text-white text-center h5 rounded "
                    >
                      Some thing is warning
                    </div>
                    <!-- End Error -->

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
  props: ["iferror"],
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
      let that = this;

      const response = await axios
        .post("http://localhost:8000/api/login-user", this.form)
        .then(function() {
          // if true
          that.$emit("loginOn", true); // if login correct
        })
        .catch(error => {
          // 401 if (Email Or password) is error get from laravel
          console.log(error, "catch");

          that.$emit("error", "");
        })
        .finally(() => {
          console.log("finally");
        });

      console.log(response);
    }
  }
};
</script>
<style lang="scss" scoped></style>
