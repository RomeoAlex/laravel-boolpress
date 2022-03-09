<template>
    <section>
        <div class="container">
            <h1>
                SONO LA TAGSSS PAGEE
            </h1>
            <h2>{{tag.name}}</h2>
        </div>
    </section>
</template>
<script>
export default {
    name: 'TagDetails',
    data: function(){
        return{
            tag : false
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
            });
          }
    },
    created: function(){
        
        this.getTag();
        
    }  
}
</script>