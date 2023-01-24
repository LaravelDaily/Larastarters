<template>
  <Link :href="href" :class="classes">
    <slot name="icon" />
    <slot />
  </Link>
</template>

<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps(['href', 'active']);

const classes = computed(() => props.active
    ? "text-xs uppercase py-3 font-bold block text-pink-500 hover:text-pink-600'"
    : "text-xs uppercase py-3 font-bold block text-slate-700 hover:text-slate-500"
);
</script>
