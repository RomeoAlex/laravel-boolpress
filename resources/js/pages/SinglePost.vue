<template>
    <section>
        <div class="container">
            <!-- <h1>Titolo del post</h1> -->
            <h1>
                {{singlepost.title}}
            </h1>
            <!-- creo condizionale per il nome della categoria nel caso sia null -->
            
            <h2 v-if="singlepost.category">Categoria: {{singlepost.category.name}}</h2>
            <!-- condizionale per gli array vuoti -->
            <div v-if="singlepost.tags <= 0  ">
                <span class="badge bg-danger mx-1">Nessuna Tag</span>
            </div>
            <div v-else>
            <!-- <span v-for="tag in singlepost.tags" :key="tag.id" class="badge bg-info text-dark mx-1">{{tag.name}}</span> -->
            <router-link 
            v-for="tag in singlepost.tags" :key="tag.id" class="badge bg-info text-dark mx-1" :to="{ name: 'tag-details', params:{ slug: tag.slug } }">
                   {{tag.name}}
            </router-link>
            </div>
            <p>
                {{singlepost.content}}
            </p>
        </div>
    </section>
</template>
<script>

export default {
  
    name: 'SinglePost',  
    data: function(){
        return{
            singlepost : false
        }
    },  

    methods: {
        
         getSinglePost(){
            //  correzione da rivedere immettendo l'url completo ho finalmente i data corretti
            // ATTENZIONE ALLA GESTIONE ROTTE DA PARTE DI LARAVEL USARE URL COMPLETA NEL CASO
            axios.get('/api/posts/' + this.$route.params.slug)
            .then((response) => {
                // console.log(response);
                this.singlepost = response.data.results;
            });
          }
    },
    created: function(){
        this.getSinglePost();
    }    
}
</script>
