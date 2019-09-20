<template>
    <div class="">
        <navbar-component :show="!load"></navbar-component>
        <div class="container-fluid">
                
                <select-component v-if="showModal" @close="showModal = false" :warriors="warriors" @select-warrior="selectWarrior"></select-component>
        <div class="row justify-content-md-center">
            <!-- Start first warrior -->
            <div class="col-md-4 col-xs-offset-2">
                <div class="card bg-secondary">
                    <div class="card-header text-center">
                        <h4>{{warriorUsed.name}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img src="https://picsum.photos/300?random" class="img-thumbnail" alt="Image First Warrior">
                        </div>
                    </div>
                    <div class="card-footer">
                        <span class="badge badge-success">Speed: {{warriorUsed.speed}}</span>
                        <span class="badge badge-info">Skills: {{warriorUsed.skills}}</span>
                        <span class="badge badge-warning">Strenght: {{warriorUsed.strength}}</span>
                    </div>
                </div>
            </div>
            <!-- End First warrior -->

            <!-- Start second Warrior -->
            <div class="col-md-4">
                <div class="card bg-light">
                    <div class="card-header text-center">
                        <h4>{{warriorFought.name}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img src="https://picsum.photos/300?random" class="img-thumbnail" alt="Image Second Warrior">
                        </div>
                    </div>
                    <div class="card-footer">
                            <span class="badge badge-success">Speed: {{warriorFought.speed}}</span>
                            <span class="badge badge-info">Skills: {{warriorFought.skills}}</span>
                            <span class="badge badge-warning">Strenght: {{warriorFought.strength}}</span>
                    </div>
                </div>
            </div>
            <!-- End Second Warrior -->
        </div>
    </div>

    <div class="mx-auto py-1" style="width: 200px;">
        <button id="show-modal" class="btn btn-primary btn-block" @click="showModal = true">Seleccionar Guerreo</button>
        <button v-if="warriorUsed" class="btn btn-block btn-danger" @click="fight(warriorUsed, warriorFought)">Pelear</button>
    </div>
    <!-- Start warriors Select -->
    <!-- <div class="mb-2 bg-white text-dark">
        <div class="row">
            <div class="col-md-2" v-for="warrior in warriors" pb-1 >
                <div class="card">
                    <div class="card-body">
                        <img src="https://picsum.photos/100?random" class="img-thumbnail" alt="Image Warrior">
                    </div>
                    <div class="card-footer text-center">
                        <button class="btn btn-secondary" v-on:click="selectWarrior(warrior)" data-toggle="tooltip" data-placement="top" v-bind:title="'Speed: ' + warrior.speed + ' Skills: ' + warrior.skills + ' Strength: ' + warrior.strength">{{warrior.name}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- End Warriors Select -->
    </div>
</template>

<script>
    import axios from 'axios';
    import Swal from 'sweetalert2';

    import selectComponent from './SelectComponent.vue';
    import navBarComponent from './NavbarComponent.vue';
    
    export default {
        props:{
            load: Boolean
        },
        components:{
            'select-component' : selectComponent,
            'navbar-component' : navBarComponent
        },
        data: () => ({
            user: {},
            showModal: false,
            warriorUsed: {
                id: 0,
                name: '---',
                skills: 0,
                speed: 0,
                strength: 0,
            },
            warriorFought: {
                id: 0,
                name: '---',
                skills: 0,
                speed: 0,
                strength: 0,
            },
            warriorWinner: {
                id: 0,
                name: '---',
                skills: 0,
                speed: 0,
                strength: 0,
                type: 'used',
            },
            warriors: [],
        }),
        computed: {
        
        },

        watch: {
        },
        methods: {
            login(){
                let urlTest = 'api/apiLogin';
                axios.post(urlTest, {email : 'isihergre@gmail.com', password: '12345678'}).then((response) =>{
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
            fight(used, fought){
                if(used.id != 0){
                    let battle = {
                        warrior_used : used.id,
                        warrior_fought : fought.id, 
                        result : 'loose',
                        type : 'error',                        
                    };
                    let usedScore = used.speed + used.skills + used.strength;
                    let foughtScore = fought.speed + fought.skills + fought.strength;
                    if(usedScore > foughtScore){
                        
                        battle.result = 'win';
                        battle.resultado = 'Victoria';
                        battle.type = 'success';
                    }
                    else if(usedScore < foughtScore){
                        
                        battle.result = 'loose'
                        battle.resultado = 'Derrota';
                        
                    }
                    else{
                        battle.result = 'tie'
                        battle.resultado = 'Empate';
                        
                    }

                    Swal.fire({
                        title: battle.resultado,
                        text: 'Continuar',
                        type: battle.type,
                        confirmButtonText: 'Ok'
                    }).then((success) => {
                        var urlBattleCreate = 'api/battles?api_token=' + this.user.api_token;
                        axios.post(urlBattleCreate, battle).then((response) => {
                            console.log(response);
                        })
                    });
                    // console.log(winner);
                }
                else{
                    Swal.fire({
                        title: 'No has elejido tu guerrero!',
                        text: 'Primero debes elegir tu guerrero para poder pelear.',
                        type: 'error',
                        confirmButtonText: 'OK'
                    });
                }
                

            },
            getWarriors() {
                let urlWarriors = 'api/warriors';
                axios.get(urlWarriors).then((response) =>{
                    console.log(response);
                    this.warriors = response.data.warriors;
                })
            },
            selectWarrior(warrior) {
                console.log(warrior);
                this.showModal = false;
                this.warriorUsed = warrior;
                this.randomSelect();
            },
            randomSelect(){
                let start = this.warriors[0].id;
                let end = this.warriors[this.warriors.length - 1].id;
                let random = Math.random(start , end );
                let pos =  Math.floor(random * 10);

                this.warriorFought = this.warriors[pos];

            }
        },
        created () {
        // this.initialize()
            this.user = JSON.parse(localStorage.getItem('user'));
        },
        mounted() {
            console.log(window.Laravel);
            this.getWarriors();
        }
    }
</script>
