<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{ asset('css/lineicons.css') }}"/>
    @vite('resources/sass/app.scss')
</head>
<body>
<!-- ======== sidebar-nav start =========== -->
<aside class="sidebar-nav-wrapper">
    <div class="navbar-logo">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/logo/logo.svg') }}" alt="logo"/>
        </a>
    </div>
    <nav class="sidebar-nav">
        @include('layouts.navigation')
    </nav>
</aside>
<div class="overlay"></div>
<!-- ======== sidebar-nav end =========== -->

<!-- ======== main-wrapper start =========== -->
<main class="main-wrapper">
    <!-- ========== header start ========== -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-6">
                    <div class="header-left d-flex align-items-center">
                        <div class="menu-toggle-btn mr-20">
                            <button
                                id="menu-toggle"
                                class="main-btn primary-btn btn-hover"
                            >
                                <i class="lni lni-chevron-left me-2"></i> {{ __('Menu') }}
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-6">
                    <div class="header-right">
                        <!-- profile start -->
                        <div class="profile-box ml-15">
                            <button
                                    class="dropdown-toggle bg-transparent border-0"
                                    type="button"
                                    id="profile"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                            >
                                <div class="profile-info">
                                    <div class="info">
                                        <h6>{{ Auth::user()->name }}</h6>
                                    </div>
                                </div>
                                <i class="lni lni-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                                <li>
                                        <a href="{{ route('profile.show') }}"> <i class="lni lni-user"></i> {{ __('My profile') }}</a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"> <i class="lni lni-exit"></i> {{ __('Logout') }}</a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <!-- profile end -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ========== header end ========== -->

    <!-- ========== section start ========== -->
    <section class="section">
        <div class="container-fluid">
            @yield('content')
        </div>
        <!-- end container -->
    </section>
    <!-- ========== section end ========== -->

    <!-- ========== footer start =========== -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 order-last order-md-first">
                    <div class="copyright text-md-start">
                        <p class="text-sm">
                            Designed and Developed by
                            <a
                                    href="https://plainadmin.com"
                                    rel="nofollow"
                                    target="_blank"
                            >
                                PlainAdmin
                            </a>
                        </p>
                    </div>
                </div>
                <!-- end col-->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </footer>
    <!-- ========== footer end =========== -->
</main>
<!-- ======== main-wrapper end =========== -->

<!-- ========= All Javascript files linkup ======== -->
@vite('resources/js/app.js')
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
