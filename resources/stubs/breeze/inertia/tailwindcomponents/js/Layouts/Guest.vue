<template>
    <div class="flex justify-center items-center h-screen bg-gray-200 px-6">
        <div class="p-6 max-w-sm w-full bg-white shadow-md rounded-md">
            <slot/>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link,
    }
}
</script>
