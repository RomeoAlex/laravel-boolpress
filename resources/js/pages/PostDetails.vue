<template>
    <section>
        <div class="container">
            <h1>
                {{singlepost.title}}
            </h1>
            <p>
                {{singlepost.content}}
            </p>
            
        </div>
    </section>
</template>
<script>

// import Posts from '../components/Posts.vue';


export default {
  
    name: 'PostDetails',
    components: { 
        
    },
    data: function(){
        return{
            singlepost: false
        }
    },
    methods:{
        getPost(){
            // faccio un controllo con uno slug fisso
            // asios.get('api/posts/guerra')
            // ,then((response) =>{
            //     console.log(response);
            // });
            // DATO LO SLUG RICEVO I DATI DELLO STESSO CON LA CHIAMATA API
            asios.get('api/posts/' + this.$route.params.slug)
            ,then((response) =>{
                // salvo i dati nei data chiamato
                this.singlepost = response.data.results;

            });
        }
    },
    created: function(){
        // controllo per vedere lo slug ricevuto
        // console.log(this.$route.params.slug);
        this.getPost();
    }    
}
</script>