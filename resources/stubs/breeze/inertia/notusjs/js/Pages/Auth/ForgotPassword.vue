<template>
  <GuestLayout>
    <Head title="Forgot Password" />

    <div class="w-full lg:w-6/12 px-4">
      <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-slate-200 border-0">

        <div class="rounded-t mb-0 px-6 py-6">
          <div class="text-center mb-3">
            <h6 class="text-slate-500 text-sm font-bold">
              Forgot your password? No problem. Just let us know your email address and we will email you a password
              reset link that will allow you to choose a new one.
            </h6>
          </div>

          <hr class="mt-6 border-b-1 border-slate-300" />
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
          {{ status }}
        </div>

        <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
          <form @submit.prevent="submit">
            <div>
              <InputLabel for="email" value="Email" />
              <TextInput id="email" type="email" v-model="form.email" required autofocus autocomplete="username" />
              <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="flex items-center justify-end mt-4">
              <PrimaryButton class="w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Email Password Reset Link
              </PrimaryButton>
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
import { Head, useForm } from '@inertiajs/vue3';

defineProps({
  status: String,
});

const form = useForm({
  email: '',
});

const submit = () => {
  form.post(route('password.email'));
};
</script>
