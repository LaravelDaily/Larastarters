<template>
    <input class="w-full border-gray-300 rounded-md shadow-sm  focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input"
    />
</template>

<script>
export default {
    props: ['modelValue'],

    emits: ['update:modelValue'],

    methods: {
        focus() {
            this.$refs.input.focus();
        },
    },
};
</script>
