import Vue from 'vue'

const Helpers = {
  install (Vue, options) {
    Vue.prototype.getUserRoute = (name, ...args) => route(`${route().current().split('.')[0]}.${name}`, ...args)
    Vue.prototype.can = (name, routeName) => {
      const can = Vue.prototype.$page.props.auth.can.find(can => can === name || can === 'superadmin')

      if (routeName) {
        const currentRoute = route().current().split('.')[0] + `.${routeName}`
        const routeExists = route().check(currentRoute)

        return can && routeExists
      }
      return can
    }
  }
}
Vue.use(Helpers)
