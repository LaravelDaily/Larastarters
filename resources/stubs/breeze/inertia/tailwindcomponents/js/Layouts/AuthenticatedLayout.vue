<template>
    <div class="flex h-screen bg-gray-200 font-roboto">
        <Navigation />

        <div class="flex flex-1 flex-col overflow-hidden">
            <Header />

            <main class="flex-1 overflow-y-auto overflow-x-hidden bg-gray-200">
                <div class="container mx-auto px-6 py-8">
                    <h3 class="mb-4 text-3xl font-medium text-gray-700">
                        <slot name="header" />
                    </h3>

                    <slot />
                </div>
            </main>
        </div>
    </div>
</template>

<script setup>
import Header from '@/Layouts/Header.vue';
import Navigation from '@/Layouts/Navigation.vue';
</script>
