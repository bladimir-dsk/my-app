<template>
  <div class="about">


    <v-app-bar app color="primary" dark>

   
      <span class="headline font-weight-bold ">Mis sitios UTR</span>
      <v-spacer></v-spacer>


    

      <v-tooltip bottom>
        <template v-slot:activator="{ on, attrs }">
          <v-btn icon :loading="loading5" :disabled="loading5" @click="loader = 'loading5'" color="whitte"
            v-bind="attrs" v-on="on">
            <v-icon>
              mdi-refresh
            </v-icon>
          </v-btn>
        </template>
        <span>Refrescar</span>
      </v-tooltip>
      <v-tooltip bottom>
        <template v-slot:activator="{ on, attrs }">
          <v-btn color="whitte" icon v-bind="attrs" v-on="on" @click="dialog=true">
            <v-icon>
              mdi-information
            </v-icon>
          </v-btn>
        </template>
        <span>Informacion</span>
      </v-tooltip>

    </v-app-bar>
    <!-- INICIO DE APARTADO DE ANUNCIOS UTR -->
    <v-container>
      <v-col cols="12" xs="12" sm="12" md="4" lg="3" xl="2">
       <v-container>
        <v-card>

        
          <v-carousel cycle hide-delimiter-background show-arrows-on-hover>
            <v-carousel-item v-for="image in images" :key="image.id" height="400" max-width="800px">

              <v-sheet height="100%" class="pr-0 mb-2">
                <v-row class="fill-height" align="center" justify="center">
                  <v-col>
                    <v-img class="shrink mr-2" :src="image.url" width="100%">
                    </v-img>
                  </v-col>
                  <v-col>
                    <h2 class="text-h6 primary--text ">
                      {{ image.name }}
                    </h2>
                    <span>{{image.des}}</span>
                  </v-col>
                </v-row>
              </v-sheet>
            </v-carousel-item>
          </v-carousel>
        </v-card>
        </v-container>
       
      </v-col>

    </v-container>
    <!-- FINALIZA APARTADO DE ANUNCIOS UTR -->
    <v-divider >

    </v-divider>
     <!-- APARTADO DE LAS CARDS DE LOS LUGARES DE LA UTR -->
     <v-container>
      <v-row dense class="pl-5">
        <v-col cols="6" xs="6" sm="6" md="3" lg="3" xl="2">
          <span>Sitios de la universidad</span>
        </v-col>
        <v-spacer></v-spacer>
        <v-col cols="4" xs="6" sm="6" md="3" lg="3" xl="2">
          <v-btn text
          color="primary" to="/utr">
            ver todos
          </v-btn>
        </v-col>
      </v-row>
     </v-container>
   
     
      
  

     <v-container grid-lis-md>

      <v-row dense >
        <v-hover class="" v-for="lugar in lugares" :key="lugar.id_lugar">
          <template v-slot:default="{ hover }">
            <v-col cols="12" xs="12" sm="3" md="3" lg="3" xl="2">
              <v-card class="mx-auto" max-width="344">
                <v-card-text>
                  <span class="text-h6 primary--text">
                    {{lugar.nombre}}
                  </span>
                </v-card-text>
                <v-fade-transition>
                  <v-overlay v-if="hover" absolute color="#036358" @click="refreshData()">
                  </v-overlay>
                </v-fade-transition>
              </v-card>
            </v-col>
          </template>
        </v-hover>

        </v-row>
  
    </v-container>

    <!--FINALIZA APARTADO DE LAS CARDS DE LOS LUGARES DE LA UTR -->
    <!--APARTADO DE CONFIGURACIONES DE NOTIFICACIONES -->
    <v-divider></v-divider>
    <v-container>
      <v-col cols="12" xs="12" sm="3" md="3" lg="3" xl="2">
        <span>Configuraciones de notificaciones</span>
        <v-card>
          <v-card-text>
            <v-switch
            v-model="ex11"
            label="Recibir notificaciones"
            color="info"
            value="info"
            hide-details
          ></v-switch>
          </v-card-text>
          
        </v-card>
        
      </v-col>
    </v-container>
    <!--FINALIZA APARTADO DE CONFIGURACIONES DE NOTIFICACIONES -->

    <!--DIALOG DE CREDITOS  -->
    <v-row justify="center">
      <v-dialog
        v-model="dialog"
        persistent
        max-width="290"
      >
       
        <v-card>
          <v-card-title class="textositio">
           Actualización de Mis sitios Utr
           
          </v-card-title>
          <v-card-title style="font-size: 20px, ; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
            Desarrollado por:
            
           </v-card-title>
          
          <v-card-text style="font-size: 15px"> <v-spacer>

          </v-spacer>
          <li>Eduardo Bladimir Gongora Segovia</li>
          <v-spacer class="mt-3">
          </v-spacer>
          <p>Egresado de la carrera de Ingeniería en gestion y desarrollo de software de la Universidad Tecnológica Regional del Sur.</p>
        </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn
              color="primary darken-1"
              text
              @click="dialog = false"
            >
              aceptar
            </v-btn>
         
          </v-card-actions>
        </v-card>
      </v-dialog>
    </v-row>
  

  </div>
