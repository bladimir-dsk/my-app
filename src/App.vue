<template>
  <v-app>
    

    <v-main>
      <router-view/>
    </v-main>
  </v-app>
</template>
<style scoped>
    .about{
        background-color: black;

    }
  </style>
<script>

export default {
  name: 'App',

  data: () => ({
    //
    dialog: false,
  }),
};
</script>
