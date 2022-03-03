<template>
    <section>
        
        <div class="container">
            <h1>
            Lista dei post
            </h1>
                <div class="row row-cols-3">
                    <!-- stampo i dati presi dalla api -->
                    <div v-for="mypost in myposts" :key="mypost.id" class="col" >
                                <PostCard :postDetails="mypost" />
                    </div>
                </div>
                <!-- PAGINAZIONE -->
                <nav >
                    <ul class="pagination">
                        <li class="page-item" :class="{ 'disabled': currentPage = 1 }">
                            <a @click="getPosts(currentPage -1)" class="page-link">Previous</a>
                        </li>
                        <li v-for="n in lastPage" :key="n" class="page-item" :class="{ 'active': currentPage = n }" >
                            <a @click="n" class="page-link" >{{ n }}</a>
                        </li>
                        
                        <li class="page-item" :class="{'disabled': currentPage == lastPage }">
                            <!-- l'ancora non deve contenere href="" sennò ricarica la pagina dopo il click-->
                            <a @click="getPosts(currentPage + 1)" class="page-link">Next</a>
                             <!-- @click="mypost.next_page_url"  -->
                        </li>
                    </ul>
                </nav>
        </div>
      
    </section>
</template>


<script>
import PostCard from './PostCard.vue';
export default {
        name: 'Posts',
        components: {
            PostCard
        },
        data: function() {
            return {
                myposts: [],
                currentPage: 1,
                lastPage: 0
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
                axios.get('/api/posts', {
                    params:{
                        page: pageNumber
                    }
                })
                .then((response) => {
                    // console.log(response);
                    // modifico il response perchè ho usato paginate nel controller
                    this.myposts = response.data.results.data;
                    // aggiungo currentPage per poi riutilizzarlo nel html
                    this.currentPage = response.data.results.current_page;
                    // aggiungo last page dal response ATTENZIONE POSSO FARLO CON TUTTI GLI ELEMENTI DELL'OGGETTO JSON E UTILIZZARLI SUCCESSIVAMENTE POPOLANDO I DATA IN VUE
                    this.lastPage = response.data.results.last_page;
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