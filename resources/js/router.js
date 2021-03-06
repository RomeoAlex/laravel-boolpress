import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Blog from './pages/Blog.vue';
import UltimeNotizie from './pages/UltimeNotizie.vue';
import SinglePost from './pages/SinglePost.vue';
import TagDetails from './pages/TagDetails.vue';
import NotFound from './pages/NotFound.vue';

const router = new VueRouter({
    mode: "history",
    routes: [
        {
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
            
            path: "/blog/:slug",
            name: "single-post",
            component: SinglePost
        },
        {
            // attenzione alla rotta NON DIMENTICARE DI RIPORTARE CORRETTAMENTE I DATI DALLA API ROUTE::GET
            path: "/tags/:slug",
            name: "tag-details",
            component: TagDetails
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