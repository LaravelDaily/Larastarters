import { App, plugin } from '@inertiajs/inertia-vue'
import Vue from 'vue'
import { InertiaProgress } from '@inertiajs/progress'
import { Head, Link } from '@inertiajs/inertia-vue'
import vuetify from '@/plugins/vuetify'
import AdminLayout from '@/layouts/AdminLayout'
import store from './store'
import i18n from '@/i18n/i18n'
import '@/plugins/helpers'

Vue.mixin({ methods: { route } })

require('./bootstrap')

InertiaProgress.init({
  showSpinner: true,
  color: '#f88e2d'
})

Vue.use(plugin)

Vue.component('InertiaHead', Head)
Vue.component('InertiaLink', Link)

const el = document.getElementById('app')

new Vue({
  render: h => h(App, {
    props: {
      initialPage: JSON.parse(el.dataset.page),
      resolveComponent: name => import(`./pages/${name}`)
        .then(({ default: page }) => {
          page.layout = page.layout === undefined ? AdminLayout : page.layout
          return page
        })
    }
  }),
  vuetify,
  store,
  i18n
}).$mount(el)
