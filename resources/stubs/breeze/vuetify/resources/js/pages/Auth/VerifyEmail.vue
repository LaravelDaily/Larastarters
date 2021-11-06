<template>
  <authentication-card>
    <template #logo>
      <authentication-card-logo />
    </template>

    <div class="mb-4 text-sm text-gray-600">
      Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
    </div>

    <div
      v-if="verificationLinkSent"
      class="mb-4 font-medium text-sm text-green-600"
    >
      A new verification link has been sent to the email address you provided during registration.
    </div>

    <form @submit.prevent="submit">
      <div class="mt-4 flex items-center justify-between">
        <v-button :loading="form.processing">
          Resend Verification Email
        </v-button>

        <inertia-link
          :href="route('logout')"
          method="post"
          as="button"
          class="underline text-sm text-gray-600 hover:text-gray-900"
        >
          Logout
        </inertia-link>
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
      form: this.$inertia.form()
    }
  },

  computed: {
    verificationLinkSent () {
      return this.status === 'verification-link-sent'
    }
  },

  methods: {
    submit () {
      this.form.post(this.route('verification.send'))
    }
  }
}
</script>
