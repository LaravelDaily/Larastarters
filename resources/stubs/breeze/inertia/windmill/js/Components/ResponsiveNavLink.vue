<template>
  <span v-show="active" class="absolute inset-y-0 left-0 w-1 rounded-tr-lg rounded-br-lg bg-purple-600" aria-hidden="true"></span>
  <div class="flex">
    <slot name="icon" />
    <Link :href="href" class="inline-flex w-full items-center justify-between text-sm font-semibold transition-colors duration-150 hover:text-gray-800">
      <span class="ml-4">
        <slot />
      </span>
    </Link>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps(['href', 'active']);
</script>
