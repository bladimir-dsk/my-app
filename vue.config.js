const { defineConfig } = require('@vue/cli-service');

module.exports = defineConfig({
  transpileDependencies: [
    'vuetify'
  ],

  publicPath: '/my-app',

  pluginOptions: {
    cordovaPath: 'utrsur'
  }
});
