<template>
    <Head title="My profile" />

    <AuthenticatedLayout>
        <template #header>
            My profile
        </template>

        <div class="rounded-lg bg-white p-4 shadow-xs">

            <div v-show="$page.props.flash.success"
                 class="mb-4 inline-flex w-full overflow-hidden rounded-lg bg-white shadow-md">
                <div class="flex w-12 items-center justify-center bg-green-500">
                    <svg class="h-6 w-6 fill-current text-white" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z">
                        </path>
                    </svg>
                </div>

                <div class="-mx-3 px-4 py-2">
                    <div class="mx-3">
                        <span class="font-semibold text-green-500">Success</span>
                        <p class="text-sm text-gray-600">{{ $page.props.flash.success }}</p>
                    </div>
                </div>
            </div>

            <form @submit.prevent="submit">
                <div class="mt-3">
                    <InputLabel for="name" value="Name" />
                    <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div class="mt-3">
                    <InputLabel for="email" value="Email" />
                    <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" required />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div class="mt-3">
                    <InputLabel for="password" value="New password" />
                    <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.password" />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="mt-3">
                    <InputLabel for="password_confirmation" value="New password confirmation" />
                    <TextInput id="password_confirmation" type="password" class="mt-1 block w-full" v-model="form.password_confirmation" />
                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                </div>

                <div class="mt-4 flex justify-end">
                    <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Submit
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, usePage } from '@inertiajs/inertia-vue3';

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
