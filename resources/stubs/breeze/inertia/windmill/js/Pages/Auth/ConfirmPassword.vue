<template>
  <Head title="Confirm Password"/>

  <div class="flex flex-col overflow-y-auto md:flex-row">
    <div class="h-32 md:h-auto md:w-1/2">
      <img aria-hidden="true" class="object-cover w-full h-full"
           src="{{ asset('images/forgot-password-office.jpeg') }}" alt="Office"/>
    </div>
    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
      <div class="w-full">
        <h1 class="mb-4 font-semibold text-gray-700 dark:text-gray-200">
          This is a secure area of the application. Please confirm your password before continuing.
        </h1>

        <BreezeValidationErrors class="mb-4"/>

        <form @submit.prevent="submit">
          <div>
            <BreezeLabel for="password" value="Password"/>
            <BreezeInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required
                         autocomplete="current-password" autofocus/>
          </div>

          <div class="flex justify-end mt-4">
            <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
              Confirm
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

  data() {
    return {
      form: this.$inertia.form({
        password: '',
      })
    }
  },

  methods: {
    submit() {
      this.form.post(this.route('password.confirm'), {
        onFinish: () => this.form.reset(),
      })
    }
  }
}
</script>
