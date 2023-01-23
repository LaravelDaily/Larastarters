<template>
  <Link class="inline-flex w-full items-center rounded-md px-2 py-1 text-sm font-semibold transition-colors duration-150 hover:bg-gray-100 hover:text-gray-800">
    <slot name="icon" />
    <span>
      <slot />
    </span>
  </Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>