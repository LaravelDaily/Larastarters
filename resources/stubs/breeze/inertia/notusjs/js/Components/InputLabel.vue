<script setup>
defineProps({
    value: {
        type: String,
    },
});
</script>

<template>
    <label class="block mb-2 text-xs font-bold uppercase text-slate-600">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>
