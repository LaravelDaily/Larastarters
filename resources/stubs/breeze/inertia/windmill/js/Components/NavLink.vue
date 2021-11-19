<template>
  <span v-show="active"
        class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
        aria-hidden="true"
  ></span>
  <div class="flex">
    <slot name="icon"/>
    <Link :href="href"
          class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800">
      <span class="ml-4">
        <slot/>
      </span>
    </Link>
  </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
  components: {
    Link,
  },

  props: ['href', 'active'],
}
</script>
