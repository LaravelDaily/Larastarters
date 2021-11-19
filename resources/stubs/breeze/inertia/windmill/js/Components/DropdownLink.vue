<template>
  <Link
      class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800">
    <slot name="icon"/>
    <span>
          <slot/>
        </span>
  </Link>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
  components: {
    Link,
  }
}
</script>