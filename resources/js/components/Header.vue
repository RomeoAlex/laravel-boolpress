<template>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
                <a class="navbar-brand" href="#">Boolpress</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- <li class="nav-item">
                        <router-link class="nav-link active" to="/">Home</router-link>  -->
                        <!-- secondo modalità chiamo direttamente la rotta che nella url faà comparire la parola lì descrittta
                        <router-link class="nav-link active" :to="{name: 'home'}">Home</router-link> 
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link active" :to="{name: 'about'}">About</router-link> 
                    </li> -->
                   <li v-for="(link,index) in menuLinks" :key="index" class="nav-item">
                        <router-link class="nav-link active" :to="{name: link.name }">{{link.label}}</router-link> 

                        <!-- <router-link class="nav-link active" to="name:home">HOME</router-link>  -->
                    </li>
                </ul>
            </div>
        </div>
        </nav>
</template>

<script >
// import Vue from 'vue'
export default{
 name : 'Header',  
 data: function() {
     return{
         menuLinks: [
             {
                 name: 'home',
                 label: 'Home',
             },
             {
                 name: 'about',
                 label: 'About',
             },
             {
                 name: 'blog',
                 label: 'Blog',
             },
             {
                 name: 'ultimenotizie',
                 label: 'UltimeNotizie',
             }
         ]
     }
 } 
}
</script>