<template>
    <Head title="Reset Password" />

    <Link href="/" class="flex justify-center items-center mb-4">
        <BreezeApplicationLogo class="w-20 h-20 text-gray-500 fill-current"/>
    </Link>

    <BreezeValidationErrors class="mb-4" />

    <form @submit.prevent="submit">
        <div>
            <BreezeLabel for="email" value="Email" />
            <BreezeInput id="email" type="email" class="block mt-1 w-full" v-model="form.email" required autofocus autocomplete="username" />
        </div>

        <div class="mt-3">
            <BreezeLabel for="password" value="Password" />
            <BreezeInput id="password" type="password" class="block mt-1 w-full" v-model="form.password" required autocomplete="new-password" />
        </div>

        <div class="mt-3">
            <BreezeLabel for="password_confirmation" value="Confirm Password" />
            <BreezeInput id="password_confirmation" type="password" class="block mt-1 w-full" v-model="form.password_confirmation" required autocomplete="new-password" />
        </div>

        <div class="flex justify-end items-center mt-4">
            <BreezeButton class="w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Reset Password
            </BreezeButton>
        </div>
    </form>
</template>

<script>
import BreezeButton from '@/Components/Button.vue'
import BreezeGuestLayout from '@/Layouts/Guest.vue'
import BreezeInput from '@/Components/Input.vue'
import BreezeLabel from '@/Components/Label.vue'
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue'
import { Link, Head } from '@inertiajs/inertia-vue3';

export default {
    layout: BreezeGuestLayout,

    components: {
        BreezeButton,
        BreezeInput,
        BreezeLabel,
        BreezeValidationErrors,
        BreezeApplicationLogo,
        Link,
        Head,
    },

    props: {
        email: String,
        token: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                token: this.token,
                email: this.email,
                password: '',
                password_confirmation: '',
            })
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('password.update'), {
                onFinish: () => this.form.reset('password', 'password_confirmation'),
            })
        }
    }
}
</script>
