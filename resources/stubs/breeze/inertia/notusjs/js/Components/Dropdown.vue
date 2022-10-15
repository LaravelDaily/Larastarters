<template>
  <div class="relative">
    <div @click="open = ! open">
      <slot name="trigger" />
    </div>

    <transition
        enter-active-class="transition duration-200 ease-out"
        enter-from-class="opacity-0 transform scale-95"
        enter-to-class="opacity-100 transform scale-100"
        leave-active-class="transition duration-75 ease-in"
        leave-from-class="opacity-100 transform scale-100"
        leave-to-class="opacity-0 transform scale-95">
      <div v-show="open"
           class="absolute right-0 z-50 mt-2 mt-8 w-48 rounded-md shadow-lg origin-top-right sm:mt-0"
           style="display: none;"
           @click="open = false">
        <div class="py-1 bg-white rounded-md ring-1 ring-black ring-opacity-5">
          <slot name="content" />
        </div>
      </div>
    </transition>
  </div>
</template>

<script setup>
import { onMounted, onUnmounted, ref } from 'vue';

const closeOnEscape = (e) => {
  if (open.value && e.key === 'Escape') {
    open.value = false;
  }
};

onMounted(() => document.addEventListener('keydown', closeOnEscape));

onUnmounted(() => document.removeEventListener('keydown', closeOnEscape));

const open = ref(false);
</script>
