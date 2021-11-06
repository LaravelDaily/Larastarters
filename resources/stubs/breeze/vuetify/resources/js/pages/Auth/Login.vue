<template>
  <authentication-card>
    <template #logo>
      <authentication-card-logo />
    </template>
    <template #title>
      {{ $t('auth.login') }}
    </template>

    <div
      v-if="status"
      class="mb-4 font-medium text-sm text-green-600"
    >
      {{ status }}
    </div>

    <form @submit.prevent="submit">
      <v-row>
        <v-col cols="12">
          <v-text-field
            v-model="form.email"
            name="email"
            :label="$t('auth.email')"
            type="email"
            hide-details="auto"
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
            :label="$t('auth.password')"
            hide-details="auto"
            autocomplete="current-password"
            :error-messages="errors['password']"
            outlined
            required
            autofocus
          />
        </v-col>
        <v-col cols="12">
          <v-checkbox
            v-model="form.remeber"
            label="Remember me"
            value="on"
          />
        </v-col>
        <v-col
          cols="12"
          class="d-flex align-center"
        >
          <v-btn
            color="primary"
            :disabled="form.processing"
            :loading="form.processing"
            type="submit"
          >
            {{ $t('auth.login') }}
          </v-btn>
          <inertia-link
            v-if="canResetPassword"
            :href="route('password.request')"
            class="v-btn v-btn--text v-size--small"
          >
            {{ $t('auth.forgot') }}
          </inertia-link>
        </v-col>
      </v-row>
    </form>
  </authentication-card>
</template>

<script>
import AuthenticationCard from '@/components/Auth/AuthenticationCard'
import AuthenticationCardLogo from '@/components/Auth/AuthenticationCardLogo'
import AppLayout from '@/layouts/AppLayout'

export default {
  components: {
    AuthenticationCard,
    AuthenticationCardLogo
  },
  layout: AppLayout,
  props: {
    canResetPassword: Boolean,
    status: {
      type: String,
      default: ''
    }
  },

  data () {
    return {
      form: this.$inertia.form({
        email: '',
        password: '',
        remember: false
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
      this.form
        .transform(data => ({
          ...data,
          remember: this.form.remember ? 'on' : ''
        }))
        .post(this.route('login'), {
          onFinish: () => this.form.reset('password')
        })
    }
  }
}
</script>
