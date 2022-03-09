<template>
    <section>
        <div class="container">
            <h1>
                SONO LA TAGSSS PAGEE
            </h1>
            <h2>{{tag.name}}</h2>
            <div v-for="mypost in myposts" :key="mypost.id">
                <PostCard :postDetails="mypost" />
            </div>
        </div>
    </section>
</template>
<script>
import PostCard from '../components/PostCard.vue';
export default {
    name: 'TagDetails',
    components: {
            PostCard
        },
    data: function(){
        return{
            tag : false,
            myposts: []
        }
    },  

    methods: {

         getTag(){
            //  correzione da rivedere immettendo l'url completo ho finalmente i data corretti
            // ATTENZIONE ALLA GESTIONE ROTTE DA PARTE DI LARAVEL USARE URL COMPLETA NEL CASO
            axios.get('/api/tags/' + this.$route.params.slug)
            .then((response) => {
                // console.log(response);
                this.tag = response.data.results;
                this.myposts = response.data.results.posts;
                // console.log(response.data.results.posts);
            });
          }
    },
    created: function(){
        
        this.getTag();
        
    }  
}
</script>