<template>
    <label class="block mb-2 text-xs font-bold uppercase text-blueGray-600">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
    </label>
</template>

<script>
export default {
    props: ['value'],
};
</script>
