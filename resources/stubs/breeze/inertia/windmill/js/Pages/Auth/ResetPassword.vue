<template>
  <Head title="Reset Password"/>

  <div class="flex flex-col overflow-y-auto md:flex-row">
    <div class="h-32 md:h-auto md:w-1/2">
      <img aria-hidden="true" class="object-cover w-full h-full"
           src="/images/forgot-password-office.jpeg" alt="Office"/>
    </div>
    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
      <div class="w-full">
        <h1 class="mb-4 text-xl font-semibold text-gray-700">
          Forgot password
        </h1>

        <BreezeValidationErrors class="mb-4"/>

        <form @submit.prevent="submit">
          <div>
            <BreezeLabel for="email" value="Email"/>
            <BreezeInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required autofocus
                         autocomplete="username"/>
          </div>

          <div class="mt-4">
            <BreezeLabel for="password" value="Password"/>
            <BreezeInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required
                         autocomplete="new-password"/>
          </div>

          <div class="mt-4">
            <BreezeLabel for="password_confirmation" value="Confirm Password"/>
            <BreezeInput id="password_confirmation" type="password" class="mt-1 block w-full"
                         v-model="form.password_confirmation" required autocomplete="new-password"/>
          </div>

          <div class="flex items-center justify-end mt-4">
            <BreezeButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
              Reset Password
            </BreezeButton>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import BreezeButton from '@/Components/Button.vue'
import BreezeGuestLayout from '@/Layouts/Guest.vue'
import BreezeInput from '@/Components/Input.vue'
import BreezeLabel from '@/Components/Label.vue'
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
import { Head } from '@inertiajs/inertia-vue3';

export default {
  layout: BreezeGuestLayout,

  components: {
    BreezeButton,
    BreezeInput,
    BreezeLabel,
    BreezeValidationErrors,
    Head,
  },

  props: {
    email: String,
    token: String,
  },

  data() {
    return {
      form: this.$inertia.form({
        token: this.token,
        email: this.email,
        password: '',
        password_confirmation: '',
      })
    }
  },

  methods: {
    submit() {
      this.form.post(this.route('password.update'), {
        onFinish: () => this.form.reset('password', 'password_confirmation'),
      })
    }
  }
}
</script>
