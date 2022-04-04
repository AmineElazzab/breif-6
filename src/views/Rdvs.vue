<template>
<section
    class="bg-image"
    style="
      background-image: url('https://wallpaperaccess.com/full/136926.jpg');
        background-size: cover;
      height: 100vh;
        background-position: center;

    "
  >
    <!-- eslint-disable -->
    
    <div class="container-fluid affcont">
    
        <div class="row rdvherd">
            <div class="col-2 ">
            </div>
        </div>
        <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-10">
          <div class="card text-black" style="border-radius: 25px">
            <div class="card-body p-md-5 ">
              <div class="row justify-content-center">
                <div class="container">
        <div class="row">
        <router-link class="btn btn-dark" style="width:10vh" :to="{ path: '/reservation/' + ref }"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
  <path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z"/>
  <path d="M13.5 10a.5.5 0 0 1 .5.5V12h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V13h-1.5a.5.5 0 0 1 0-1H13v-1.5a.5.5 0 0 1 .5-.5z"/>
</svg></router-link>
        <router-link class="btn btn-sm btn-light" style="width:10vh"  :to="{ path: '/'  }">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
  <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
</svg> </router-link>
            <div class="card-body">
                Reference : {{ref}}
        <div class="table-responsive">
          <table class="table ">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Horaire</th>
                            <th>Type Consultation</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="elemt in rdvs" v-bind:key="elemt.id">
                            <template v-if="editClient.id == elemt.id">
                                <td><input v-model="date" type="date"></td>
                                <!-- <td><input v-model="editClient.horaire" type="text"></td> -->
                                <td> <select
                        class="form-control"
                        id="exampleFormControlSelect1"
                        v-model="editClient.horaire"
                    >
                        <option disabled>choisir un horaire</option>
                        <option
                            v-for="(el, index) in horairesPr"
                            :key="index"
                            :disabled="el.etat"
                        >
                            {{ el.val }}
                        </option>
                    </select> </td>
                                <td><input v-model="editClient.typeCons" type="text"></td>
                                <td><button class="btn btn-success btn-sm rounded-0" @click="update();" > <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
  <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
  <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
</svg></button> &nbsp;<button class="btn btn-sm rounded-0" @click="cancel();"> <i class="fa fa-ban"></i></button></td>
                            </template>
                            <template v-else>
                                <td>{{ elemt.date }}</td> 
                                <td>{{ elemt.horaire }}</td>  
                                <td>{{ elemt.typeCons }}</td>
                                <td><button class="btn btn-danger btn-sm rounded-0" @click="slectU(elemt.id); del();" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
</svg>
                                </button> &nbsp;<button class="btn btn-primary btn-sm rounded-0" @click="edit(elemt.id);">
                               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
  <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
</svg></button></td>
                            </template>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
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
/* eslint-disable */
export default {
    name: "RendezVous",
  data(){
      return{
          rdvs:[],
          ref:'',
          date: '',
          curentElment:'',
          editReser:'',
          editClient:{
              id:'',
              date:'',
              horaire:'',
              typeCons:''
          },
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
            horaires:[],
      }
  },
  async mounted(){
    await this.refer();
     await this.getAll();
      
  },
  methods:{
    async getAll(){
    const response = await fetch('http://localhost/brief-6/back-end/api/rdv/afficherRdv/'+this.ref);
    const data = await response.json();
    console.log(data);
    this.rdvs=data;
    },
    refer(){this.ref = this.$route.params.ref},
    slectU(x){
       this.curentElment=x;
    },

    async del() {
        await fetch('http://localhost/brief-6/back-end/api/rdv/supprimerRdv/'+this.curentElment,{
            method:"DELETE",
            
        });
       await this.getAll();
               this.$swal("Success!", "Your reservation has been deleted!", "success");

    },
    async edit(x){
        fetch('http://localhost/brief-6/back-end/api/rdv/getoneRdv/'+x)
        .then(response => response.json())
        .then(data =>{
            this.editReser=data.id;
            this.editClient.id=data.id;
            this.editClient.date=data.date;
            this.date=data.date;
            this.editClient.horaire=data.horaire;
            this.editClient.typeCons=data.typeCons;
            this.filtrerH(data.date);
            // console.log(this.editClient.horaire);
            
        })
    },
   async update(){
        console.log(JSON.stringify(this.editClient));
       await fetch(' http://localhost/brief-6/back-end/api/rdv/modifierRdv/'+this.editClient.id,{
            method: 'PUT',
            headers:{
                'Content-Type': 'application/json',
            },
            body:JSON.stringify(this.editClient),
        });
        await this.getAll();
        this.editReser='';
        this.editClient.id='';
        this.editClient.date='';
        this.editClient.horaire='';
        this.editClient.typeCons='';
        console.log(JSON.stringify(this.editClient));
        this.$swal("Success!", "Your reservation has been update!", "success");

        
    },
    cancel(){
        this.editReser='';
        this.editClient.id=''
        this.editClient.date='';
        this.editClient.horaire='';
        this.editClient.typeCons='';
    },
     async getTime(val) {
            console.log("im in");
            const response = await fetch(
                "http://localhost/brief-6/back-end/api/rdv/afficherHr/" + val
            );
            const data = await response.json();
            this.horaires = data;
        },
         async filtrerH (val) {
            console.log("eeeeeeee");
            await this.getTime(val);
            await (this.editClient.date = val);
            await (this.editClient.reference = this.$route.params.ref);
            await console.log(this.editClient);
            //    await (console.log(this.horaires.length));
             for (var i = 0; i < this.horairesPr.length; i++) {
                await (this.horairesPr[i].etat = false);
                for (var j = 0; j < this.horaires.length; j++) {
                    if (this.horairesPr[i].val == this.horaires[j]) {
                        // console.log(this.horairesPr[i].etat);
                         await (this.horairesPr[i].etat = true);
                        console.log( this.horaires[j] + "///eg///");
                       
                    }
                }
            }
        }
  },
  watch: {
        date: async function (val) {
            this.editClient.horaire = "choisir un horaire";
            this.filtrerH (val);
        },
    },
 
};
</script>
<style>
        .affcont{
            position: absolute;
            /* top: 10%; */
            padding: 5%;
            /* left: 5%; */
            /* transform: translate(-50%, -50%); */
        }
    .rdvherd{
        height: 10vh;
    }
    .btn-info{color:#fff;}
    table th{
        color: #2475a0;
    }

    </style>