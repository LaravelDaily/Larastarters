<script setup>
import { onMounted, ref } from 'vue';

const model = defineModel({
	type: String,
	required: true,
});

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus();
    }
});
</script>

<template>
    <input class="block mt-1 w-full rounded-md form-input focus:border-indigo-600"
           v-model="model"
           ref="input"
    />
</template>
