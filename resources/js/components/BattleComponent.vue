<template>
    <div class="container">
        <div class="container-fluid">
        <div class="row justify-content-md-center">
            <!-- Start first warrior -->
            <div class="col-md-4 col-xs-offset-2">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>{{warriorUsed.name}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img src="https://picsum.photos/300?random" class="img-thumbnail" alt="Image First Warrior">
                        </div>
                    </div>
                    <div class="card-footer">
                        Speed: {{warriorUsed.speed}}
                        Skills: {{warriorUsed.skills}}
                        Strenght: {{warriorUsed.strength}}
                    </div>
                </div>
            </div>
            <!-- End First warrior -->

            <!-- Start second Warrior -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>{{warriorFought.name}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img src="https://picsum.photos/300?random" class="img-thumbnail" alt="Image Second Warrior">
                        </div>
                    </div>
                    <div class="card-footer">
                            Speed: {{warriorFought.speed}}
                            Skills: {{warriorFought.skills}}
                            Strenght: {{warriorFought.strength}}
                    </div>
                </div>
            </div>
            <!-- End Second Warrior -->
        </div>
    </div>

    <div class="mx-auto py-1" style="width: 200px;">
        <button class="btn btn-block btn-primary">fight</button>
    </div>
    <!-- Start warriors Select -->
    <div class="mb-2 bg-white text-dark">
        <div class="row">
            <div class="col-md-2" v-for="warrior in warriors" pb-1 >
                <div class="card">
                    <div class="card-body">
                        <img src="https://picsum.photos/100?random" class="img-thumbnail" alt="Image Warrior">
                    </div>
                    <div class="card-footer text-center">
                        <button class="btn btn-secondary" v-on:click="selectWarrior(warrior)">{{warrior.name}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Warriors Select -->
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        components:{
        },
        data: () => ({
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
            getWarriors() {
                let urlWarriors = 'api/warriors';
                axios.get(urlWarriors).then((response) =>{
                    console.log(response);
                    this.warriors = response.data.warriors;
                })
            },
            selectWarrior(warrior) {
                console.log('warrior');
                this.warriorUsed = warrior;
            }
        },
        created () {
        // this.initialize()
        },
        mounted() {
            console.log('montado perro');
            this.getWarriors();
        }
    }
</script>
