<template>
    <div class="">
            <navbar-component :user="user" :show="true"></navbar-component>
        <div class="row">
            <nav class="col-md-2  d-md-block bg-light sidebar">
                <div class="nav nav-tabs sidebar-sticky" id="nav-tab" role="tablist">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                                <span data-feather="home"></span>
                                Mi usuario <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                                <span data-feather="file"></span>
                                Battle History
                            </a>
                        </li>
                        <li>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Jugar</a>
                        </li>
                        <li>
                            <button @click="logout" type="button" class="btn btn-outline-dark btn-block ">Salir</button>
                        </li>

                    </ul>
                    
                </div>
            </nav>
            <div class="tab-content col-md-10" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <main role="main" class="col-md-9  col-lg-10">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card bg-light">
                                            <div class="card-header">
                                                <h4>Total de Batallas Jugadas</h4>
                                            </div>
                                            <div class="card-body">
                                                <h5>{{battles.length}}</h5>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="col-md-3">
                                        <div class="card bg-success text-white">
                                            <div class="card-header">
                                                <h4>Batallas Ganadas</h4>
                                            </div>
                                            <div class="card-body">
                                                <h5>{{win.length}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card bg-danger text-white">
                                            <div class="card-header">
                                                <h4>Batallas Perdidas</h4>
                                            </div>
                                        <div class="card-body">
                                            <h5>{{loose.length}}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-header bg-secondary text-white">
                                            <h4>Batallas Empatadas</h4>
                                        </div>
                                        <div class="card-body">
                                            <h5>{{tie.length}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid py-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Mejor Personsaje</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="card">
                                                <div class="card-header text-center">
                                                    <h4>{{best_warrior.name}}</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <img src="https://picsum.photos/100?random" class="img-thumbnail" alt="Image Second Warrior">
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                        <span class="badge badge-success">Speed: {{best_warrior.speed}}</span>
                                                        <span class="badge badge-info">Skills: {{best_warrior.skills}}</span>
                                                        <span class="badge badge-warning">Strenght: {{best_warrior.strength}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Peor Personsaje</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="card-header text-center">
                                                <h4>{{worst_warrior.name}}</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <img src="https://picsum.photos/100?random" class="img-thumbnail" alt="Image Second Warrior">
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                    <span class="badge badge-success">Speed: {{worst_warrior.speed}}</span>
                                                    <span class="badge badge-info">Skills: {{worst_warrior.skills}}</span>
                                                    <span class="badge badge-warning">Strenght: {{worst_warrior.strength}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container pb-4">
                            <h2>Ultimas Batallas</h2>
                        </div>
            
                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Personaje usado</th>
                                        <th>Personaje contrincante</th>
                                        <th>Resultado</th>
                                    </tr>
                                </thead>
                                <tbody>
            
                                    <tr v-for="battle in battles.slice(0, 10)">
                                        <td> {{battle.date}} </td>
                                        <td>{{battle.used_name}}</td>
                                        <td>{{battle.fought_name}}</td>
                                        <td v-if="battle.result == 'win'" class="bg-success text-white">Victoria</td>
                                        <td v-else-if="battle.result == 'loose'" class="bg-danger text-white">Derrota</td>
                                        <td v-else class="bg-light">Empate</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </main>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <main role="main" class="col-md-9  col-lg-10">
                                <h3>Historial de batallas</h3>
                                <div class="container-fluid">
                                    <div class="row">
                                            <div class="table-responsive">
                                                    <table class="table table-striped table-sm">
                                                        <thead>
                                                            <tr>
                                                                <th>Fecha</th>
                                                                <th>Personaje usado</th>
                                                                <th>Personaje contrincante</th>
                                                                <th>Resultado</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                    
                                                            <tr v-for="battle in battles">
                                                                <td> {{battle.date}} </td>
                                                                <td>{{battle.used_name}}</td>
                                                                <td>{{battle.fought_name}}</td>
                                                                <td v-if="battle.result == 'win'" class="bg-success text-white">Victoria</td>
                                                                <td v-else-if="battle.result == 'loose'" class="bg-danger text-white">Derrota</td>
                                                                <td v-else class="bg-light">Empate</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                    </div>
                                </div>
                        </main>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <battle-component v-bind:load="true"></battle-component>
                </div>
            </div>
            
    </div>
</div>
</template>
<script>
    import axios from 'axios';
    import Swal from 'sweetalert2';

    import battleComponent from './BattleComponent.vue';
    import navBarComponent from './NavbarComponent.vue';

    
    export default {
        components:{
            'battle-component' : battleComponent,
            'navbar-component' : navBarComponent,
        },
        data: () => ({
            user: {},
            battles : [],
            win: [],
            loose: [],
            tie: [],
            worst_warrior: [],
            best_warrior: [],

            
        }),
        computed: {
        
        },

        watch: {
        },
        methods: {
            logout(){
                console.log('logout');
                let urlData = 'api/apiLogout';
                axios.post(urlData, {api_token: this.user.api_token}).then((response) => {
                    console.log(response);
                    if(response.data.status != 'error'){
                        localStorage.clear();
                        let url = window.location.protocol + '//' + window.location.hostname + ':' + window.location.port + '/warriors';
                        console.log(url);
                        window.location.href = url;
                    }
                });
            },
            getData(){
                let urlData = 'api/battles/getAll?api_token=' + this.user.api_token;
                // let urlData = 'api/battles/getAll';
                axios.get(urlData, ).then((response) => {
                    console.log(response);
                    this.battles = response.data.battles;
                    this.win = response.data.win;
                    this.loose = response.data.loose;
                    this.tie = response.data.tie;
                    this.worst_warrior = response.data.worst_warrior;
                    this.best_warrior = response.data.best_warrior;

                });
            },
            login(){
                let urlTest = 'api/apiLogin';
                axios.post(urlTest, {email : 'example@example.com', password: '12345678'}).then((response) =>{
                    console.log(response);
                    // this.user = response.data.user;
                    localStorage.setItem('user', JSON.stringify(response.data.user));
                    // this.warriors = response.data.warriors;
                })
            },
            test(){
                let urlTest = '/api/user?api_token=' + this.user.api_token;
                axios.get(urlTest).then((response) =>{
                    console.log(response);
                    // this.warriors = response.data.warriors;
                })
            },
        },
        created () {
        // this.initialize()
            this.user = JSON.parse(localStorage.getItem('user'));
        },
        mounted() {
            console.log('montado perro');
            this.getData();
        }
    }
</script>