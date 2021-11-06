<ul class="nav flex-column pt-3 pt-md-0">
    <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link d-flex align-items-center">
            <span class="sidebar-icon me-3">
                <img src="/assets/img/brand/light.svg" height="20" width="20" alt="Volt Logo">
            </span>
            <span class="mt-1 ms-1 sidebar-text">
                Volt Laravel
            </span>
        </a>
    </li>
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a href="{{ route('dashboard') }}" class="nav-link">
            <span class="sidebar-icon">
                <x-svg.dashboard />
            </span>
            <span class="sidebar-text">Dashboard</span>
        </a>
    </li>
</ul>
