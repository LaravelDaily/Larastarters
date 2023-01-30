<template>
  <div v-if="links.length > 3">
    <div class="-mb-1 flex flex-wrap">
      <template v-for="(link, key) in links">
        <div v-if="link.url === null" :key="key" class="mr-1 mb-1 rounded border px-2 py-1 text-sm leading-4 text-gray-400" v-html="link.label" />
        <Link v-else :key="key + 1" class="mr-1 mb-1 rounded border px-2 py-1 text-sm leading-4 hover:bg-white focus:border-indigo-500 focus:text-indigo-500" :class="{ 'text-white bg-purple-600 hover:bg-purple-600': link.active }" :href="link.url" v-html="link.label" />
      </template>
    </div>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
  links: Array,
});
</script>