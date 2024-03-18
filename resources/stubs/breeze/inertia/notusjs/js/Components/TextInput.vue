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

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
	<input class="w-full border-gray-300 rounded-md shadow-sm  focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
	       v-model="model"
	       ref="input"
	/>
</template>
