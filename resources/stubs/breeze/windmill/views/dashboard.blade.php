<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        {{ __('You are logged in!') }}
    </div>
</x-app-layout>
