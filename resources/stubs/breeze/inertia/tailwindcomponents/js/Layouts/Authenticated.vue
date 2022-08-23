<template>
    <div class="flex h-screen bg-gray-200 font-roboto">
            <navigation />

            <div class="flex overflow-hidden flex-col flex-1">
                <Header />

                <main class="overflow-y-auto overflow-x-hidden flex-1 bg-gray-200">
                    <div class="container px-6 py-8 mx-auto">
                        <h3 class="mb-4 text-3xl font-medium text-gray-700">
                            <slot name="header" />
                        </h3>

                        <slot />
                    </div>
                </main>
            </div>
        </div>
</template>

<script>
import Header from '@/Layouts/Header.vue';
import Navigation from '@/Layouts/Navigation.vue';

export default {
    components: {
        Header,
        Navigation
    }
}
</script>
