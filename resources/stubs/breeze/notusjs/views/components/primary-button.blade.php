<button {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150']) }}>
    {{ $slot }}
</button>
