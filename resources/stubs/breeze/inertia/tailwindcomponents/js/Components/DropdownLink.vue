<template>
    <Link class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-600 hover:text-white">
        <slot />
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
