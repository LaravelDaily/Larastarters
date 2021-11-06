const mix = require('laravel-mix')
// TODO: require('vuetifyjs-mix-extension')

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

// Vuetify scss and sass weback config
// eslint-disable-next-line no-undef
Mix.listen('configReady', config => {
  const scssRule = config.module.rules.find(r => r.test.toString() === /\.scss$/.toString())
  const scssOptions = scssRule.oneOf[0].use.find(l => l.loader.search('sass-loader') !== -1).options
  scssOptions.additionalData = '@import "./resources/styles/styles.scss";'

  const sassRule = config.module.rules.find(r => r.test.toString() === /\.sass$/.toString())
  const sassOptions = sassRule.oneOf[0].use.find(l => l.loader.search('sass-loader') !== -1).options
  sassOptions.additionalData = '@import "./resources/styles/styles.scss"'
})

mix.js('resources/js/app.js', 'public/js').vue()
  .postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('autoprefixer')
  ])
  .webpackConfig(require('./webpack.config'))

if (mix.inProduction()) {
  mix.version()
}
