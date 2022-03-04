import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);
import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Blog from './pages/Blog.vue';
import UltimeNotizie from './pages/UltimeNotizie.vue';
import PostDetails from './pages/PostDetails.vue';
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
            path: "/ultime-notizie",
            name: "ultimenotizie",
            component: UltimeNotizie
        },
        {
            // si utilizzano i :
            path: "/blog/:slug",
            name: "post-details",
            component: PostDetails
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