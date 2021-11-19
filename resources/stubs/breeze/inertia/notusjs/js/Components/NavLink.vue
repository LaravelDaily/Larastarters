<template>
    <Link :href="href" :class="classes">
        <slot name="icon" />
        <slot />
    </Link>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
    components: {
        Link,
    },

    props: ["href", "active"],

    computed: {
        classes() {
            return this.active
                ? "text-xs uppercase py-3 font-bold block text-pink-500 hover:text-pink-600'"
                : "text-xs uppercase py-3 font-bold block text-blueGray-700 hover:text-blueGray-500";
        },
    },
};
</script>
