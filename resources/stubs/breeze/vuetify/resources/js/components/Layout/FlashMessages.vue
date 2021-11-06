<template>
  <div v-if="text">
    <v-snackbar
      v-model="snackbar"
      :left="$vuetify.rtl"
      :right="!$vuetify.rtl"
      :color="$page.props.flash.success ? 'success' : 'error'"
      bottom
      shaped
    >
      {{ text }}
      <template #action="{ attrs }">
        <v-btn
          text
          v-bind="attrs"
          icon
          @click="snackbar = false"
        >
          <v-icon>mdi-close</v-icon>
        </v-btn>
      </template>
    </v-snackbar>
  </div>
</template>

<script>
export default {
  data: () => ({
    snackbar: false
  }),
  computed: {
    text () {
      return this.$page.props.flash.success || this.$page.props.flash.error
    }
  },
  watch: {
    '$page.props.flash': {
      deep: true,
      handler () {
        if (this.$page.props.flash.success || this.$page.props.flash.error) {
          this.snackbar = true
        }
      }
    }
  }
}
</script>
