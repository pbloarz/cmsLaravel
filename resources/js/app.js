/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

var app = new Vue({
    el: '#app',
    methods:{
        eliminarimagen(image){
            Swal.fire({
                title: 'Estas seguro de eliminar la imagen'+image.id+'?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Eliminar!',
                cancelButtonText:'Cancelar'
            }).then((result)=> {
                if (result.value) {

                    let url = '/api/eliminarimagen'+image.id;
                    axios.delete(url).then(response=>{
                        console.log(response.data);
                    });
                    var elemento = document.getElementById('idimagen-'+image.id);
                    elemento.parentNode.removeChild(elemento);
                    Swal.fire(
                        'Eliminado!',
                        'Su imagen fue eliminada con exito.',
                        'success'
                    )
                }
            })
        }
    }
});
