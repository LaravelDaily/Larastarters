<template>
    <Head title="Confirm Password"/>

    <div class="w-full lg:w-6/12 px-4">
        <div
            class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0">

            <div class="rounded-t mb-0 px-6 py-6">
                <div class="text-center mb-3">
                    <h6 class="text-blueGray-500 text-sm font-bold">
                        This is a secure area of the application. Please confirm your password before continuing.
                    </h6>
                </div>

                <hr class="mt-6 border-b-1 border-blueGray-300"/>
            </div>

            <BreezeValidationErrors class="mb-4"/>

            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <form @submit.prevent="submit">
                    <div class="relative w-full mb-3">
                        <BreezeLabel for="password" value="Password"/>
                        <BreezeInput id="password" type="password" class="mt-1 block w-full" v-model="form.password"
                                     required autocomplete="current-password" autofocus/>
                    </div>

                    <div class="flex justify-end mt-4">
                        <BreezeButton class="w-full" :class="{ 'opacity-25': form.processing }"
                                      :disabled="form.processing">
                            Confirm
                        </BreezeButton>
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

    data() {
        return {
            form: this.$inertia.form({
                password: '',
            })
        }
    },

    methods: {
        submit() {
            this.form.post(this.route('password.confirm'), {
                onFinish: () => this.form.reset(),
            })
        }
    }
}
</script>
