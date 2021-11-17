<template>
    <Head title="Log in"/>

    <div class="px-4 w-full lg:w-4/12">
        <div
            class="flex relative flex-col mb-6 w-full min-w-0 break-words rounded-lg border-0 shadow-lg bg-blueGray-200">
            <div class="px-6 py-6 mb-0 rounded-t">
                <div class="mb-3 text-center">
                    <h6 class="text-sm font-bold text-blueGray-500">
                        Sign in
                    </h6>
                </div>

                <BreezeValidationErrors class="mb-4"/>

                <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                    {{ status }}
                </div>
                <hr class="mt-6 border-b-1 border-blueGray-300"/>
            </div>
            <div class="flex-auto px-4 py-10 pt-0 lg:px-10">

                <form @submit.prevent="submit">
                    <div class="relative mb-3 w-full">
                        <BreezeLabel for="email" value="Email"/>
                        <BreezeInput id="email" type="email" v-model="form.email" required
                                     autofocus autocomplete="username"/>
                    </div>

                    <div class="relative mb-3 w-full">
                        <BreezeLabel for="password" value="Password"/>
                        <BreezeInput id="password" type="password" v-model="form.password"
                                     required autocomplete="current-password"/>
                    </div>

                    <div>
                        <label class="inline-flex items-center cursor-pointer">
                            <BreezeCheckbox name="remember" v-model:checked="form.remember"/>
                            <span class="ml-2 text-sm font-semibold text-blueGray-600">
                                Remember me
                            </span>
                        </label>
                    </div>

                    <div class="mt-6 text-center">
                        <BreezeButton class="w-full" :class="{ 'opacity-25': form.processing }"
                                      :disabled="form.processing">
                            Log in
                        </BreezeButton>

                        <Link v-if="canResetPassword" :href="route('password.request')" class="text-sm text-gray-600 underline hover:text-gray-900">
                            Forgot your password?
                        </Link>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import BreezeButton from '@/Components/Button.vue'
import BreezeCheckbox from '@/Components/Checkbox.vue'
import BreezeGuestLayout from '@/Layouts/Guest.vue'
import BreezeInput from '@/Components/Input.vue'
import BreezeLabel from '@/Components/Label.vue'
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    layout: BreezeGuestLayout,

    components: {
        BreezeButton,
        BreezeCheckbox,
        BreezeInput,
        BreezeLabel,
        BreezeValidationErrors,
        Head,
        Link,
    },

    props: {
        canResetPassword: Boolean,
        status: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                email: '',
                password: '',
                remember: false
            })
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('login'), {
                onFinish: () => this.form.reset('password'),
            })
        }
    }
}
</script>
