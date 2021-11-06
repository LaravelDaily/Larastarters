<template>
  <authentication-card>
    <template #logo>
      <authentication-card-logo />
    </template>

    <div class="mb-4 text-subtitle-2">
      This is a secure area of the application. Please confirm your password before continuing.
    </div>

    <form @submit.prevent="submit">
      <v-row>
        <v-col cols="12">
          <v-text-field
            v-model="form.password"
            name="password"
            type="password"
            label="Password"
            hide-details="auto"
            autocomplete="current-password"
            :error-messages="errors['password']"
            outlined
            required
            autofocus
          />
        </v-col>
      </v-row>
      <v-col
        cols="12"
        class="d-flex align-center justify-end"
      >
        <v-btn
          color="primary"
          :disabled="form.processing"
          :loading="form.processing"
          @click="submit"
        >
          Confirm
        </v-btn>
      </v-col>
    </form>
  </authentication-card>
</template>

<script>
import AuthenticationCard from '@/components/Auth/AuthenticationCard'
import AuthenticationCardLogo from '@/components/Auth/AuthenticationCardLogo'

export default {
  components: {
    AuthenticationCard,
    AuthenticationCardLogo
  },

  data () {
    return {
      form: this.$inertia.form({
        password: ''
      })
    }
  },

  computed: {
    errors () {
      return this.$page.props.errors
    },

    hasErrors () {
      return Object.keys(this.errors).length > 0
    }
  },

  methods: {
    submit () {
      this.form.post(this.route('password.confirm'), {
        onFinish: () => this.form.reset()
      })
    }
  }
}
</script>
