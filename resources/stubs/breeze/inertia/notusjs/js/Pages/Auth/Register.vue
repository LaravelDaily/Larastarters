<template>
    <Head title="Register"/>

    <div class="w-full lg:w-6/12 px-4">
        <div
            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0">

            <div class="rounded-t mb-0 px-6 py-6">
                <div class="text-center mb-3">
                    <h6 class="text-blueGray-500 text-sm font-bold">
                        Sign up
                    </h6>
                </div>
                <hr class="mt-6 border-b-1 border-blueGray-300"/>
            </div>
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">

                <BreezeValidationErrors class="mb-4"/>

                <form @submit.prevent="submit">
                    <div class="relative w-full mb-3">
                        <BreezeLabel for="name" value="Name"/>
                        <BreezeInput id="name" type="text" v-model="form.name" required
                                     autofocus autocomplete="name"/>
                    </div>

                    <div class="relative w-full mb-3">
                        <BreezeLabel for="email" value="Email"/>
                        <BreezeInput id="email" type="email" v-model="form.email" required
                                     autocomplete="username"/>
                    </div>

                    <div class="relative w-full mb-3">
                        <BreezeLabel for="password" value="Password"/>
                        <BreezeInput id="password" type="password" v-model="form.password"
                                     required autocomplete="new-password"/>
                    </div>

                    <div class="relative w-full mb-3">
                        <BreezeLabel for="password_confirmation" value="Confirm Password"/>
                        <BreezeInput id="password_confirmation" type="password"
                                     v-model="form.password_confirmation" required autocomplete="new-password"/>
                    </div>

                    <div class="text-center mt-6">
                        <BreezeButton class="w-full" :class="{ 'opacity-25': form.processing }"
                                      :disabled="form.processing">
                            Register
                        </BreezeButton>

                        <Link :href="route('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                            Already registered?
                        </Link>
                    </div>
                </form>
            </div>

        </div>
    </div>
</template>

<script>
import BreezeButton from '@/Components/Button.vue'
import BreezeGuestLayout from '@/Layouts/Guest.vue'
import BreezeInput from '@/Components/Input.vue'
import BreezeLabel from '@/Components/Label.vue'
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    layout: BreezeGuestLayout,

    components: {
        BreezeButton,
        BreezeInput,
        BreezeLabel,
        BreezeValidationErrors,
        Head,
        Link,
    },

    data() {
        return {
            form: this.$inertia.form({
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
                terms: false,
            })
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('register'), {
                onFinish: () => this.form.reset('password', 'password_confirmation'),
            })
        }
    }
}
</script>
