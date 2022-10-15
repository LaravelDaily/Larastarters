<template>
    <input class="w-full border-gray-300 rounded-md shadow-sm  focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input" />
</template>

<script setup>
  import { onMounted, ref } from 'vue';

  defineProps(['modelValue']);

  defineEmits(['update:modelValue']);

  const input = ref(null);

  onMounted(() => {
      if (input.value.hasAttribute('autofocus')) {
          input.value.focus();
      }
  });
</script>
