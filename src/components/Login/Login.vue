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
                      <p
                        class="text-danger m-0 font-weight-bold"
                        v-if="allerros.error"
                      >
                        {{ allerros.error }}
                      </p>
                    </div>

                    <form
                      class="user"
                      action="#"
                      id="login"
                      @submit.prevent="submit"
                    >
                      <div class="form-group">
                        <input
                          v-model="form.email"
                          type="text"
                          name="email"
                          id="email"
                          placeholder="Enter Email Address..."
                          class="form-control"
                          :class="allerros.email ? 'border-danger' : ''"
                        />
                        <span
                          class="text-danger m-0 font-weight-bold"
                          v-if="allerros.email"
                        >
                          {{ allerros.email[0] }}
                        </span>
                      </div>

                      <div class="form-group">
                        <input
                          type="password"
                          v-model="form.password"
                          name="password"
                          class="form-control"
                          id="exampleInputPassword"
                          placeholder="Password"
                          :class="allerros.password ? 'border-danger' : ''"
                        />
                        <span
                          class="text-danger m-0 font-weight-bold"
                          v-if="allerros.password"
                        >
                          {{ allerros.password[0] }}
                        </span>
                      </div>

                      <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input
                            type="checkbox"
                            class="custom-control-input"
                            id="customCheck"
                          />
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
import { mapActions } from "vuex";
import axios from "axios";
export default {
  name: "Login",
  data() {
    return {
      allerros: [{ email: [] }, { password: [] }, { error: [] }],
      form: {
        email: "",
        password: ""
      }
    };
  },
  methods: {
    ...mapActions({
      login: "auth/login"
    }),
    submit() {
      axios
        .post("login-user", this.form)
        .then(() => {
          this.login(this.form);
          // this.$router.replace({ name: "Dashboard" });
        })
        .catch(error => {
          if (error.response.status == 422) {
            this.allerros = error.response.data.errors;
          } else {
            this.allerros = error.response.data;
          }
        });
    }
  }
};
</script>
<style lang="scss" scoped></style>
