<button {{ $attributes->merge(['type' => 'submit', 'class' => 'py-2 px-4 text-center bg-indigo-600 rounded-md w-full text-white text-sm hover:bg-indigo-500']) }}>
    {{ $slot }}
</button>
