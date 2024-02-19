<template>
  <v-container class="mt-16">
  
    <v-row class="text-center mt-16">
      <v-col cols="12">
        <v-img :src="require('../assets/UTR.png')" class="my-3 mt-16" contain height="200" :loading="loading5" :disabled="loading5" @click="loader = 'loading5'" />
      </v-col>

      <v-col class="mb-4">
        <h1 class="display-2 font-weight-bold mb-3">

        </h1>
      </v-col>

  


    </v-row>
  
  </v-container>
</template>

<script>


export default {
  name: 'HelloWorld',

  data: () => ({
    dialog: false,
    usuario: null,
    contraseña: null,
    loading5: true,
    loader: null,


  }),
  created() {
//quitar el comentario de this.validar para que inicie sola la aplicacion
  //this.validar();
},
  methods: {
    openDialog() {
      this.dialog = true;
    },
    validar() {
     
      window.location.href = '/inicio';
     


    },
    openAdmin() {

    }
  },
  watch: {
        loader() {
          const l = this.loader
          this[l] = !this[l]

          setTimeout(() => (this[l] = false), 7000)
          this.loader = null
          this.validar();
        },
      },
}
</script>
