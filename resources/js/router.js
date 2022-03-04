import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);
import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Blog from './pages/Blog.vue';
import UltimeNotizie from './pages/UltimeNotizie.vue';
import NotFound from './pages/NotFound.vue';
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
        },
        {
            path: "/blog",
            name: "blog",
            component: Blog
        },
        {
            path: "/ultimenotizie",
            name: "ultimenotizie",
            component: UltimeNotizie
        },
        {
            path: "/*",
            name: "not-found",
            component: NotFound
        }
    ]
});
// non si trova nella documentazione
export default router;