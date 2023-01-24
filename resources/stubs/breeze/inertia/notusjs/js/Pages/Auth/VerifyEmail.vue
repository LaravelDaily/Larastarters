<template>
  <GuestLayout>
    <Head title="Email Verification" />

    <div class="w-full lg:w-6/12 px-4">
      <div
          class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-slate-200 border-0">
        <div class="rounded-t mb-0 px-6 py-6">
          <div class="text-center mb-3">
            <h6 class="text-slate-500 text-sm font-bold">
              Thanks for signing up! Before getting started, could you verify your email address by clickingon the link
              we just emailed to you? If you didn\'t receive the email, we will gladly send you another.
            </h6>
          </div>

          <div class="mb-4 font-medium text-sm text-green-600" v-if="verificationLinkSent">
            A new verification link has been sent to the email address you provided during registration.
          </div>

          <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
            <form @submit.prevent="submit">
              <div>
                <PrimaryButton class="w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                  Resend Verification Email
                </PrimaryButton>

                <Link :href="route('logout')" method="post" as="button" class="px-6 py-3 mb-1 mr-1 text-sm font-bold text-white uppercase transition-all duration-150 ease-linear rounded shadow outline-none  bg-slate-800 active:bg-slate-600 hover:shadow-lg focus:outline-none">
                  Log Out
                </Link>
              </div>
            </form>
          </div>
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
