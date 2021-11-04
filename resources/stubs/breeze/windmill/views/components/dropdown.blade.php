<ul class="flex flex-shrink-0 items-center space-x-6">
    <!-- Profile menu -->
    <li class="relative">
        {{ $trigger }}
        <div x-show="isProfileMenuOpen">
            <ul
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                @click.outside="closeProfileMenu"
                @keydown.escape="closeProfileMenu"
                class="absolute right-0 p-2 mt-2 space-y-2 w-56 text-gray-600 bg-white rounded-md border border-gray-100 shadow-md"
                aria-label="submenu"
            >
                {{ $content }}
            </ul>
        </div>
    </li>
</ul>

