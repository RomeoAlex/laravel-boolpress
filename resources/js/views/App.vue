<template>
    <div >
        <Header />
    <main>
        <router-view></router-view>
    </main>
    </div>
    
</template>

<script>
import Header from '../components/Header.vue';
import NotFound from '../pages/NotFound.vue';
export default {

    name: 'App',
    components:{
        Header , NotFound ,
    }
    

}
</script>