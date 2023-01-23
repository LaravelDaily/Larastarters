<template>
  <Head title="Register" />

  <GuestLayout>
    <div class="w-full lg:w-6/12 px-4">
      <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-slate-200 border-0">

        <div class="rounded-t mb-0 px-6 py-6">
          <div class="text-center mb-3">
            <h6 class="text-slate-500 text-sm font-bold">
              Sign up
            </h6>
          </div>
          <hr class="mt-6 border-b-1 border-slate-300" />
        </div>
        <div class="flex-auto px-4 lg:px-10 py-10 pt-0">

          <form @submit.prevent="submit">
            <div class="relative w-full mb-3">
              <InputLabel for="name" value="Name" />
              <TextInput id="name" type="text" v-model="form.name" required autofocus autocomplete="name" />
              <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="relative w-full mb-3">
              <InputLabel for="email" value="Email" />
              <TextInput id="email" type="email" v-model="form.email" required autocomplete="username" />
              <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="relative w-full mb-3">
              <InputLabel for="password" value="Password" />
              <TextInput id="password" type="password" v-model="form.password" required autocomplete="new-password" />
              <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="relative w-full mb-3">
              <InputLabel for="password_confirmation" value="Confirm Password" />
              <TextInput id="password_confirmation" type="password" v-model="form.password_confirmation" required autocomplete="new-password" />
              <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="text-center mt-6">
              <PrimaryButton class="w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Register
              </PrimaryButton>

              <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                Already registered?
              </Link>
            </div>
          </form>
        </div>

      </div>
    </div>
  </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
  terms: false,
});

const submit = () => {
  form.post(route('register'), {
    onFinish: () => form.reset('password', 'password_confirmation'),
  });
};
</script>
