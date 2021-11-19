<template>
    <Head title="Reset Password"/>

    <div class="w-full lg:w-4/12 px-4">
        <div
            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0">

            <BreezeValidationErrors class="mb-4"/>

            <form @submit.prevent="submit">
                <div class="relative w-full mb-3">
                    <BreezeLabel for="email" value="Email"/>
                    <BreezeInput id="email" type="email" v-model="form.email" required autofocus
                                 autocomplete="username"/>
                </div>

                <div class="relative w-full mb-3">
                    <BreezeLabel for="password" value="Password"/>
                    <BreezeInput id="password" type="password" v-model="form.password" required
                                 autocomplete="new-password"/>
                </div>

                <div class="relative w-full mb-3">
                    <BreezeLabel for="password_confirmation" value="Confirm Password"/>
                    <BreezeInput id="password_confirmation" type="password" v-model="form.password_confirmation"
                                 required autocomplete="new-password"/>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <BreezeButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Reset Password
                    </BreezeButton>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import BreezeButton from '@/Components/Button.vue'
import BreezeGuestLayout from '@/Layouts/Guest.vue'
import BreezeInput from '@/Components/Input.vue'
import BreezeLabel from '@/Components/Label.vue'
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
import { Head } from '@inertiajs/inertia-vue3';

export default {
    layout: BreezeGuestLayout,

    components: {
        BreezeButton,
        BreezeInput,
        BreezeLabel,
        BreezeValidationErrors,
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
