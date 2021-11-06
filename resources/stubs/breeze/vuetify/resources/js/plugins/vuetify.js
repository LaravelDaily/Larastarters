import Vue from 'vue'
import 'vuetify/dist/vuetify.min.css'
import Vuetify from 'vuetify'

Vue.use(Vuetify)

export default new Vuetify({
  theme: {
    themes: {
      light: {
        primary: '#001e4f',
        secondary: '#f88e2d',
        accent: '#8c9eff',
        error: '#b71c1c'
      }
    }
  }
})
