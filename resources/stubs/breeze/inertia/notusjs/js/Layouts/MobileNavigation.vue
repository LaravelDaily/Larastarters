<template>
    <nav
        class="flex relative z-10 flex-wrap justify-between items-center px-6 py-4 bg-white shadow-xl md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden md:w-64">
        <div class="flex flex-wrap justify-between items-center px-0 mx-auto w-full md:flex-col md:items-stretch md:min-h-full md:flex-nowrap">
            <button @click="$page.props.showingMobileMenu = !$page.props.showingMobileMenu" type="button"
                class="px-3 py-1 text-xl leading-none text-black bg-transparent rounded border border-transparent border-solid opacity-50 cursor-pointer md:hidden">
                <i class="fas fa-bars"></i>
            </button>
            <Link :href="route('dashboard')"
                class="inline-block p-4 px-0 mr-0 text-sm font-bold text-left uppercase whitespace-nowrap md:block md:pb-2 text-slate-600">
                Notus JS
            </Link>
            <Dropdown class="flex md:hidden">
                <template #trigger>
                    <button type="button" class="block text-slate-500">
                        <span class="text-slate-600">{{ $page.props.auth.user.name }}</span>
                    </button>
                </template>

                <template #content>
                    <DropdownLink :href="route('profile.edit')">Profile</DropdownLink>
                    <divider/>
                    <DropdownLink :href="route('logout')" class="w-full text-left" method="post" as="button">
                        Log Out
                    </DropdownLink>
                </template>
            </Dropdown>

            <div v-show="$page.props.showingMobileMenu" class="overflow-y-auto overflow-x-hidden absolute top-0 right-0 left-0 z-40 flex-1 items-center px-6 py-3 m-2 h-auto bg-white rounded shadow md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none">
                <div class="block pb-4 mb-4 border-b border-solid md:min-w-full md:hidden border-slate-200">
                    <div class="flex flex-wrap">
                        <div class="w-6/12">
                            <ResponsiveNavLink
                                class="inline-block p-4 px-0 mr-0 text-sm font-bold text-left uppercase whitespace-nowrap md:block md:pb-2 text-slate-600"
                                :href="route('dashboard')"
                            >
                                Notus JS
                            </ResponsiveNavLink>
                        </div>
                        <div class="flex justify-end w-6/12">
                            <button @click="$page.props.showingMobileMenu = false" type="button"
                                class="px-3 py-1 text-xl leading-none text-black bg-transparent rounded border border-transparent border-solid opacity-50 cursor-pointer md:hidden">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Heading -->
                <nav-heading>
                    Admin Layout Pages
                </nav-heading>

                <ul class="flex flex-col list-none md:flex-col md:min-w-full">
                    <li class="items-center">
                        <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            <template #icon>
                                <i class="mr-2 text-sm opacity-75 fas fa-tv"></i>
                            </template>
                            Dashboard
                        </ResponsiveNavLink>
                    </li>

                    <li class="items-center">
                        <ResponsiveNavLink :href="route('users.index')" :active="route().current('users.index')">
                            <template #icon>
                                <i class="mr-2 text-sm opacity-75 fas fa-users"></i>
                            </template>
                            Users
                        </ResponsiveNavLink>
                    </li>

                    <li class="items-center">
                        <ResponsiveNavLink :href="route('about')" :active="route().current('about')">
                            <template #icon>
                                <i class="mr-2 text-sm opacity-75 far fa-address-card"></i>
                            </template>
                            About us
                        </ResponsiveNavLink>
                    </li>
                </ul>

                <divider class="my-4"/>

                <nav-heading>
                    Two-level menu
                </nav-heading>

                <ul class="flex flex-col list-none md:flex-col md:min-w-full">
                    <ResponsiveNavLink href="#">
                        <template #icon>
                            <i class="mr-2 text-sm opacity-75 far fa-circle"></i>
                        </template>
                        Child menu
                    </ResponsiveNavLink>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script setup>
import Divider from '@/Components/Divider.vue';
import { Link } from '@inertiajs/vue3';
import Dropdown from '@/Components/Dropdown.vue'
import DropdownLink from '@/Components/DropdownLink.vue'
import NavHeading from '@/Components/NavHeading.vue'
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue'
</script>
