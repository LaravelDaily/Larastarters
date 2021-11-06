<template>
  <v-navigation-drawer
    v-model="$store.state.drawer"
    color="primary lighten-1"
    src="https://wallpaperaccess.com/full/24243.jpg"
    app
    clipped
    floating
    dark
    :right="$page.props.locale === 'ar'"
  >
    <template #img="props">
      <v-img
        gradient="to bottom, rgba(0, 59, 156, .7), rgba(0, 30, 79, .7)"
        v-bind="props"
      />
    </template>
    <template v-for="(group, index) in menuItems">
      <v-divider
        v-if="group.divider"
        :key="`${index}-divider`"
      />
      <v-list
        :key="index"
        nav
      >
        <v-subheader v-if="group.title">
          {{ group.title }}
        </v-subheader>
        <template v-for="item in group.items">
          <v-list-item
            v-if="checkMenuItemCondition(item)"
            :key="item.text"
            :href="getUserRoute(item.link)"
            :class="route().current(getWildcard(getRouteName(item.link))) ? 'v-list-item--active' : ''"
            @click.prevent="go(getUserRoute(item.link))"
          >
            <v-list-item-icon>
              <v-icon v-text="item.icon" />
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>
                {{ item.text }}
              </v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </template>
      </v-list>
    </template>

    <!-- Team Switcher -->
    <v-divider />

    <v-list
      flat
      nav
    />

    <!-- Authentication -->
    <template #append>
      <v-list
        nav
      >
        <v-list-item>
          <v-list-item-content>
            <form @submit.prevent="logout">
              <v-btn
                block
                color="primary"
                type="submit"
              >
                <v-icon v-text="'mdi-logout'" />
                {{ $t('auth.logout') }}
              </v-btn>
            </form>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </template>
  </v-navigation-drawer>
</template>

<script>
export default {
  data () {
    return {
      menuItems: [
        {
          divider: true,
          title: this.$t('nav.general.title'),
          items: [
            {
              text: this.$t('nav.general.dashboard'),
              link: 'dashboard',
              icon: 'mdi-view-dashboard'
            }
          ]
        }
      ]
    }
  },
  methods: {
    /**
     * Checks if menu item has condition
     *
     * @param {object} item - Navigation item
     * @param {Boolean?} item.condition - Display condition
     * @returns {Boolean} Whether menu item should be shown or not
     */
    checkMenuItemCondition: item => {
      let visible = true

      if (Object.prototype.hasOwnProperty.call(item, 'condition')) {
        visible = item.condition
      }

      return visible
    },
    logout () {
      this.$inertia.post(route('logout'))
    },
    go (link) {
      this.$inertia.visit(link)
    },
    getWildcard (link) {
      return `${link.split('.')[0]}.${link.split('.')[1]}*`
    },
    getRouteName (name) {
      return `${route().current().split('.')[0]}.${name}`
    }
  }
}
</script>
