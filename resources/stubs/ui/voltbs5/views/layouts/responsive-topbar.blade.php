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
                <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                    </path>
                </svg>
                {{ __('Log Out') }}
            </a>
        </div>
    </div>
    <div class="collapse-close d-md-none">
        <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
            aria-expanded="true" aria-label="Toggle navigation">
            <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </a>
    </div>
</div>
