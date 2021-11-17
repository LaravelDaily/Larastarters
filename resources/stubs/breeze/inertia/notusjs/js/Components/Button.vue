<template>
    <button :type="type" class="px-6 py-3 mb-1 mr-1 text-sm font-bold text-white uppercase transition-all duration-150 ease-linear rounded shadow outline-none  bg-blueGray-800 active:bg-blueGray-600 hover:shadow-lg focus:outline-none">
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
    },
};
</script>
