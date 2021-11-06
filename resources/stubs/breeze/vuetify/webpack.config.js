const path = require('path')
const VuetifyLoaderPlugin = require('vuetify-loader/lib/plugin')
const ESLintPlugin = require('eslint-webpack-plugin')

module.exports = {
  resolve: {
    alias: {
      '@': path.resolve('resources/js')
    }
  },
  plugins: [
    new VuetifyLoaderPlugin({
      progressiveImages: true
    }),
    new ESLintPlugin()
  ]
}
