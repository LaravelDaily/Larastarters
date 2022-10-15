<template>
    <input type="checkbox" :value="value" v-model="proxyChecked"
           class="ml-1 w-5 h-5 rounded border-0 transition-all duration-150 ease-linear form-checkbox text-slate-700">
</template>

<script setup>
import { computed } from 'vue';
const emit = defineEmits(['update:checked']);
const props = defineProps({
    checked: {
        type: [Array, Boolean],
        default: false,
    },
    value: {
        default: null,
    },
});
const proxyChecked = computed({
    get() {
        return props.checked;
    },
    set(val) {
        emit('update:checked', val);
    },
});
</script>
