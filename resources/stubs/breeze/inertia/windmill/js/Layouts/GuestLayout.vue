<template>
  <div class="flex items-center min-h-screen p-6 bg-gray-50">
    <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl ">
      <slot/>
    </div>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
</script>
