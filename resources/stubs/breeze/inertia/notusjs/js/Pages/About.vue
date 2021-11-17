<template>
    <Head title="About us"/>

    <BreezeAuthenticatedLayout>
        <div class="px-4 w-full">
            <div class="flex relative flex-col mb-6 min-w-0 break-words bg-white rounded shadow-lg xl:mb-0">
                <div class="flex-auto p-4">
                    Sample static text page
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
    },
};
</script>