</template>
<style scoped>
.about {
  background-color: white;
  max-width: 100%;
  max-height: 100%;

}
.textositio{
  font-size: 30px !important;
  font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}
</style>
  
<script>
import axios from "axios";
var url = "http://localhost/PaginaUtr/my-app/BACK/crud.php";
var img = "https://msu.utregionaldelsur.edu.mx/conexiones/obtener_fotografias.php";
export default {
 
  data() {
    return {
      drawer: null,
      show: false,
      dialog: false,
      articulos: [],
          imageUrl: '',
          dialog: false,
          operacion: '',
          overlay: false,
          loading5: false,
          loader: null,
          articulo: {
            id: null,
            descripcion: '',
            precio: '',
            stock: ''
          },
          lugar: {
            id_lugar: null,
            nombre: '',
            descripcion_general: '',
          },
          lugares: [],
          foto: [],
      anuncios: [],
      anuncio: {
        id_anuncio: null,
        ubicacion: '',
        titulo: '',
      },
      switch1: false,
      ex11: ['red', 'indigo', 'orange', 'primary', 'secondary', 'success', 'info', 'warning', 'error', 'red darken-3', 'indigo darken-3', 'orange darken-3'],
      items: [
        { title: 'Noticias', icon: 'mdi-newspaper-plus' },
        { title: 'Anuncios', icon: 'mdi-advertisements' },
      ],
      
      image: [],
      images: [
        {id: 1, des:'Estás frente una importante decisión y nosotros somos tu mejor alternativa.', url: "http://localhost/PaginaUtr/my-app/src/assets/anuncios/Inscripciones.jpg", name: 'Inscripciones Abiertas'},
        {id: 2, des:"En los tiempos actuales, las ingenierías representan una excelente alternativa para un futuro exitoso.", url: "http://localhost/PaginaUtr/my-app/src/assets/anuncios/Pq-Ing.jpg", name: '¿Porqué estudiar una Ingeniería?'}
      ]

    }
  },
  created() {

this.mostraranuncio();
this.mostrar();
this.mostrarfotos();
},
  methods: {
    mostraranuncio:function() {
      axios.post(url, { opcion: 7 })
        .then(response => {
          this.anuncios = response.data;
          console.log(this.anuncios);
        })
    },
    mostrar: function () {
          axios.post(url, { opcion: 5 })
            .then(response => {
              this.lugares = response.data;
              console.log(this.lugares);
            })
        },
        mostrarfotos: function () {
          axios.post(img)
            .then(response => {
              this.foto = response.data;
              console.log(this.foto);
            })
        },
        refreshData() {
          console.log(alert('jolss'));

           this.$router.push('/utr');

          if (this.lugar.id_lugar === 1) {
         this.$router.push('/utr');
          } else if (this.id_lugar === 2) {
         this.$router.push('/');
          }
        }

  },
  watch: {
        loader() {
          const l = this.loader
          this[l] = !this[l]

          setTimeout(() => (this[l] = false), 2000)
          this.loader = null
          this.mostrar();
        },
      },
  
}
</script>
