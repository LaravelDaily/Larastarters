<template>
    <Link class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">
        <slot />
    </Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>
