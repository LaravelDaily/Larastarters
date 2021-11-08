@props(['errors'])

@if ($errors->any())
    <div class="relative px-6 py-4 mb-4 text-white bg-red-500 rounded border-0">
        <span class="inline-block mr-5 text-xl align-middle">
            <i class="fas fa-bell"></i>
        </span>
        <span class="inline-block mr-8 align-middle">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </span>
    </div>
@endif