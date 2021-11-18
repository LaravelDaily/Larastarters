<template>
    <Head title="Forgot Password" />

    <Link href="/" class="flex justify-center items-center mb-4">
        <BreezeApplicationLogo class="w-20 h-20 text-gray-500 fill-current"/>
    </Link>

    <div class="mb-4 text-sm text-gray-600">
        Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
    </div>

    <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
        {{ status }}
    </div>

    <BreezeValidationErrors class="mb-4" />

    <form @submit.prevent="submit">
        <div>
            <BreezeLabel for="email" value="Email" />
            <BreezeInput id="email" type="email" class="block mt-1 w-full" v-model="form.email" required autofocus autocomplete="username" />
        </div>

        <div class="flex justify-end items-center mt-4">
            <BreezeButton class="w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Email Password Reset Link
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
        Head,
        Link
    },

    props: {
        status: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                email: ''
            })
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('password.email'))
        }
    }
}
</script>
