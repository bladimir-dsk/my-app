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
      <span class="headline font-weight-bold ">Filosofía Universitaria</span>
      <v-spacer></v-spacer>

    </v-app-bar>

    <!-- APARTADO DE LAS CARDS DE LOS LUGARES DE LA UTR -->


    <v-container fluid>
      <v-row dense>
        <v-col>
          <v-card>
            <v-tabs vertical>
              <!-- Itera sobre cada filosofia en filosofias -->
              <v-tab v-for="filosofia in filosofias" :key="filosofia.id" @click="changeTab(filosofia.id)">
                <v-icon left small>
                  {{ filosofia.icono }}
                </v-icon>
                {{ filosofia.nombre }}
              </v-tab>
             

              <!-- Crea un v-tab-item separado para cada filosofia -->
              <v-tab-item v-for="filosofia in filosofias" :key="filosofia.id">
                <v-card flat v-if="activeTab === filosofia.id">
                  <v-card-text>
                    <p>
                      {{ filosofia.descripcion }}
                    </p>
                  </v-card-text>
                </v-card>
              </v-tab-item>

            </v-tabs>
            <v-tabs vertical>
              <!-- Itera sobre cada filosofia en filosofias -->
              <v-tab @click="toggleInfo">
                <v-icon left small>
                  mdi-check-decagram
                </v-icon>
                Valores
              </v-tab>
  
              <v-tab-item>
                <v-card flat v-if="showInfo">
                  <v-card-text>
                    <div class="font-weight-bold ml-8 mb-2">
                      Valores
                    </div>
  
                    <v-timeline align-top dense>
                      <v-timeline-item v-for="message in messages" :key="message.time" :color="message.color" small>
                        <div>
                          <div class="font-weight-normal">
                            <strong>{{ message.from }}</strong>
                          </div>
                        </div>
                      </v-timeline-item>
                    </v-timeline>
                  </v-card-text>
                </v-card>
              </v-tab-item>
  
            </v-tabs>
          </v-card>
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
var url = "http://localhost/PaginaUtr/my-app/BACK/crud.php";
export default {
  data() {
    return {
      drawer: null,
      show: false,
      activeTab: null,
      imageUrl: '',
      dialog: false,
      operacion: '',
      overlay: false,
      loading5: false,
      loader: null,
      showInfo: false,
      filosofias: [],
      filosofia: {
        id: null,
        nombre: '',
        descripcion: '',
        icono: ''

      },
      messages: [
        {
          from: 'Honestidad',
          color: 'blue lighten-4',
        },
        {
          from: 'Confianza',
          color: 'blue lighten-3',
        },
        {
          from: 'Trabajo en Equipo',
          color: 'blue lighten-2',
        },
        {
          from: 'Igualdad',
          color: 'blue lighten-1',
        },
        {
          from: 'No Discriminación',
          color: 'blue darken-1',
        },
        {
          from: 'Respeto',
          color: 'blue darken-2',
        },
        {
          from: 'Formación Integral',
          color: 'blue darken-2',
        },
        {
          from: 'Respeto',
          color: 'blue darken-3',
        },
        {
          from: 'Integridad',
          color: 'blue darken-4',
        },
        {
          from: 'Liderazgo',
          color: 'blue darken-4',
        },
        {
          from: 'Transparencia y Rendición de cuentas',
          color: 'blue darken-4',
        },
      ],

      switch1: false,



    }
  },
  created() {
    this.mostrarfilosofia();
  },
  methods: {
    mostrarfilosofia: function () {
      axios.post(url, { opcion: 12 })
        .then(response => {
          this.filosofias = response.data;
          console.log(this.filosofias);
        })
    },
    toggleInfo() {
      // Cambiar el estado de la visibilidad de la información al hacer clic en la pestaña
      this.showInfo = !this.showInfo;
    },
    changeTab(tabId) {
      // Cambia la pestaña activa al hacer clic en una pestaña
      this.activeTab = tabId;
    },
  },


}
</script>
