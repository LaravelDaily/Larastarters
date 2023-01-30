<template>
  <div v-if="links.length > 3">
    <div class="flex flex-wrap -mb-1">
      <template v-for="(link, key) in links">
        <div v-if="link.url === null" :key="key" class="px-2 py-1 mr-1 mb-1 text-sm leading-4 text-gray-400 rounded border" v-html="link.label" />
        <Link v-else :key="key + 1" class="px-2 py-1 mr-1 mb-1 text-sm leading-4 rounded border hover:bg-indigo-500 hover:text-white focus:border-indigo-500 focus:text-indigo-500" :class="{ 'text-white bg-indigo-500': link.active }" :href="link.url" v-html="link.label" />
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
