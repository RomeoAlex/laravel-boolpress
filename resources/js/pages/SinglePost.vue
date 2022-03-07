<template>
    <section>
        <div class="container">
            <!-- <h1>Titolo del post</h1> -->
            <h1>
                {{singlepost.title}}
            </h1>
            <!-- creo condizionale per il nome della categoria nel caso sia null -->
            
            <h2 v-if="singlepost.category">Categoria: {{singlepost.category.name}}</h2>
            <!-- <h2>tags: {{singlepost.category.name}}</h2> -->
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
