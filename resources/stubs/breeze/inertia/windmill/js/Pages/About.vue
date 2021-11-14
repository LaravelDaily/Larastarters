<template>
  <Head title="About us"/>

  <BreezeAuthenticatedLayout>
    <template #header>
      About us
    </template>

    <div class="p-4 bg-white rounded-lg shadow-xs">
      Sample static text page
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
