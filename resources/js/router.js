import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);
import Home from './pages/Home.vue';
import About from './pages/About.vue';

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            // esempio di rotta
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/about",
            name: "about",
            component: About
        }
    ]
});
// non si trova nella documentazione
export default router;