<template>
    <Head title="Dashboard"/>

    <BreezeAuthenticatedLayout>
        <template #header>
            Dashboard
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                You're logged in!
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
    },
}
</script>
