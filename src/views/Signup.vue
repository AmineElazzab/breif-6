<template>
    <div class="container-fluid containfos">
        <div class="row">
            <router-link :to="{ path: '/' }"> retour</router-link>
        </div>
        <div class="row">
            <div class="col-8">
                <form class="infos" v-on:submit.prevent="Signup">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-xm-12 form-group">
                            <label for="inputEmail4">First Name:</label>
                            <input
                                type="text"
                                class="form-control"
                                id="inputEmail4"
                                placeholder="First Name"
                                v-model="clientData.firstname"
                                
                            />
                        </div>
                        <div class="col-lg-6 col-md-6 col-xm-12 form-group">
                            <label for="inputPassword4">Last Name:</label>
                            <input
                                type="text"
                                class="form-control"
                                id="inputPassword4"
                                placeholder="Last Name"
                                v-model="clientData.lastname"
                                
                            />
                        </div>
                    </div>
                  
                    <div class="row">
                    
                        <div class="col-lg-6 col-md-6 col-xm-12 form-group">
                            <label for="inputAddress2">Age:</label>
                            <input
                                type="number"
                                class="form-control"
                                id="inputAddress2"
                                placeholder="Age?"
                                v-model="clientData.age"
                                
                                />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btnvalider">Valider</button>
                </form>
                <!-- <img alt="Vue logo" src="../assets/logo2.png" /> -->

            </div>
        </div>
        <!-- <img alt="Vue logo" src="../assets/logo2.png" /> -->

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
            this.$router.push("/reference/" + data.reference);

        },
    },
};

</script>
<style scoped>
/* .containfos{
            background-color:#2475A0;
            height:100vh;
        } */
div {
    margin-bottom: 20px;
}
.infos {
    color: #fff;
    background-color: #2475a0;
    padding: 40px;
    position: relative;
    top: 10%;
    left: 20%;
}
.btnvalider {
    float: right;
    margin: 20px;
}
img {
    z-index: 100;
    width: 22%;
    position: absolute;
    bottom: 0;
    right: 0;
}
</style>