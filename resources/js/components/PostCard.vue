<template>
                                <div class="card">
                                <!-- <img src="..." class="card-img-top" alt="..."> -->
                                    <div class="card-body my-3">
                                        <h5 class="card-title">{{postDetails.title}}</h5>
                                        <!-- devo uisare substr perchè in altro caso devo richiamare la funzione reducetext o scriverla in questa pagina -->
                                            <p class="card-text">{{postDetails.content.substr(0,40) }}</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
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