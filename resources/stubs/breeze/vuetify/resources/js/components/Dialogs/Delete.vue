<template>
  <v-dialog
    :value="isOpen"
    max-width="500px"
  >
    <v-card>
      <v-card-title class="headline">
        {{ $t('forms.delete.question') }}
      </v-card-title>
      <v-card-actions>
        <v-spacer />
        <v-btn
          color="blue darken-1"
          text
          @click="cancel"
        >
          {{ $t('forms.buttons.cancel') }}
        </v-btn>
        <v-btn
          color="blue darken-1"
          text
          @click="confirm"
        >
          {{ $t('forms.buttons.ok') }}
        </v-btn>
        <v-spacer />
      </v-card-actions>
    </v-card>
  </v-dialog>
</template>

<script>
export default {
  props: {
    isOpen: {
      type: Boolean,
      default: false
    }
  },
  methods: {
    cancel () {
      this.$emit('update:isOpen', false)
      this.$emit('cancel')
    },
    confirm () {
      this.$emit('update:isOpen', false)
      this.$emit('confirm')
    }
  }
}
</script>
