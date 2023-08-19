<template>
  <div class="about d-flex align-center">


    <v-app-bar app color="primary" dark>
      <div class="d-flex align-center">
        <v-btn color="whitte" icon to="/inicio">
          <v-icon>
            mdi-arrow-left-thick
          </v-icon>
        </v-btn>
      </div>
      <span class="headline font-weight-bold ">Acerca de</span>
      <v-spacer></v-spacer>

    </v-app-bar>

    <!-- APARTADO DE LAS CARDS DE LOS LUGARES DE LA UTR -->


    <v-container fluid>


      <v-row dense>
        <v-col>
          <div>
            <v-card max-width="375" class="mx-auto mt-2">

              <v-row class="fill-height">

                <v-card-title class="dark--text mt-4 ">
                  <div class="text-h5 pl-12 ">
                    Información del sistema
                  </div>
                </v-card-title>
              </v-row>

              <v-list two-line>
                <v-list-item>
                  <v-list-item-icon>
                    <v-icon color="indigo">
                      mdi-checkbox-marked
                    </v-icon>
                  </v-list-item-icon>

                  <v-list-item-content>
                    <v-list-item-title>Versión</v-list-item-title>
                    <v-list-item-subtitle>2.0</v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>
                <v-divider inset></v-divider>
                <v-list-item>
                  <v-list-item-icon>
                    <v-icon color="green">
                      mdi-android
                    </v-icon>
                  </v-list-item-icon>

                  <v-list-item-content>
                    <v-list-item-title>Terminal</v-list-item-title>
                    <v-list-item-subtitle>Android</v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>
                <v-divider inset></v-divider>
                <v-list-item three-line>
                  <v-list-item-icon>
                    <v-icon color="indigo">
                      mdi-dev-to
                    </v-icon>
                  </v-list-item-icon>

                  <v-list-item-content>
                    <v-list-item-title>Desarrollador</v-list-item-title>
                    <v-list-item-subtitle>
                      Eduardo Bladimir Góngora Segovia
                    </v-list-item-subtitle>
                    <v-list-item-subtitle class="mt-4">
                      Egresado de la carrera de Ingeniería en
                    </v-list-item-subtitle>
                    <v-list-item-subtitle>
                      gestión y desarrollo de software
                      de la Universidad Tecnológica
                      Regional del Sur.
                    </v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>
              </v-list>
            </v-card>
          </div>
        </v-col>
      </v-row>
      
    </v-container>






    <!--FINALIZA APARTADO DE LAS CARDS DE LOS LUGARES DE LA UTR -->




  </div>
</template>
<style scoped>
.about {
  background-color: white;
  max-width: 100%;
  max-height: 100%;

}
</style>
    
<script>
import axios from "axios";

export default {
  data() {
    return {
      drawer: null,
      show: false,
      imageUrl: '',
      dialog: false,
      operacion: '',
      overlay: false,
      loading5: false,
      loader: null,
      articulos: [],
      articulo: {
        id: null,
        descripcion: '',
        precio: '',
        stock: ''
      },


      switch1: false,



    }
  },
  created() {

  },
  methods: {

  },


}
</script>
  