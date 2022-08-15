<template>
    <navigation v-show="$page.props.showingMobileMenu === false" />
    <mobile-navigation v-show="$page.props.showingMobileMenu === true" />

    <div class="relative md:ml-64 bg-blueGray-50">
        <!-- TOP NAV -->
        <nav class="hidden absolute top-0 left-0 z-10 items-center p-4 w-full bg-transparent md:flex md:flex-row md:flex-nowrap md:justify-start">
            <div class="flex flex-wrap justify-end items-center px-4 mx-auto w-full md:flex-nowrap md:px-10">
                <BreezeDropdown>
                    <template #trigger>
                        <button type="button" class="block text-blueGray-500" >
                            <span class="text-white">{{ $page.props.auth.user.name }}</span>
                        </button>
                    </template>

                    <template #content>
                        <BreezeDropdownLink :href="route('profile.show')">My profile</BreezeDropdownLink>
                        <divider />
                        <BreezeDropdownLink :href="route('logout')" class="w-full text-left" method="post" as="button">
                            Log Out
                        </BreezeDropdownLink>
                    </template>
                </BreezeDropdown>
            </div>
        </nav>
        <!-- END TOP NAV -->

        <div class="relative pt-12 pb-32 bg-pink-600 md:pt-32">
            <div class="px-4 mx-auto w-full md:px-10">
                <div class="flex flex-wrap"></div>
            </div>
        </div>
        <div class="px-4 -m-24 mx-auto w-full md:px-10">
            <slot />
        </div>
    </div>
</template>

<script>
import BreezeApplicationLogo from '@/Components/ApplicationLogo.vue'
import BreezeDropdown from '@/Components/Dropdown.vue'
import BreezeDropdownLink from '@/Components/DropdownLink.vue'
import BreezeNavLink from '@/Components/NavLink.vue'
import BreezeResponsiveNavLink from '@/Components/ResponsiveNavLink.vue'
import { Link } from '@inertiajs/inertia-vue3';
import Navigation from "@/Layouts/Navigation.vue";
import MobileNavigation from '@/Layouts/MobileNavigation.vue';
import Divider from '@/Components/Divider.vue';

export default {
    components: {
        Navigation,
        MobileNavigation,
        Divider,
        BreezeApplicationLogo,
        BreezeDropdown,
        BreezeDropdownLink,
        BreezeNavLink,
        BreezeResponsiveNavLink,
        Link,
    },

    data() {
        return {
            showingNavigationDropdown: false,
        }
    },
}
</script>
