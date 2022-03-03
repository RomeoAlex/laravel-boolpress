<template>
    <section>
        <div class="container">
            <h1>
                Ciao sono Blog
            </h1>
            <Posts />
        </div>
    </section>
</template>
<script>

import Posts from '../components/Posts.vue';


export default {
  
    name: 'Blog',
    components: { 
        Posts 
  },  
}
</script>