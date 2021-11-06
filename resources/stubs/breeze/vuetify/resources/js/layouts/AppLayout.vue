<template>
  <v-app>
    <v-app-bar
      app
      color="primary"
      dark
    >
      <v-container>
        <v-toolbar-title>{{ $page.props.app.name }}</v-toolbar-title>
        <v-spacer />
      </v-container>
    </v-app-bar>

    <!-- Sizes your content based upon application components -->
    <v-main>
      <!-- Provides the application the proper gutter -->
      <slot />
    </v-main>

    <v-footer
      app
      small
    >
      &copy; {{ new Date().getFullYear() }} Infinite Info
    </v-footer>
  </v-app>
</template>

<script>
export default {

  data () {
    return {
      showingNavigationDropdown: false
    }
  },

  methods: {
    logout () {
      this.$inertia.post(route('logout'))
    }
  }
}
</script>
