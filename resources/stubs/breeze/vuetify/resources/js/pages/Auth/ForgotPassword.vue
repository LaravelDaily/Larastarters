<template>
  <authentication-card>
    <template #logo>
      <authentication-card-logo />
    </template>

    <div class="mb-4 text-sm text-gray-600">
      Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
    </div>

    <div
      v-if="status"
      class="mb-4 font-medium text-sm text-green-600"
    >
      {{ status }}
    </div>

    <form @submit.prevent="submit">
      <div>
        <v-text-field
          v-model="form.email"
          label="Email"
          type="email"
          required
          autofocus
          :error-messages="errors['email']"
        />
      </div>

      <div class="flex items-center justify-end mt-4">
        <v-button :loading="form.processing">
          Email Password Reset Link
        </v-button>
      </div>
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

  props: {
    status: {
      type: String,
      default: ''
    }
  },

  data () {
    return {
      form: this.$inertia.form({
        email: ''
      })
    }
  },

  methods: {
    submit () {
      this.form.post(this.route('password.email'))
    }
  }
}
</script>
