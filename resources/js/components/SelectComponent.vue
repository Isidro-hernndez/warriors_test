<template>
    <!-- <div class="mb-2 bg-white text-dark justify-content-md-center">
        <h3>Selecciona tu guerrero</h3>
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
    <transition name="modal">
        <div class="modal-mask">
          <div class="modal-wrapper">
            <div class="modal-container"> 
                <div class="modal-header">
                    <slot name="header" class="justify-content-md-center">
                        <button class="btn btn-warning" @click="$emit('close')">
                            Cancelar
                          </button>
                    </slot>
                  </div>  
              <div class="modal-body">
                <slot name="body">
                    <div class="row">
                        
                        <div class="col-md-2" v-for="warrior in warriors"  >
                            <div class="card">
                                <div class="card-body">
                                    <img src="https://picsum.photos/30?random" class="img-thumbnail" alt="Image Warrior">
                                </div>
                                <div class="card-footer text-center">
                                    <button class="btn btn-secondary" @click="$emit('select-warrior', warrior)" data-toggle="tooltip" data-placement="top" v-bind:title="'Speed: ' + warrior.speed + ' Skills: ' + warrior.skills + ' Strength: ' + warrior.strength">{{warrior.name}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </slot>
              </div>
    
              <div class="modal-footer">
                <slot name="footer">
                  default footer
                  <button class="modal-default-button" @click="$emit('close')">
                    OK
                  </button>
                </slot>
              </div>
            </div>
          </div>
        </div>
      </transition>
</template>

<script>
export default {
  props: {
    warriors: Array,
  },
  data () {
    return {

    }
  },
  methods: {

  }
}
</script>

<style>
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  transition: opacity .3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}

.modal-container {
  width: 80%;
  margin: 0px auto;
  /* padding: 10px 15px; */
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
  transition: all .3s ease;
  font-family: Helvetica, Arial, sans-serif;
}

.modal-header h3 {
  margin-top: 0;
  color: #42b983;
}

.modal-body {
  /* margin: 20px 0; */
}

.modal-default-button {
  float: right;
}

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter {
  opacity: 0;
}

.modal-leave-active {
  opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
</style>