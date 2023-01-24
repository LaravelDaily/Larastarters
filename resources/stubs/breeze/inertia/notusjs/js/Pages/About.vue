<template>
    <Head title="About us"/>

  <AuthenticatedLayout>
        <div class="px-4 w-full">
            <div class="flex relative flex-col mb-6 min-w-0 break-words bg-white rounded shadow-lg xl:mb-0">
                <div class="flex-auto p-4">
                    Sample static text page
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>
