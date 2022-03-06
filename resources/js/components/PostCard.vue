<template>
                                <div class="card">
                                <!-- <img src="..." class="card-img-top" alt="..."> -->
                                <h1> Titolo del post</h1>
                                    <div class="card-body my-3">
                                        <h5 class="card-title">{{postDetails.title}}</h5>
                                        <!-- devo uisare substr perchè in altro caso devo richiamare la funzione reducetext o scriverla in questa pagina -->
                                            <p class="card-text">{{postDetails.content.substr(0,40) }}</p>
                                         <router-link :to="{name: 'single-post', params:{ slug: postDetails.slug } }">Leggi l'articolo</router-link> 
                                    </div>
                                </div>
</template>
<script>
export default {
    name:'PostCard',
    props: {
        postDetails: Object
    },
}
</script>