<template>
    <section>
        
        <div class="container">
            <h1>
            Lista dei post
        </h1>
                <div class="row row-cols-3">
                    <!-- stampo i dati presi dalla api -->
                    <div  class="col" v-for="mypost in myposts" :key="mypost.id">
                                <!-- <img src="..." class="card-img-top" alt="..."> -->
                                <div class="card-body">
                                    <h5 class="card-title">{{mypost.title}}</h5>
                                        <p class="card-text">{{mypost.content}}</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                    </div>
                </div>
        </div>
    </section>
</template>


<script>
export default {
        name: 'Posts',
        data:function(){
            return{
                myposts:[]
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
                    this.myposts = response.data.results;
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