<template>
    <Head title="Email Verification"/>

    <div class="w-full lg:w-6/12 px-4">
        <div
            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0">
            <div class="rounded-t mb-0 px-6 py-6">
                <div class="text-center mb-3">
                    <h6 class="text-blueGray-500 text-sm font-bold">
                        Thanks for signing up! Before getting started, could you verify your email address by clickingon the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.
                    </h6>
                </div>

                <div class="mb-4 font-medium text-sm text-green-600" v-if="verificationLinkSent">
                    A new verification link has been sent to the email address you provided during registration.
                </div>

                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                    <form @submit.prevent="submit">
                        <div>
                            <BreezeButton class="w-full" :class="{ 'opacity-25': form.processing }"
                                          :disabled="form.processing">
                                Resend Verification Email
                            </BreezeButton>

                            <Link :href="route('logout')" method="post" as="button" class="px-6 py-3 mb-1 mr-1 text-sm font-bold text-white uppercase transition-all duration-150 ease-linear rounded shadow outline-none  bg-blueGray-800 active:bg-blueGray-600 hover:shadow-lg focus:outline-none">
                                Log Out
                            </Link>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import BreezeButton from '@/Components/Button.vue'
import BreezeGuestLayout from '@/Layouts/Guest.vue'
import { Head, Link } from '@inertiajs/inertia-vue3';

export default {
    layout: BreezeGuestLayout,

    components: {
        BreezeButton,
        Head,
        Link,
    },

    props: {
        status: String,
    },

    data() {
        return {
            form: this.$inertia.form()
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('verification.send'))
        },
    },

    computed: {
        verificationLinkSent() {
            return this.status === 'verification-link-sent';
        }
    }
}
</script>
