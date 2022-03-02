// conterrà il caricamento di VUE

// test
// alert('test');

window.Vue = require('vue');
// importante per utilizzare axios in vue"!!!!
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// componente d'esempio non serve
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


// importo App.vue
import App from './views/App.vue';

// cambio la variabile in root creata in front.js
const app = new Vue({
    el: '#root',
    // codice necessario per il funzionamento e l'importazione di App
    render: h => h(App)
});
