<template>
  <Head title="Dashboard"/>

  <AuthenticatedLayout>
    <template #header>
      Dashboard
    </template>

    <div class="p-4 bg-white rounded-lg shadow-xs">
      You're logged in!
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>
