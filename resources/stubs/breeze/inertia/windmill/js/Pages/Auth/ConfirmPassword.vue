<template>
  <GuestLayout>
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

          <form @submit.prevent="submit">
            <div>
              <InputLabel for="password" value="Password"/>
              <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" required
                           autocomplete="current-password" autofocus/>
              <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="flex justify-end mt-4">
              <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
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
