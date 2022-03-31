import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
import Login from '../views/Reference.vue'
import Signup from '../views/Signup.vue'
import Rendv from "../views/Rdvs.vue";
import Dashbord from '../views/Dashbord.vue'
import Reservation from '../views/Reservation.vue'

const routes = [{
        path: '/',
        name: 'Home',
        component: Home,
    },
    {
        path: "/rdv/:ref",
        name: "RendezVous",
        component: Rendv,
    },
    {
        path: '/login',
        name: 'Login',
        component: Login,
    },
    {
        path: '/signup',
        name: 'Signup',
        component: Signup,
    },
    {
        path: '/Dashbord',
        name: 'Dashbord',
        component: Dashbord,
    },
    {
        path: '/reservation',
        name: 'Reservation',
        component: Reservation,
    },
    {
        path: "/reservation/:ref",
        name: "Reservation",
        component: Reservation,
    },
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

export default router