<template>
        <div class="">
                <navbar-component show="true"></navbar-component>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Ingresar</div>
            
                            <div class="card-body">
                                <form >
                                    
            
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">Correo electronico</label>
            
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control " name="email"  v-model="request.email" required autocomplete="email" autofocus>
            
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
            
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control "  v-model="request.password" name="password" required autocomplete="current-password">            
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
            
                                                <label class="form-check-label" for="remember">
                                                    Rercordarmé
                                                </label>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="button" @click="login" class="btn btn-primary">
                                                Ingresar
                                            </button>
                                            <a class="btn btn-link" href="">
                                                ¿Olvidaste tu contraseña?
                                            </a>
                                            
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';
import navBarComponent from './NavbarComponent.vue';

export default {
    components:{
        'navbar-component' : navBarComponent
    },
    props: {
    
    },
    data () {
        return {
            user: {},
            request : {
                email: '',
                password: ''
            }
        }
    },
    methods: {
        login(){
            if(this.request.email != '' && this.request.email != ''){
                let urlTest = 'api/apiLogin';
                axios.post(urlTest, this.request).then((response) =>{
                    console.log(response);
                    if(response.data.status != 'error'){
                        localStorage.setItem('user', JSON.stringify(response.data.user));
                        
                        let url = window.location.protocol + '//' + window.location.hostname + ':' + window.location.port + '/admin?api_token=' + response.data.user.api_token;
                        console.log(url);
                        window.location.href = url;

                    }
                    else{
                        Swal.fire(
                            'Error de acceso',
                            'Tu contraseña o email son incorrectos',
                            'error'
                        )
                    }

                    // this.user = response.data.user;
                    
                    // this.warriors = response.data.warriors;
                });
            }
            else{
                Swal.fire(
                    'Campos vacios',
                    'Los campos deben estar llenos',
                    'error'
                );

            }
            
        },
    },
    mounted(){
        let user = JSON.parse(localStorage.getItem('user'));
        if(user){
            let url = window.location.protocol + '//' + window.location.hostname + ':' + window.location.port + '/admin?api_token=' + user.api_token;
                        console.log(url);
                        window.location.href = url;
        }
    }
}
</script>