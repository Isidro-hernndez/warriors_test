<template>
    <div class="" v-if="show">
        <div class="pb-2">

            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                <a class="navbar-brand" href="#">Warriors</a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav ml-auto" v-if="!user">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link" :href="urls.singin"">Ingresar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" :href="urls.register">Registrarse</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
import Swal from 'sweetalert2';
export default {
    props: {
        user: Object,
        show: Boolean
    },
    data () {
        return {
            urls:{
                singin : '',
                register: ''
            }
        }
    },
    methods: {
        
    },
    created () {
        let url = window.location.protocol + '//' + window.location.hostname + ':' + window.location.port;

        this.urls.singin = url + '/login';
        this.urls.register = '/register';
        
    }
}
</script>