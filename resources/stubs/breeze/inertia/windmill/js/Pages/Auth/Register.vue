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

<template>
	<GuestLayout>
		<Head title="Register" />
		
		<div class="flex flex-col overflow-y-auto md:flex-row">
			<div class="h-32 md:h-auto md:w-1/2">
				<img aria-hidden="true" class="object-cover w-full h-full" src="/images/create-account-office.jpeg" alt="Office" />
			</div>
			
			<div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
				<div class="w-full">
					<h1 class="mb-4 text-xl font-semibold text-gray-700">
						Create account
					</h1>
					
					<form @submit.prevent="submit">
						<div>
							<InputLabel for="name" value="Name" />
							<TextInput id="name" type="text" class="block w-full mt-1" v-model="form.name" required autofocus autocomplete="name" />
							<InputError class="mt-2" :message="form.errors.name" />
						</div>
						
						<div class="mt-4">
							<InputLabel for="email" value="Email" />
							<TextInput id="email" type="email" class="block w-full mt-1" v-model="form.email" required autocomplete="username" />
							<InputError class="mt-2" :message="form.errors.email" />
						</div>
						
						<div class="mt-4">
							<InputLabel for="password" value="Password" />
							<TextInput id="password" type="password" class="block w-full mt-1" v-model="form.password" required autocomplete="new-password" />
							<InputError class="mt-2" :message="form.errors.password" />
						</div>
						
						<div class="mt-4">
							<InputLabel for="password_confirmation" value="Confirm Password" />
							<TextInput id="password_confirmation" type="password" class="block w-full mt-1" v-model="form.password_confirmation" required autocomplete="new-password" />
							<InputError class="mt-2" :message="form.errors.password_confirmation" />
						</div>
						
						<div class="flex items-center justify-end mt-4">
							<Link :href="route('login')" class="text-sm text-gray-600 underline  hover:text-gray-900">
								Already registered?
							</Link>
							
							<PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
								Register
							</PrimaryButton>
						</div>
					</form>
				</div>
			</div>
		</div>
	</GuestLayout>
</template>
