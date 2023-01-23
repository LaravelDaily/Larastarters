<template>
  <GuestLayout>
    <Head title="Reset Password" />

    <div class="w-full lg:w-4/12 px-4">
      <div
          class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-slate-200 border-0">

        <form @submit.prevent="submit">
          <div class="relative w-full mb-3">
            <InputLabel for="email" value="Email" />
            <TextInput id="email" type="email" v-model="form.email" required autofocus autocomplete="username" />
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

          <div class="flex items-center justify-end mt-4">
            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
              Reset Password
            </PrimaryButton>
          </div>
        </form>
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
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
  email: String,
  token: String,
});

const form = useForm({
  token: props.token,
  email: props.email,
  password: '',
  password_confirmation: '',
});

const submit = () => {
  form.post(route('password.update'), {
    onFinish: () => form.reset('password', 'password_confirmation'),
  });
};
</script>
