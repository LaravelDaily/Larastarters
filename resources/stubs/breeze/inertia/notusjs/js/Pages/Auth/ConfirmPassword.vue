<template>
  <GuestLayout>
    <Head title="Confirm Password" />

    <div class="w-full lg:w-6/12 px-4">
      <div
          class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-slate-200 border-0">

        <div class="rounded-t mb-0 px-6 py-6">
          <div class="text-center mb-3">
            <h6 class="text-slate-500 text-sm font-bold">
              This is a secure area of the application. Please confirm your password before continuing.
            </h6>
          </div>

          <hr class="mt-6 border-b-1 border-slate-300" />
        </div>

        <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
          <form @submit.prevent="submit">
            <div class="relative w-full mb-3">
              <InputLabel for="password" value="Password" />
              <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required autocomplete="current-password" autofocus />
              <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="flex justify-end mt-4">
              <PrimaryButton class="w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Confirm
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

const form = useForm({
  password: '',
});

const submit = () => {
  form.post(route('password.confirm'), {
    onFinish: () => form.reset(),
  })
};
</script>
