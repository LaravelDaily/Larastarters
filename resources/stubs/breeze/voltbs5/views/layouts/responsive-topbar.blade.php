<div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
    <div class="d-flex align-items-center">
        <div class="avatar-lg me-4">
            <img class="card-img-top rounded-circle border-white"
                src="https://ui-avatars.com/api/?background=random&name={{ Auth::user()->name }}"
                alt="{{ Auth::user()->name }}">
        </div>
        <div class="d-block">
            <h2 class="h5 mb-3">Hi, {{ auth()->user()->name }}</h2>
            <a class="btn btn-secondary btn-sm d-inline-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                <form method="POST" id="logout-form" action="{{ route('logout') }}">
                    @csrf
                </form>
                <x-svg.logout class="icon icon-xxs me-1" />
                {{ __('Sign Out') }}
            </a>
        </div>
    </div>
    <div class="collapse-close d-md-none">
        <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
            aria-expanded="true" aria-label="Toggle navigation">
            <x-svg.close />
        </a>
    </div>
</div>
