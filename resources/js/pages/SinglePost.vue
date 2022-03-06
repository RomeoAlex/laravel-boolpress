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
            axios.get('api/posts/' + this.$route.params.slug)
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
