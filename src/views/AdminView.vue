<template>
  <div class="about">


    <v-app-bar app color="primary" dark>

      
          <v-btn color="whitte" icon  @click.stop="drawer = !drawer">
            <v-icon>
              mdi-menu
            </v-icon>
          </v-btn>
        
      <span class="headline font-weight-bold ">Ingenierías UTR</span>
      <v-spacer></v-spacer>
      <v-tooltip bottom>
        <template v-slot:activator="{ on, attrs }">
          <v-btn icon :loading="loading5" :disabled="loading5" @click="loader = 'loading5'" color="whitte" v-bind="attrs"
            v-on="on">
            <v-icon>
              mdi-refresh
            </v-icon>
          </v-btn>
        </template>
        <span>Refrescar</span>
      </v-tooltip>
   


    </v-app-bar>

    <v-navigation-drawer v-model="drawer" absolute temporary app style="position: fixed;">
    

      <v-list nav
      dense>
        <v-list-item  link  to="/filosofia">
          <v-list dense>
            <v-list-item>
              <v-list-item-icon>
                <v-icon>mdi-school</v-icon>
              </v-list-item-icon>
    
              <v-list-item-content>
                <v-list-item-title>Filosofía Universitaria</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list>
        </v-list-item>
      </v-list>
      <v-list dense>
        <v-list-item  link to="/ubicacion">
          <v-list dense>
            <v-list-item>
              <v-list-item-icon>
                <v-icon>mdi-google-maps</v-icon>
              </v-list-item-icon>
    
              <v-list-item-content>
                <v-list-item-title>Ubicación</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list>
        </v-list-item>
      </v-list>
      <v-list dense>
        <v-list-item  link to="/acerca">
          <v-list dense>
            <v-list-item>
              <v-list-item-icon>
                <v-icon>mdi-bookmark-outline</v-icon>
              </v-list-item-icon>
    
              <v-list-item-content>
                <v-list-item-title>Acerca de</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list>
        </v-list-item>
      </v-list>
      <v-divider></v-divider>
  

    <v-list
      flat
      subheader
      three-line
    >
      <v-subheader>General</v-subheader>
      <v-list-item-group
      v-model="settings"
      multiple
      active-class=""
    >
      <v-list-item>
        <template v-slot:default="{ active }">
          <v-list-item-action>
            <v-checkbox :input-value="active"></v-checkbox>
          </v-list-item-action>

          <v-list-item-content>
            <v-list-item-title>Notificaciones</v-list-item-title>
            <v-list-item-subtitle>Notificarme sobre actualizaciones de la app.</v-list-item-subtitle>
          </v-list-item-content>
        </template>
      </v-list-item>

      <div>
        <v-list-item>
          <v-list-item-action>
            <v-checkbox v-model="actualizacionAutomatica"></v-checkbox>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Actualizar</v-list-item-title>
            <v-list-item-subtitle>Actualización automática de datos.</v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>
      </div>
      <v-divider></v-divider>
      <div class="text-center mt-10 pa-2">
        <v-btn
        block
        @click="salir"
        color="primary"
        dark
        >
          Salir
        </v-btn>
      </div>

    
    </v-list-item-group>
      
    </v-list>
           

    </v-navigation-drawer>
    <!-- INICIO DE APARTADO DE ANUNCIOS UTR -->

    <v-col >
      <v-container>
        <v-card class="mx-auto">
          <v-col cols="12" xs="12" sm="12" md="12" lg="12" xl="12">

            <v-toolbar flat>
              <v-tabs v-model="tabs" fixed-tabs icons-and-text>
                <v-tabs-slider></v-tabs-slider>
                <v-tab href="#mobile-tabs-5-1" class="primary--text">
                  Anuncios
                  <v-icon>mdi-bell</v-icon>
                </v-tab>
                <v-tab href="#mobile-tabs-5-2" class="primary--text">
                  Sitios
                  <v-icon>mdi-town-hall</v-icon>
                </v-tab>
                <v-tab href="#mobile-tabs-5-3" class="primary--text">
                  Galeria
                  <v-icon>mdi-image-multiple</v-icon>
                </v-tab>
              </v-tabs>
            </v-toolbar>

            <v-tabs-items v-model="tabs">
              <v-tab-item :value="'mobile-tabs-5-3'">
                <v-container fluid>
                  <v-row dense>
                    <v-col v-for="img in imgs" :key="img.id" :cols="img.flex"  xs="6" sm="6" md="6" lg="4" xl="4">
                      <v-card>
                        <v-img
                          :src="`http://localhost/apis/vistas/galeria/${img.nombre_imagen}`"
                          class="white--text align-end"
                          gradient="to bottom, rgba(0,0,0,.2), rgba(0,0,0,.7)"
                          height="200px"
                          @click="openImage(img)"
                        >
                          <v-card-subtitle >{{img.nombre}}</v-card-subtitle>
                        </v-img>
                      </v-card>
                    </v-col>
                  </v-row>
                
                  <v-dialog v-model="dialogVisible" >
                    <v-card>
                     
                        <v-img  :src="selectedImage" aspect-ratio="1"></v-img>
                     
                    </v-card>
                  </v-dialog>
                </v-container>
                
                
              </v-tab-item>
            </v-tabs-items>

            <v-tabs-items v-model="tabs">
              <v-tab-item :value="'mobile-tabs-5-1'">
                <v-card flat height="100%" class="pr-0 mb-2 fill-height">
                  <v-carousel cycle hide-delimiter-background show-arrows-on-hover flat height="100%"
                    class="pr-0 mb-2 fill-height">
                    <v-carousel-item  v-for="anuncio in anuncios" :key="anuncio.id_anuncio" height="400">
                      <v-sheet height="100%" class="pr-0 mb-2 fill-height">
                        <v-row class="fill-height" align="center" justify="center">
                          <v-col>
                            <v-img class="shrink mr-2" :src="`http://localhost/apis/vistas/anuncios/${anuncio.nombre_imagen}`"></v-img>
                          </v-col>
                          <v-col>
                            <h2 class="text-h6 primary--text">{{ anuncio.titulo }}</h2>
                            <span>{{ anuncio.descripcion }}</span>
                          </v-col>
                        </v-row>
                      </v-sheet>
                    </v-carousel-item>
                  </v-carousel>
                </v-card>
              </v-tab-item>
            </v-tabs-items>

            <v-tabs-items v-model="tabs">
              <v-tab-item :value="'mobile-tabs-5-2'">
                <v-card flat height="100%" class="pr-0 mb-2 fill-height">
                  <v-expansion-panels height="100%" class="pr-0 mb-2 fill-height" focusable>
                    <v-expansion-panel v-for="lugar in lugares" :key="lugar.id">
                      <v-expansion-panel-header class="text-h6 primary--text">{{ lugar.nombre }}</v-expansion-panel-header>
                      <v-expansion-panel-content>
                        <div>
                          <v-img
                            contain
                            max-height="100%"
                            max-width="100%"
                            :src="`http://localhost/apis/vistas/lugares/${lugar.imagen}`"
                          ></v-img>
                                                

                          <v-card-title>
                            {{ lugar.nombre }}
                          </v-card-title>

                          <v-card-subtitle class="mt-3 grey--text">
                            {{ lugar.descripcion }}
                          </v-card-subtitle>

                          <v-card-actions>
                            <span color="orange lighten-2" text>
                              {{ lugar.tipo }}
                            </span>

                            <v-spacer></v-spacer>

                            <v-btn icon @click="show = !show">
                              <v-icon>{{ show ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
                            </v-btn>
                          </v-card-actions>

                          <v-expand-transition>
                            <div v-show="show">
                              <v-divider></v-divider>

                              <v-card-text class="mt-3 grey--text">
                                {{ lugar.tipo_descripcion }}
                              </v-card-text>
                            </div>
                          </v-expand-transition>
                        </div>
                      </v-expansion-panel-content>
                    </v-expansion-panel>
                  </v-expansion-panels>
                </v-card>
              </v-tab-item>
            </v-tabs-items>
          </v-col>
        </v-card>
      </v-container>
    </v-col>

    <!-- FINALIZA APARTADO DE ANUNCIOS UTR -->
    
   

  </div>
</template>
<style scoped>
.about {
  background-color: white;
  max-width: 100%;
  max-height: 100%;

}

.textositio {
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
      items: [
        { title: 'Home', icon: 'mdi-view-dashboard' },
        { title: 'About', icon: 'mdi-forum' },
      ],
      settings: [],
      group: null,
      show: false,
      show: false,
      dialogVisible: false,
      selectedImage: '',
      dialog: false,
      articulos: [],
      imageUrl: '',
      dialog: false,
      operacion: '',
      overlay: false,
      loading5: false,
      loader: null,
      actualizacionAutomatica: false,
      articulo: {
        id: null,
        descripcion: '',
        precio: '',
        stock: ''
      },
      lugar: {
        id_lugar: null,
        nombre: '',
        descripcion: '',
        imagen: '',
        tipo: '',
        tipo_descripcion: ''
      },
      lugares: [],
      img: {
        id: null,
        nombre_imagen: '',
        nombre: ''
      },
      imgs: [],
      f: {
        id_fotografia: null,
        lugares_id_lugar: null,
        ubicacion: '',
        id_lugar: null,
        
      },
      ft: [],
      
      foto: [],
      anuncios: [],
      anuncio: {
        id: null,
        nombre_imagen: '',
        titulo: '',
        descripcion: '',
      },
     
      
      switch1: false,
      ex11: ['red', 'indigo', 'orange', 'primary', 'secondary', 'success', 'info', 'warning', 'error', 'red darken-3', 'indigo darken-3', 'orange darken-3'],
     

     
      tabs: null,
      text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
      texto: "hola",
    }
  },
  mounted() {
    // Obtener las imágenes desde tu API y asignarlas a la variable imgs
    this.fetchImages();
  },
  created() {

    this.mostraranuncio();
    this.mostrar();
    this.mostrargaleria();
    this.actualizarDatos();
    },
  methods: {
    mostraranuncio: function () {
      axios.post(url, { opcion: 10 })
        .then(response => {
          this.anuncios = response.data;
          console.log(this.anuncios);
        })
    },
    mostrar: function () {
      axios.post(url, { opcion: 11 })
        .then(response => {
          this.lugares = response.data;
          console.log(this.lugares);
        })
    },
    mostrargaleria: function () {
      axios.post(url, { opcion: 13 })
        .then(response => {
          this.imgs = response.data;
          console.log(this.imgs);
        })
    },
    fetchImages() {
      // Realizar la solicitud a tu API para obtener las imágenes
      // y asignarlas a la variable imgs
      // Ejemplo:
      axios.get('http://localhost/apis/vistas/galeria')
        .then(response => {
          this.imgs = response.data;
        })
        .catch(error => {
          console.error(error);
        });
    },
    openImage(img) {
      this.selectedImage = `http://localhost/apis/vistas/galeria/${img.nombre_imagen}`;
      this.dialogVisible = true;
    },
    getImageAspectRatio(imageUrl) {
    const img = new Image();
    img.src = imageUrl;
    const aspectRatio = img.width / img.height;
    return aspectRatio;
  },
  actualizarRecursos() {
      if (this.actualizacionAutomatica) {
        // Realizar la lógica de actualización de recursos aquí
        console.log("Recursos actualizados automáticamente");
        this.mostraranuncio();
    this.mostrar();
    this.mostrargaleria();
      }
    },
    actualizarDatos() {
      // Lógica de actualización de datos
      this.mostrar();
      this.mostrargaleria();
      this.mostraranuncio();
    },
  salir() {
      // Redirigir a la pantalla de inicio del teléfono
      window.location.href = "tel:home";
    },

   

  },
  computed: {
    imageURL() {
      return `${this.imagePath}${this.anuncio.ubicacion}`;
    }
  },
  watch: {
    loader() {
      const l = this.loader
      this[l] = !this[l]

      setTimeout(() => (this[l] = false), 2000)
      this.loader = null
      this.mostrar();
      this.mostrargaleria();
    this.mostraranuncio();
    },
    actualizacionAutomatica: {
      immediate: true,
      handler(newValue) {
        if (newValue) {
          // Lógica de actualización de datos aquí
          this.actualizarDatos();
        }
      }
    },
    group() {
      this.drawer = false
    },
  },

}
</script>
