<template>
    <section>
        <div class="container">
            <h1>Titolo del post</h1>
            <h1>
                <!-- {{singlepost.title}} -->
            </h1>
            <p>
                <!-- {{singlepost.content}} -->
            </p>
            
        </div>
    </section>
</template>
<script>

export default {
  
    name: 'SinglePost',    

    methods: {

         getSinglePost(){
            //  correzione da rivedere immettendo l'url completo ho finalmente i data corretti
            axios.get('http://127.0.0.1:8000/api/posts/' + this.$route.params.slug)
            .then((response) => {
                console.log(response);
            });
          }
    },
    created: function(){
        this.getSinglePost();
    }    
}
</script>
