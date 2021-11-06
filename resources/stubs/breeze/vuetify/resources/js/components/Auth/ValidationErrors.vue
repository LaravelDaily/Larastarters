<template>
  <v-alert
    v-if="hasErrors"
    dense
    outlined
    type="error"
  >
    <ul>
      <li
        v-for="(error, key) in errors"
        :key="key"
      >
        {{ error }}
      </li>
    </ul>
  </v-alert>
</template>

<script>
export default {
  computed: {
    errors () {
      return this.$page.props.errors
    },

    hasErrors () {
      return Object.keys(this.errors).length > 0
    }
  }
}
</script>
