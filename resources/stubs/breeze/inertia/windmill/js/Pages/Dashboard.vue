<template>
  <Head title="Dashboard"/>

  <BreezeAuthenticatedLayout>
    <template #header>
      Dashboard
    </template>

    <div class="p-4 bg-white rounded-lg shadow-xs">
      You're logged in!
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
