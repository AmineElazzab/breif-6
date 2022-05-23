<template>
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img
            src="../assets/images/undraw_remotely_2j6y.svg"
            alt="Image"
            class="img-fluid"
          />
        </div>
        <div class="col-md-10 contents">
          <div class="row justify-content-center">
            <div class="col-md-10">
              <div class="mb-5">
                <h3>Welcome to the </h3>
                <p class="mb-5">
                  Your health is our PRIORITY.
                </p>
              </div>
              <form class="infos" v-on:submit.prevent="Signup">
                <div class="form-group last mb-4">
                  <label for="inputEmail4"></label>
                  <input
                    type="text"
                    class="form-control"
                    id="inputEmail4"
                    placeholder="First Name"
                    required
                    v-model="clientData.firstname"
                  />
                </div>
                <div class="form-group last mb-4">
                  <label for="inputPassword4"></label>
                  <input
                    type="text"
                    class="form-control"
                    id="inputPassword4"
                    placeholder="Last Name"
                    required
                    v-model="clientData.lastname"
                  />
                </div>

                <div class="form-group last mb-4">
                  <label for="inputAddress2"></label>
                  <input
                    type="number"
                    class="form-control"
                    id="inputAddress2"
                    placeholder="Age?"
                    min="18"
                    required
                    v-model="clientData.age"
                  />
                </div>

                <button type="submit" class="btn btn-primary btnvalider">
                  Signup
                </button>

                <div>
                  <p class="mt-5 pb-lg-2" style="color: #000">
                    You have an account ?
                    <router-link :to="{ path: '/' }">Login</router-link>
                  </p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "Signup",
  data() {
    return {
      ref: "",
      erer: "",
      clientData: {
        reference: "",
        firstname: "",
        lastname: "",
        age: "",
      },
    };
  },
  methods: {
    async Signup() {
      // GET request using fetch with async/await
      const response = await fetch(
        "http://localhost/brief-6/back-end/api/User/addUser",
        {
          method: "POST", // or 'PUT'
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(this.clientData),
        }
      );
      const data = await response.json();
      this.ref = data.reference;
      console.log(this.ref);
      this.ref = "";
      this.clientData.firstname = "";
      this.clientData.lastname = "";
      this.clientData.age = "";
      this.$router.push("/");
      this.$swal("This is your ID. Please don't lose it. </br>" + data.reference );
      
    },
  },
};
</script>

<style scoped>
/* .containfos{
            background-color:#2475A0;
            height:100vh;
        } */
body {
  font-family: "Roboto", sans-serif;
  background-color: #f8fafb;
}

p {
  color: #b3b3b3;
  font-weight: 300;
}

h1,
h2,
h3,
h4,
h5,
h6,
.h1,
.h2,
.h3,
.h4,
.h5,
.h6 {
  font-family: "Roboto", sans-serif;
}

a {
  -webkit-transition: 0.3s all ease;
  -o-transition: 0.3s all ease;
  transition: 0.3s all ease;
}
a:hover {
  text-decoration: none !important;
}

.content {
  padding: 7rem 0;
}

h2 {
  font-size: 20px;
}

@media (max-width: 991.98px) {
  .content .bg {
    height: 500px;
  }
}

.content .contents,
.content .bg {
  width: 50%;
}
@media (max-width: 1199.98px) {
  .content .contents,
  .content .bg {
    width: 100%;
  }
}
.content .contents .form-group,
.content .bg .form-group {
  overflow: hidden;
  margin-bottom: 0;
  padding: 15px 15px;
  border-bottom: none;
  position: relative;
  background: #edf2f5;
  border-bottom: 1px solid #e6edf1;
}
.content .contents .form-group label,
.content .bg .form-group label {
  position: absolute;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
  -webkit-transition: 0.3s all ease;
  -o-transition: 0.3s all ease;
  transition: 0.3s all ease;
}
.content .contents .form-group input,
.content .bg .form-group input {
  background: transparent;
}
.content .contents .form-group.first,
.content .bg .form-group.first {
  border-top-left-radius: 7px;
  border-top-right-radius: 7px;
}
.content .contents .form-group.last,
.content .bg .form-group.last {
  border-bottom-left-radius: 7px;
  border-bottom-right-radius: 7px;
}
.content .contents .form-group label,
.content .bg .form-group label {
  font-size: 12px;
  display: block;
  margin-bottom: 0;
  color: #b3b3b3;
}
.content .contents .form-group.focus,
.content .bg .form-group.focus {
  background: #fff;
}
.content .contents .form-group.field--not-empty label,
.content .bg .form-group.field--not-empty label {
  margin-top: -20px;
}
.content .contents .form-control,
.content .bg .form-control {
  border: none;
  padding: 0;
  font-size: 20px;
  border-radius: 0;
}
.content .contents .form-control:active,
.content .contents .form-control:focus,
.content .bg .form-control:active,
.content .bg .form-control:focus {
  outline: none;
  -webkit-box-shadow: none;
  box-shadow: none;
}

.content .bg {
  background-size: cover;
  background-position: center;
}

.content a {
  color: #888;
  text-decoration: underline;
}

.content .btn {
  height: 54px;
  padding-left: 30px;
  padding-right: 30px;
}

.content .forgot-pass {
  position: relative;
  top: 2px;
  font-size: 14px;
}

.social-login a {
  text-decoration: none;
  position: relative;
  text-align: center;
  color: #fff;
  margin-bottom: 10px;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  display: inline-block;
}
.social-login a span {
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}
.social-login a:hover {
  color: #fff;
}
.social-login a.facebook {
  background: #3b5998;
}
.social-login a.facebook:hover {
  background: #344e86;
}
.social-login a.twitter {
  background: #1da1f2;
}
.social-login a.twitter:hover {
  background: #0d95e8;
}
.social-login a.google {
  background: #ea4335;
}
.social-login a.google:hover {
  background: #e82e1e;
}

.control {
  display: block;
  position: relative;
  padding-left: 30px;
  margin-bottom: 15px;
  cursor: pointer;
  font-size: 14px;
}
.control .caption {
  position: relative;
  top: 0.2rem;
  color: #888;
}

.control input {
  position: absolute;
  z-index: -1;
  opacity: 0;
}

.control__indicator {
  position: absolute;
  top: 2px;
  left: 0;
  height: 20px;
  width: 20px;
  background: #e6e6e6;
  border-radius: 4px;
}

.control--radio .control__indicator {
  border-radius: 50%;
}

.control:hover input ~ .control__indicator,
.control input:focus ~ .control__indicator {
  background: #ccc;
}

.control input:checked ~ .control__indicator {
  background: #6c63ff;
}

.control:hover input:not([disabled]):checked ~ .control__indicator,
.control input:checked:focus ~ .control__indicator {
  background: #847dff;
}

.control input:disabled ~ .control__indicator {
  background: #e6e6e6;
  opacity: 0.9;
  pointer-events: none;
}

.control__indicator:after {
  font-family: "icomoon";
  content: "\e5ca";
  position: absolute;
  display: none;
  font-size: 16px;
  -webkit-transition: 0.3s all ease;
  -o-transition: 0.3s all ease;
  transition: 0.3s all ease;
}

.control input:checked ~ .control__indicator:after {
  display: block;
  color: #fff;
}

.control--checkbox .control__indicator:after {
  top: 50%;
  left: 50%;
  margin-top: -1px;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}

.control--checkbox input:disabled ~ .control__indicator:after {
  border-color: #7b7b7b;
}

.control--checkbox input:disabled:checked ~ .control__indicator {
  background-color: #7e0cf5;
  opacity: 0.2;
}
</style>
