<template>
  <Head title="My profile"/>

  <BreezeAuthenticatedLayout>
    <template #header>
      My profile
    </template>

    <div class="p-4 bg-white rounded-lg shadow-xs">

      <div v-show="$page.props.flash.success"
           class="inline-flex w-full mb-4 overflow-hidden bg-white rounded-lg shadow-md">
        <div class="flex items-center justify-center w-12 bg-green-500">
          <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z">
            </path>
          </svg>
        </div>

        <div class="px-4 py-2 -mx-3">
          <div class="mx-3">
            <span class="font-semibold text-green-500">Success</span>
            <p class="text-sm text-gray-600">{{ $page.props.flash.success }}</p>
          </div>
        </div>
      </div>

      <BreezeValidationErrors class="mb-4"/>

      <form @submit.prevent="submit">
        <div class="mt-4">
          <BreezeLabel for="name" value="Name"/>
          <BreezeInput
              id="name"
              type="text"
              class="block mt-1 w-full"
              v-model="form.name"
              required
          />
        </div>

        <div class="mt-4">
          <BreezeLabel for="email" value="Email"/>
          <BreezeInput
              id="email"
              type="email"
              class="block mt-1 w-full"
              v-model="form.email"
              required
          />
        </div>

        <div class="mt-4">
          <BreezeLabel for="password" value="New password"/>
          <BreezeInput
              id="password"
              type="password"
              class="block mt-1 w-full"
              v-model="form.password"
          />
        </div>

        <div class="mt-4">
          <BreezeLabel for="password_confirmation" value="New password confirmation"/>
          <BreezeInput
              id="password_confirmation"
              type="password"
              class="block mt-1 w-full"
              v-model="form.password_confirmation"
          />
        </div>

        <BreezeButton
            class="block mt-4 w-full"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
        >
          Submit
        </BreezeButton>
      </form>
    </div>
  </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeButton from '@/Components/Button.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, useForm } from '@inertiajs/inertia-vue3';

export default {
  components: {
    BreezeAuthenticatedLayout,
    Head,
    BreezeButton,
    BreezeInput,
    BreezeLabel,
    BreezeValidationErrors,
  },

  data() {
    return {
      form: useForm({
        _method: 'put',
        name: this.$page.props.auth.user.name,
        email: this.$page.props.auth.user.email,
        password: null,
        password_confirmation: null,
      }),
    };
  },

  methods: {
    submit() {
      this.form.post(this.route('profile.update'), {
        onSuccess: () => this.form.reset('password', 'password_confirmation'),
        onError: () => this.form.reset('password', 'password_confirmation'),
      });
    },
  },
};
</script>
