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
                                        <p class="card-text">{{reduceText(mypost.content , 40)}}</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                    </div>
                </div>
        </div>
      <!-- PAGINAZIONE -->
                <nav aria-label="...">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link">Previous</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item active" aria-current="page">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
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
            // // chiamata api per attingere i dati dal json
            // getPosts: function() {
            //     // console.log('funzione per chiamare api');
            //     // http://127.0.0.1:8000/api/posts di solito hanno la stessa url
            //     axios.get('/api/posts')
            //     .then((response) => {
            //         // console.log(response);
            //         this.myposts = response.data.results;
            //     });
            // },
            // MODIFICANDO PAGINATE NEL CONTROLLER DEVO CAMBIARE LA FUNZIONE PERCHE' HO UN RITORNO DI DATI DIVERSO
            getPosts: function(pageNumber) {
                // console.log('funzione per chiamare api');
                // http://127.0.0.1:8000/api/posts di solito hanno la stessa url
                axios.get('/api/posts',{
                    params:{
                        page: pageNumber
                    }
                })
                .then((response) => {
                    // console.log(response);
                    // modifico il response perchè ho usato paginate nel controller
                    this.myposts = response.data.results.data;
                });
            },
            reduceText: function(text, maxCharsNumber){
                if(text.length > maxCharsNumber){
                   return text.substr(0 , maxCharsNumber) , '...';
                }
                return text;
            }
        },
        created: function(){
            // quando carico la pagina voglio vedere la prima
            this.getPosts(1);
        }            
    }
</script>

<style>

</style>