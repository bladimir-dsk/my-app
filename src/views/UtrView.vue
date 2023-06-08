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
        </v-app-bar>
      
        <!-- APARTADO DE LAS CARDS DE LOS LUGARES DE LA UTR -->


        <v-container fluid>
            <v-row dense>
                <v-col cols="12" xs="12" sm="12" md="3" lg="3" xl="2">
                    <v-card class="mx-auto mt-3" max-width="344" v-for="lugar in lugares" :key="lugar.id_lugar">
                        <v-carousel cycle height="400" max-width="800px" hide-delimiter-background show-arrows-on-hover>
                            <v-carousel-item v-for="anuncio in anuncios" :key="anuncio.id_anuncio" height="400"
                                max-width="800px">
                                <v-sheet height="100%">
                                    <v-row class="fill-height" align="center" justify="center">
                                        <v-img :src="require('../assets/UTR.png')" class="shrink mr-2" width="100%">
                                        
                                        </v-img>

                                    </v-row>
                                </v-sheet>
                            </v-carousel-item>
                        </v-carousel>
                        <v-list-item three-line>
                            <v-list-item-content>
                                <v-list-item-title class="text-h6 primary--text mb-1">
                                    {{ lugar.nombre }}
                                </v-list-item-title>
                                <span class="mt-3 grey--text">{{ lugar.descripcion_general }}</span>
                            </v-list-item-content>
                        </v-list-item> 
                            <v-expansion-panels accordion>
                                <v-expansion-panel>
                                    <v-expansion-panel-header>{{lugar.tipo}}</v-expansion-panel-header>
                                    <v-expansion-panel-content>
                                        {{lugar.descripcion_tipo }}
                                    </v-expansion-panel-content>
                                </v-expansion-panel>
                            </v-expansion-panels>
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
            lugar: {
                id_lugar: null,
                nombre: '',
                descripcion_general: '',
                tipo: '',
                descripcion_tipo: '',
                imagenes: '',


            },
            lugares: [],
            anuncios: [],
            anuncio: {
                id_anuncio: null,
                ubicacion: '',
                titulo: '',
            },
            estructuras: [],
            estructura: {
                id_descripcion: null,
                lugares_id_lugar: '',
                id_lugar: '',
                titulo: '',
                descripcion: ''
            },
            switch1: false,

            items: [
                { title: 'Noticias', icon: 'mdi-newspaper-plus' },
                { title: 'Anuncios', icon: 'mdi-advertisements' },
            ],
            

        }
    },
    created() {

        this.mostraranuncio();
        this.mostrar();
        this.mostrardescripcion();
    },
    methods: {
        mostraranuncio: function () {
            axios.post(url, { opcion: 7 })
                .then(response => {
                    this.anuncios = response.data;
                    console.log(this.anuncios);
                })
        },
        mostrardescripcion: function () {
            axios.post(url, { opcion: 8 })
                .then(response => {
                    this.estructuras = response.data;
                    console.log(this.estructuras);
                })
        },
        mostrar: function () {
            axios.post(url, { opcion: 5 })
                .then(response => {
                    this.lugares = response.data;
                    console.log(this.lugares);
                })
        },
        refreshData() {
            console.log(alert('jolss'));
        }

    },
    watch: {
        loader() {
            const l = this.loader
            this[l] = !this[l]

            setTimeout(() => (this[l] = false), 3000)
            this.loader = null
            this.mostrar();
            this.mostrardescripcion();
        },
    },

}
</script>
  