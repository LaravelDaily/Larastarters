<template>
    <button :type="type" class="py-2 px-4 text-center bg-indigo-600 rounded-md text-white text-sm hover:bg-indigo-500">
        <slot />
    </button>
</template>

<script>
export default {
    props: {
        type: {
            type: String,
            default: 'submit',
        },
    }
}
</script>
