<template>
<header class="flex justify-between items-center px-6 py-4 bg-white border-b-4 border-indigo-600">
    <div class="flex items-center">
        <button @click="$page.props.showingMobileMenu = !$page.props.showingMobileMenu" class="text-gray-500 focus:outline-none lg:hidden">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round"/>
            </svg>
        </button>
    </div>

    <div class="flex items-center">
        <dropdown>
            <template #trigger>
                <button @click="dropdownOpen = ! dropdownOpen" class="block overflow-hidden relative">
                    {{ $page.props.auth.user.name }}
                </button>
            </template>

            <template #content>
                <dropdown-link :href="route('profile.show')">
                    My profile
                </dropdown-link>

                <dropdown-link class="w-full text-left" :href="route('logout')" method="post" as="button">
                    Log out
                </dropdown-link>
            </template>
        </dropdown>
    </div>
</header>
</template>

<script>
import Dropdown from '@/Components/Dropdown';
import DropdownLink from '@/Components/DropdownLink';

export default {
    components: {
        Dropdown,
        DropdownLink,
    }
}
</script>
