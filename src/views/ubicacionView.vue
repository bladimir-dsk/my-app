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
            <span class="headline font-weight-bold ">Ubicación</span>
            <v-spacer></v-spacer>
           
        </v-app-bar>
      
        <!-- APARTADO DE LAS CARDS DE LOS LUGARES DE LA UTR -->


        <v-container fluid>
            <v-row dense>
                <v-col >
                   <div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3743.85615491362!2d-89.30636629166543!3d20.223297618885013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f57040d9fc05985%3A0x11cb8320e865f82c!2sUniversidad%20Tecnol%C3%B3gica%20Regional%20del%20Sur!5e0!3m2!1ses!2smx!4v1687735773426!5m2!1ses!2smx" width="100%" height="500px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </v-col>
            </v-row>

            <v-row dense>
                <v-col >
                   <div>
                    <v-banner two-line>
                        <v-avatar
                          slot="icon"
                          color="primary"
                          size="40"
                        >
                          <v-icon
                            icon="mdi-lock"
                            color="white"
                          >
                          mdi-warehouse
                          </v-icon>
                        </v-avatar>
                        UNIVERSIDAD TECNOLÓGICA REGIONAL DEL SUR
                        <br>
                        <span class="grey--text">Tekax Yucatán, México</span>
                      </v-banner>
                     
                      <v-banner two-line>
                        <v-avatar
                          slot="icon"
                          color="red"
                          size="40"
                        >
                          <v-icon
                            icon="mdi-lock"
                            color="white"
                          >
                          mdi-gmail
                          </v-icon>
                        </v-avatar>
                        <span class="titulo"> RECTORIA@UTREGIONALDELSUR.EDU.MX</span>
                       
                        <br>
                        <span class="grey--text">Tablaje Catastral # 792 Vía del Ferrocarril Mérida C.P. 97970</span>
                      </v-banner>
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

.titulo{
font-size: 15px;
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
  