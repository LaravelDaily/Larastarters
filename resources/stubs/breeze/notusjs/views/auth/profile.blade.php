<x-app-layout>
    <div class="px-4 w-full">
        <div class="flex relative flex-col mb-6 min-w-0 break-words bg-white rounded shadow-lg bg-blueGray-100 xl:mb-0">
            <div class="px-6 py-6 mb-0 bg-white rounded-t">
                <div class="flex justify-between text-center">
                    <h6 class="text-xl font-bold text-blueGray-700">
                        {{ __('My profile') }}
                    </h6>
                </div>
            </div>

            <div class="flex-auto p-4">

                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="flex flex-wrap">
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <x-label for="name" :value="__('Name')"/>
                                <x-input
                                        type="text"
                                        placeholder="{{ __('Name') }}"
                                        name="name"
                                        id="name"
                                        value="{{ old('name', auth()->user()->name) }}"
                                        required
                                />
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <x-label for="email" :value="__('Email')"/>
                                <x-input
                                        type="email"
                                        name="email"
                                        id="email"
                                        value="{{ old('email', auth()->user()->email) }}"
                                        placeholder="{{ __('Email') }}"
                                        required
                                />
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <x-label for="password" :value="__('New password')"/>
                                <x-input
                                        type="password"
                                        name="password"
                                        id="password"
                                        placeholder="{{ __('New password') }}"
                                        required
                                />
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <x-labelfor="password_confirmation" :value="__('New password confirmation')"/>
                                <x-input
                                        type="password"
                                        name="password_confirmation"
                                        id="password_confirmation"
                                        placeholder="{{ __('New password confirmation') }}"
                                        required
                                />
                            </div>
                        </div>
                    </div>

                    <x-divider/>

                    <div class="mt-6">
                        <x-button>
                            {{ __('Submit') }}
                        </x-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
