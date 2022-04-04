<template>
  <section
    class="bg-image"
    style="background-image: url('https://wallpaperaccess.com/full/136926.jpg');
        background-size: cover;
        height: 100vh;
        background-position: center;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-10 col-xl-8">
          <div class="card text-black" style="border-radius: 25px">
            <div class="card-body p-md-5 ">
              <div class="row justify-content-center">
                <div class="col-md-12">
                  <div class="text-center">
                  <div class="row">
            <router-link class="btn btn-sm btn-dark" style="width:10vh"  :to="{ path: '/rdv/' + $route.params.ref }">
                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
  <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
</svg></router-link>
        </div>
                    <h1 class="display-4 text-black mb-4">Reservation</h1>
                    <p class="text-black-50 mb-4">Please complete the fields below to reserve your spot.</p>
                  <div class="row">
                    <div class="alert alert-danger" role="alert" v-if="erreur">
                      {{ erreur }}
                    </div>
                  </div>
                  <form class="mx-1 mx-md-4" v-on:submit.prevent="Submt">
                    <div
                      class="d-flex flex-row justify-content-center align-items-center mb-4"
                    >
                      <div class="form-outline flex-fill mb-0">
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Date :</label>
                          <input
                            type="date"
                            class="form-control"
                            id="exampleFormControlInput1"
                            placeholder="date"
                            v-model="date"
                          />
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlSelect1"
                            >Timeframe :</label
                          >
                          <select
                            class="form-control"
                            id="exampleFormControlSelect1"
                            v-model="rdvData.horaire"
                          >
                            <option selected disabled>
                              Choose a Timeframe
                            </option>
                            <option
                              v-for="(el, index) in horairesPr"
                              :key="index"
                              :disabled="el.etat"
                            >
                              {{ el.val }}
                            </option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1"
                            >Reason for the visit :</label
                          >
                          <select
                            class="form-control"
                            id="exampleFormControlSelect1"
                            v-model="rdvData.typeCons"
                          >
                            <option>Psychological stress</option>
                            <option>Schizophrenia</option>
                            <option>Bipolar disorder</option>
                            <option>Narcolepsy</option>
                            <option>Depression</option>
                            <option>Insomnia</option>
                            <option>Obsessive-compulsive disorder</option>
                            <option>Anxiety</option>
                            <option>Panic disorder</option>
                            <option>Post-traumatic stress disorder</option>
                          </select>
                        </div>
                        <button
                          type="submit"
                          class="btn btn-dark mt-2 btn-lg"
                        >
                          Reserve
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
       
          </div>
          </div>
          </div>
      </div>
    </div>
  </section>
</template>
<script>
export default {
  name: "Reservation",
  data() {
    return {
      erreur: "",
      date: "",
      horairesPr: [
        { val: "08:00-09:00", etat: false },
        { val: "09:00-10:00", etat: false },
        { val: "10:00-11:00", etat: false },
        { val: "11:00-12:00", etat: false },
        { val: "13:00-14:00", etat: false },
        { val: "14:00-15:00", etat: false },
        { val: "15:00-16:00", etat: false },
        { val: "16:00-17:00", etat: false },
        { val: "17:00-18:00", etat: false },
      ],
      horaires: [],
      rdvData: {
        date: "",
        horaire: "Choose a Timeframe",
        typeCons: "",
        reference: "",
      },
    };
  },
  methods: {
    async Submt() {
      if (
        this.rdvData.horaire != "Choose a Timeframe" &&
        this.rdvData.typeCons != ""
      ) {
        // GET request using fetch with async/await
        const response = await fetch(
          "http://localhost/brief-6/back-end/api/rdv/ajouterRdv",
          {
            method: "POST", // or 'PUT'
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify(this.rdvData),
          }
        );
        this.$router.push("/rdv/" + this.$route.params.ref);
        this.$swal("Success!", "Your reservation has been made!", "success");
      } else {
        this.erreur = "Please fill in all the fields";
      }
    },
    async getTime(val) {
      const response = await fetch(
        "http://localhost/brief-6/back-end/api/rdv/afficherHr/" + val
      );
      const data = await response.json();
      this.horaires = data;
    },
  },
  watch: {
    date: async function (val) {
      //
      await this.getTime(val);
      this.rdvData.horaire = "Choose a Timeline";
      await (this.rdvData.date = val);
      await (this.rdvData.reference = this.$route.params.ref);
      if (this.horairesPr.length == this.horaires.length) {
        this.erreur =
          "There are no available timeframes for this date, please choose another one";
      } else {
        this.erreur = "";
      }
      for (var i = 0; i < this.horairesPr.length; i++) {
        this.horairesPr[i].etat = false;
        for (var j = 0; j < this.horaires.length; j++) {
          if (this.horairesPr[i].val == this.horaires[j]) {
            this.horairesPr[i].etat = true;
          }
        }
      }
    },
  },
};
</script>