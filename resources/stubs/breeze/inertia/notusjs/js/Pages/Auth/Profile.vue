<template>
  <Head title="My profile" />

  <AuthenticatedLayout>
    <div class="px-4 w-full">
      <div class="flex relative flex-col mb-6 min-w-0 break-words bg-white rounded shadow-lg bg-slate-100 xl:mb-0">

        <div class="px-6 py-6 mb-0 bg-white rounded-t">
          <div class="flex justify-between text-center">
            <h6 class="text-xl font-bold text-slate-700">
              My profile
            </h6>
          </div>
        </div>

        <div class="flex-auto p-4">

          <div v-show="$page.props.flash.success" class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-emerald-500">
            <span class="text-xl inline-block mr-5 align-middle">
              <i class="fas fa-bell"></i>
            </span> <span class="inline-block align-middle">
              <b class="capitalize">Success!</b> {{ $page.props.flash.success }}
            </span>
          </div>

          <form @submit.prevent="submit">
            <div class="flex flex-wrap">
              <div class="w-full lg:w-6/12 px-4">
                <div class="relative w-full mb-3">
                  <InputLabel for="name" value="Name" />
                  <TextInput id="name" type="text" v-model="form.name" required />
                  <InputError class="mt-2" :message="form.errors.name" />
                </div>
              </div>

              <div class="w-full lg:w-6/12 px-4">
                <div class="relative w-full mb-3">
                  <InputLabel for="email" value="Email" />
                  <TextInput id="email" type="email" class="block mt-1 w-full" v-model="form.email" required />
                  <InputError class="mt-2" :message="form.errors.email" />
                </div>
              </div>

              <div class="w-full lg:w-6/12 px-4">
                <div class="relative w-full mb-3">
                  <InputLabel for="password" value="New password" />
                  <TextInput id="password" type="password" class="block mt-1 w-full" v-model="form.password" />
                  <InputError class="mt-2" :message="form.errors.password" />
                </div>
              </div>

              <div class="w-full lg:w-6/12 px-4">
                <div class="relative w-full mb-3">
                  <InputLabel for="password_confirmation" value="New password confirmation" />
                  <TextInput id="password_confirmation" type="password" class="block mt-1 w-full" v-model="form.password_confirmation" />
                  <InputError class="mt-2" :message="form.errors.password_confirmation" />
                </div>
              </div>
            </div>

            <divider class="mt-6" />

            <div class="mt-6">
              <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Submit
              </PrimaryButton>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, usePage } from '@inertiajs/vue3';
import Divider from "@/Components/Divider.vue";

const form = useForm({
  _method: 'PUT',
  name: usePage().props.value.auth.user.name,
  email: usePage().props.value.auth.user.email,
  password: null,
  password_confirmation: null,
});

const submit = () => {
  form.put(route('profile.update'), {
    onSuccess: () => form.reset('password', 'password_confirmation'),
    onError: () => form.reset('password', 'password_confirmation'),
  });
};
</script>
