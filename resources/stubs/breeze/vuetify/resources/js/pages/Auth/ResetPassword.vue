<template>
  <authentication-card>
    <template #logo>
      <authentication-card-logo />
    </template>

    <form @submit.prevent="submit">
      <div>
        <jet-label
          for="email"
          value="Email"
        />
        <jet-input
          id="email"
          v-model="form.email"
          type="email"
          class="mt-1 block w-full"
          required
          autofocus
          :error-messages="errors['email']"
        />
      </div>

      <div class="mt-4">
        <jet-label
          for="password"
          value="Password"
        />
        <jet-input
          id="password"
          v-model="form.password"
          type="password"
          class="mt-1 block w-full"
          required
          autocomplete="new-password"
          :error-messages="errors['password']"
        />
      </div>

      <div class="mt-4">
        <jet-label
          for="password_confirmation"
          value="Confirm Password"
        />
        <jet-input
          id="password_confirmation"
          v-model="form.password_confirmation"
          type="password"
          class="mt-1 block w-full"
          required
          autocomplete="new-password"
        />
      </div>

      <div class="flex items-center justify-end mt-4">
        <v-button :loading="form.processing">
          Reset Password
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
    email: {
      type: String,
      default: ''
    },
    token: {
      type: String,
      default: ''
    }
  },

  data () {
    return {
      form: this.$inertia.form({
        token: this.token,
        email: this.email,
        password: '',
        password_confirmation: ''
      })
    }
  },

  methods: {
    submit () {
      this.form.post(this.route('password.update'), {
        onFinish: () => this.form.reset('password', 'password_confirmation')
      })
    }
  }
}
</script>
