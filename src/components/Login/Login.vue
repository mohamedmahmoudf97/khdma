<template>
  <div class="container login-page">
    <div class="card rounded-lg shadow p-4 login-content">
      <div class="card-body">
        <form class="text-center" @submit.prevent="submit">
          <h1>Login</h1>
          <p>Sign In to your account</p>

          <p class="text-danger" v-if="allerros.error">
            {{ allerros.error }}
          </p>

          <div role="group" class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"
                  ><i class="fas fa-user"></i
                ></span>
              </div>
              <input
                v-model="form.email"
                type="text"
                name="email"
                id="email"
                placeholder="Enter Email Address..."
                class="form-control"
                :class="allerros.email ? 'border-danger' : ''"
              />
            </div>
            <span class="text-danger" v-if="allerros.email">{{
              allerros.email[0]
            }}</span>
          </div>

          <div role="group" class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"
                  ><i class="fas fa-lock"></i
                ></span>
              </div>
              <input
                v-model="form.password"
                type="password"
                placeholder="Enter Password..."
                class="form-control"
                :class="allerros.email ? 'border-danger' : ''"
              />
            </div>
            <span class="text-danger" v-if="allerros.password">{{
              allerros.password[0]
            }}</span>
          </div>

          <button class="btn btn-danger font-weight-bold" style="width: 110px">
            <i class="fas fa-sign-in-alt mr-1"></i> Login
          </button>
        </form>
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
      allerros: [],
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
          if (error.request.status != 0) {
            if (error.response.status == 422) {
              this.allerros = error.response.data.errors;
            } else {
              this.allerros = error.response.data;
            }
          } else {
            this.allerros = { error: "check your internet connection" };
          }
        });
    }
  }
};
</script>
<style lang="scss" scoped>
.form-control.border-danger:focus {
  box-shadow: 0 0 0 0.2rem rgba(229, 83, 83, 0.25) !important;
}
.login-page {
  min-height: 100vh;
  position: relative;
  .login-content {
    position: absolute;
    top: 50%;
    left: 50%;
    min-width: 350px;
    width: 450px;
    transform: translate(-50%, -50%);
  }
}
</style>
