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
           
        </v-app-bar>
      
        <!-- APARTADO DE LAS CARDS DE LOS LUGARES DE LA UTR -->


        <v-container fluid>
            <v-row dense>
                <v-col >

                    <div                                 v-if="!selected"
                    class="text-h6 grey--text text--lighten-1 font-weight-light"
                    style="align-self: center;">

                    </div>
                    <v-card flat height="100%" class="pr-0 mb-2 fill-height" v-else
                    :key="selected.id">
                        <v-expansion-panels height="100%" class="pr-0 mb-2 fill-height"  >
                          <v-expansion-panel v-for="lugar in lugares" :key="lugar.id_lugar">
                            <v-expansion-panel-header class="text-h6 primary--text">{{ lugar.nombre }}</v-expansion-panel-header>
                            <v-expansion-panel-content>
                              <div>
                                <v-carousel cycle hide-delimiter-background show-arrows-on-hover flat height="100%"
                                  class="pr-0 mb-2 fill-height">
                                  <v-carousel-item v-for="f in ft" :key="f.id_fotografia" height="400">
                                    <v-sheet height="100%" class="pr-0 mb-2 fill-height">
                                      <v-row class="fill-height" align="center" justify="center">
                                        <v-col>
                                          <v-img class="shrink mr-2" :src="`http://localhost/PaginaUtr/my-app/src/assets/lugares/${f.ubicacion}`"></v-img>
                                        </v-col>
                                      </v-row>
                                    </v-sheet>
                                  </v-carousel-item>
                                </v-carousel>
      
                                <v-card-title>
                                  {{ lugar.nombre }}
                                </v-card-title>
      
                                <v-card-subtitle class="mt-3 grey--text">
                                  {{ lugar.descripcion_general }}
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
                                      {{ lugar.descripcion_tipo }}
                                    </v-card-text>
                                  </div>
                                </v-expand-transition>
                              </div>
                            </v-expansion-panel-content>
                          </v-expansion-panel>
                        </v-expansion-panels>
                      </v-card>
                    <v-card>
                        <v-card-title class="indigo white--text text-h5">
                          User Directory
                        </v-card-title>
                        <v-row
                          class="pa-4"
                          justify="space-between"
                        >
                          <v-col cols="5">
                            <v-treeview
                              :active.sync="active"
                              :items="items"
                              :load-children="fetchUsers"
                              :open.sync="open"
                              activatable
                              color="warning"
                              open-on-click
                              transition
                            >
                              <template v-slot:prepend="{ item }">
                                <v-icon v-if="!item.children">
                                  mdi-account
                                </v-icon>
                              </template>
                            </v-treeview>
                          </v-col>
                    
                          <v-divider vertical></v-divider>
                    
                          <v-col
                            class="d-flex text-center"
                          >
                            <v-scroll-y-transition mode="out-in">
                              <div
                                v-if="!selected"
                                class="text-h6 grey--text text--lighten-1 font-weight-light"
                                style="align-self: center;"
                              >
                                Select a User
                              </div>
                              <v-card
                                v-else
                                :key="selected.id"
                                class="pt-6 mx-auto"
                                flat
                                max-width="400"
                              >
                                <v-card-text>
                                  <v-avatar
                                    v-if="avatar"
                                    size="88"
                                  >
                                    <v-img
                                      :src="`https://avataaars.io/${avatar}`"
                                      class="mb-6"
                                    ></v-img>
                                  </v-avatar>
                                  <h3 class="text-h5 mb-2">
                                    {{ selected.name }}
                                  </h3>
                                  <div class="blue--text mb-2">
                                    {{ selected.email }}
                                  </div>
                                  <div class="blue--text subheading font-weight-bold">
                                    {{ selected.username }}
                                  </div>
                                </v-card-text>
                                <v-divider></v-divider>
                                <v-row
                                  class="text-left"
                                  tag="v-card-text"
                                >
                                  <v-col
                                    class="text-right mr-4 mb-2"
                                    tag="strong"
                                    cols="5"
                                  >
                                    Company:
                                  </v-col>
                                  <v-col>{{ selected.company.name }}</v-col>
                                  <v-col
                                    class="text-right mr-4 mb-2"
                                    tag="strong"
                                    cols="5"
                                  >
                                    Website:
                                  </v-col>
                                  <v-col>
                                    <a
                                      :href="`//${selected.website}`"
                                      target="_blank"
                                    >{{ selected.website }}</a>
                                  </v-col>
                                  <v-col
                                    class="text-right mr-4 mb-2"
                                    tag="strong"
                                    cols="5"
                                  >
                                    Phone:
                                  </v-col>
                                  <v-col>{{ selected.phone }}</v-col>
                                </v-row>
                              </v-card>
                            </v-scroll-y-transition>
                          </v-col>
                        </v-row>
                      </v-card>
                      <div>
                        <v-carousel cycle hide-delimiter-background show-arrows-on-hover flat height="400px">
                          <v-carousel-item v-for="imagen in imagenes" :key="imagen.id">
                            <v-img  v-if="imagen.idPersona === idPersona" :src="imagen.url" alt="Imagen relacionada"></v-img>
                          </v-carousel-item>
                        </v-carousel>
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
var url = "http://localhost/PaginaUtr/my-app/BACK/crud.php";

  const avatars = [
    '?accessoriesType=Blank&avatarStyle=Circle&clotheColor=PastelGreen&clotheType=ShirtScoopNeck&eyeType=Wink&eyebrowType=UnibrowNatural&facialHairColor=Black&facialHairType=MoustacheMagnum&hairColor=Platinum&mouthType=Concerned&skinColor=Tanned&topType=Turban',
    '?accessoriesType=Sunglasses&avatarStyle=Circle&clotheColor=Gray02&clotheType=ShirtScoopNeck&eyeType=EyeRoll&eyebrowType=RaisedExcited&facialHairColor=Red&facialHairType=BeardMagestic&hairColor=Red&hatColor=White&mouthType=Twinkle&skinColor=DarkBrown&topType=LongHairBun',
    '?accessoriesType=Prescription02&avatarStyle=Circle&clotheColor=Black&clotheType=ShirtVNeck&eyeType=Surprised&eyebrowType=Angry&facialHairColor=Blonde&facialHairType=Blank&hairColor=Blonde&hatColor=PastelOrange&mouthType=Smile&skinColor=Black&topType=LongHairNotTooLong',
    '?accessoriesType=Round&avatarStyle=Circle&clotheColor=PastelOrange&clotheType=Overall&eyeType=Close&eyebrowType=AngryNatural&facialHairColor=Blonde&facialHairType=Blank&graphicType=Pizza&hairColor=Black&hatColor=PastelBlue&mouthType=Serious&skinColor=Light&topType=LongHairBigHair',
    '?accessoriesType=Kurt&avatarStyle=Circle&clotheColor=Gray01&clotheType=BlazerShirt&eyeType=Surprised&eyebrowType=Default&facialHairColor=Red&facialHairType=Blank&graphicType=Selena&hairColor=Red&hatColor=Blue02&mouthType=Twinkle&skinColor=Pale&topType=LongHairCurly',
  ]

  const pause = ms => new Promise(resolve => setTimeout(resolve, ms))

  export default {
    data: () => ({
      active: [],
      avatar: null,
      open: [],
      users: [],
      show: false,
  
      imagenes: [
        { id: 1, idPersona: 1, url: 'https://media.revistagq.com/photos/5d5130eef1043a000920d7de/16:9/pass/los%20simpson.jpg' },
        { id: 2, idPersona: 1, url: 'https://tentulogo.com/wp-content/uploads/2018/11/cabecera-dibujos-animados.jpg' },
        { id: 3, idPersona: 2, url: 'https://previews.123rf.com/images/hermandesign2015/hermandesign20151608/hermandesign2015160800067/61077118-dibujo-animado-lindo-del-ping%C3%BCino-que-agita.jpg' },
      ],
      idPersona: 2, // El ID de la persona para mostrar las imágenes relacionadas
    
      lugar: {
        id_lugar: null,
        nombre: '',
        descripcion_general: '',
        ubicacion: '',
        titulo: '',
        descripcion: ''
      },
      lugares: [],

      f: {
        id_fotografia: null,
        lugares_id_lugar: null,
        ubicacion: ''
      },
      ft: [],

    }),
    created() {


this.mostrar();


this.mostrarfotografia();

},
    computed: {
      items () {
        return [
          {
            name: 'Users',
            children: this.users,
          },
        ]
      },
     
      selected () {
        if (!this.active.length) return undefined

        const id = this.active[0]

        return this.users.find(user => user.id === id)
      },
    },

    watch: {
      selected: 'randomAvatar',
    },

    methods: {
      async fetchUsers (item) {
        // Remove in 6 months and say
        // you've made optimizations! :)
        await pause(1500)

        return fetch('https://jsonplaceholder.typicode.com/users')
          .then(res => res.json())
          .then(json => (item.children.push(...json)))
          .catch(err => console.warn(err))
      },
      randomAvatar () {
        this.avatar = avatars[Math.floor(Math.random() * avatars.length)]
      },
      mostrar: function () {
      axios.post(url, { opcion: 8 })
        .then(response => {
          this.lugares = response.data;
          console.log(this.lugares);
        })
    },
    mostrarfotografia: function () {
      axios.post(url, { opcion: 9 })
        .then(response => {
          this.ft = response.data;
          console.log(this.ft);
        })
    },
    },
  }
</script>

  