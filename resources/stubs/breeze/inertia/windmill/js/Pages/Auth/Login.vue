<template>
  <Head title="Log in"/>

  <div class="flex flex-col overflow-y-auto md:flex-row">
    <div class="h-32 md:h-auto md:w-1/2">
      <img aria-hidden="true" class="object-cover w-full h-full" src="/images/login-office.jpeg" alt="Office"/>
    </div>
    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
      <div class="w-full">
        <h1 class="mb-4 text-xl font-semibold text-gray-700">Login</h1>

        <BreezeValidationErrors class="mb-4"/>

        <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
          {{ status }}
        </div>

        <form @submit.prevent="submit">
          <div class="mt-4">
            <BreezeLabel for="email" value="Email"/>
            <BreezeInput
                id="email"
                type="email"
                class="block w-full mt-1"
                v-model="form.email"
                required
                autofocus
                autocomplete="username"
            />
          </div>

          <div class="mt-4">
            <BreezeLabel for="password" value="Password"/>
            <BreezeInput
                id="password"
                type="password"
                class="block w-full mt-1"
                v-model="form.password"
                required
                autocomplete="current-password"
            />
          </div>

          <div class="block mt-4">
            <label class="flex items-center">
              <BreezeCheckbox name="remember" v-model:checked="form.remember"/>
              <span class="ml-2 text-sm text-gray-600">Remember me</span>
            </label>
          </div>

          <div class="flex items-center justify-end mt-4">
            <Link
                v-if="canResetPassword"
                :href="route('password.request')"
                class="text-sm text-gray-600 underline  hover:text-gray-900"
            >
              Forgot your password?
            </Link>

            <BreezeButton
                class="ml-4"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
              Log in
            </BreezeButton>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import BreezeButton from '@/Components/Button.vue';
import BreezeCheckbox from '@/Components/Checkbox.vue';
import BreezeGuestLayout from '@/Layouts/Guest.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
  layout: BreezeGuestLayout,

  components: {
    BreezeButton,
    BreezeCheckbox,
    BreezeInput,
    BreezeLabel,
    BreezeValidationErrors,
    Head,
    Link,
  },

  props: {
    canResetPassword: Boolean,
    status: String,
  },

  data() {
    return {
      form: this.$inertia.form({
        email: "",
        password: "",
        remember: false,
      }),
    };
  },

  methods: {
    submit() {
      this.form.post(this.route('login'), {
        onFinish: () => this.form.reset('password'),
      });
    },
  },
};
</script>
