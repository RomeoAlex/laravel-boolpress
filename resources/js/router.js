import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);
import Home from

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            // esempio di rotta
            path: "/",
            name: "home",
            component: Home
        }
    ]
});
// non si trova nella documentazione
export default router