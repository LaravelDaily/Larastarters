<template>
  <GuestLayout>
    <Head title="Email Verification"/>

    <div class="flex flex-col overflow-y-auto md:flex-row">
      <div class="h-32 md:h-auto md:w-1/2">
        <img aria-hidden="true" class="object-cover w-full h-full"
             src="{{ asset('images/forgot-password-office.jpeg') }}" alt="Office"/>
      </div>
      <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
        <div class="w-full">
          <h1 class="mb-4 font-semibold text-gray-700">
            Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we
            just emailed to you? If you didn't receive the email, we will gladly send you another.
          </h1>

          <div class="mb-4 font-medium text-sm text-green-600" v-if="verificationLinkSent">
            A new verification link has been sent to the email address you provided during registration.
          </div>

          <form @submit.prevent="submit">
            <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
              Resend Verification Email
            </PrimaryButton>

            <Link :href="route('logout')" method="post" as="button" class="underline text-sm text-gray-600 hover:text-gray-900">
              Log Out
            </Link>
          </form>
        </div>
      </div>
    </div>
  </GuestLayout>
</template>

<script setup>
import { computed } from 'vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
const props = defineProps({
    status: String,
});
const form = useForm();
const submit = () => {
    form.post(route('verification.send'));
};
const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
</script>
