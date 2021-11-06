<template>
  <authentication-card>
    <template #logo>
      <authentication-card-logo />
    </template>
    <template #title>
      Register
    </template>

    <form @submit.prevent="submit">
      <v-row>
        <v-col cols="12">
          <v-text-field
            v-model="form.name"
            name="name"
            label="Name"
            hide-details="auto"
            autocomplete="name"
            :error-messages="errors['name']"
            outlined
            required
            autofocus
          />
        </v-col>
        <v-col cols="12">
          <v-text-field
            v-model="form.email"
            name="email"
            label="Email"
            type="email"
            hide-details="auto"
            autocomplete="email"
            :error-messages="errors['email']"
            outlined
            required
            autofocus
          />
        </v-col>
        <v-col cols="12">
          <v-text-field
            v-model="form.password"
            name="password"
            type="password"
            label="Password"
            hide-details="auto"
            autocomplete="new-password"
            :error-messages="errors['password']"
            outlined
            required
            autofocus
          />
        </v-col>
        <v-col cols="12">
          <v-text-field
            v-model="form.password_confirmation"
            name="password"
            type="password"
            label="Confirm Password"
            hide-details="auto"
            autocomplete="new-password"
            outlined
            required
            autofocus
          />
        </v-col>
        <v-col
          v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature"
          cols="12"
        >
          <v-checkbox
            v-model="form.terms"
            :error-messages="errors['terms']"
          >
            I agree to the <a
              target="_blank"
              :href="route('terms.show')"
              class="v-btn v-btn--text v-size--small"
            >Terms of Service</a> and <a
              target="_blank"
              :href="route('policy.show')"
              class="v-btn v-btn--text v-size--small"
            >Privacy Policy</a>
          </v-checkbox>
        </v-col>
        <v-col
          cols="12"
          class="d-flex align-center"
        >
          <v-btn
            color="primary"
            :disabled="form.processing"
            :loading="form.processing"
            @click="submit"
          >
            Register
          </v-btn>
          <inertia-link
            :href="route('login')"
            class="v-btn v-btn--text v-size--small"
          >
            Already registered?
          </inertia-link>
        </v-col>
      </v-row>
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
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        terms: false
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
      this.form.post(this.route('register'), {
        onFinish: () => this.form.reset('password', 'password_confirmation')
      })
    }
  }
}
</script>
