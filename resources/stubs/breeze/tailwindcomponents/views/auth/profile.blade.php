<x-app-layout>
    <x-slot name="header">
        {{ __('My profile') }}
    </x-slot>

    <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
        <div class="p-6 border-b border-gray-200">

            <h2 class="text-lg text-gray-700 font-semibold capitalize">{{ __('My profile') }}</h2>

            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                    <div>
                        <x-label for="name" :value="__('Name')"/>
                        <x-input type="text"
                                 name="name"
                                 id="name"
                                 value="{{ old('name', auth()->user()->name) }}"
                                 required
                        />
                    </div>

                    <div>
                        <x-label for="email" :value="__('Email')"/>
                        <x-input type="email"
                                 name="email"
                                 id="email"
                                 value="{{ old('email', auth()->user()->email) }}"
                                 required
                        />
                    </div>

                    <div>
                        <x-label for="password" :value="__('Password')"/>
                        <x-input type="password"
                                 name="password"
                                 id="password"
                                 required
                        />
                    </div>

                    <div>
                        <x-label for="password_confirmation" :value="__('Confirm Password')"/>
                        <x-input type="password"
                                 name="password_confirmation"
                                 id="password_confirmation"
                                 required
                        />
                    </div>
                </div>

                <div class="flex justify-end mt-4">
                    <x-button>
                        {{ __('Submit') }}
                    </x-button>
                </div>

            </form>

        </div>
    </div>
</x-app-layout>
