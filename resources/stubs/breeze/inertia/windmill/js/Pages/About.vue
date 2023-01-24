<template>
  <Head title="About us"/>

  <AuthenticatedLayout>
    <template #header>
      About us
    </template>

    <div class="p-4 bg-white rounded-lg shadow-xs">
      Sample static text page
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>
