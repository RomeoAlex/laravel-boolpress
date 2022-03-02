<template>
    <section>
        <h1>
            Lista dei post
        </h1>
        <div class="container">

        </div>
    </section>
</template>


<script>
export default {
        name: 'Posts',
        data:function(){
            return{
                posts:[]
            };
        },
        methods:{
            // chiamata api per attingere i dati dal json
            getPosts: function() {
                // console.log('funzione per chiamare api');
                // http://127.0.0.1:8000/api/posts di solito hanno la stessa url
                axios.get('/api/posts')
                .then((response) => {
                    // console.log(response);
                    this.posts = response.data.results;
                });
            }
        },
        created: function(){
            this.getPosts();
        }            
    }
</script>

<style>

</style>