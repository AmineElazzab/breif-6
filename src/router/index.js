import { createRouter, createWebHistory } from 'vue-router'
import Login from '../views/Reference.vue'
import Signup from '../views/Signup.vue'
import Rendv from "../views/Rdvs.vue";
import Reservation from '../views/Reservation.vue'

const routes = [{
        path: "/rdv",
        name: "RendezVous",
        component: Rendv,
    },
    {
        path: '/',
        name: 'Login',
        component: Login,
    },
    {
        path: '/signup',
        name: 'Signup',
        component: Signup,
    },

    {
        path: '/reservation',
        name: 'Reservation',
        component: Reservation,
    },
    // {
    //     path: "/reservation/:ref",
    //     name: "Reservation",
    //     component: Reservation,
    // },
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

export default router