@extends('layouts.app')

@section('content')
    <div class="main">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
            <div class="d-block mb-4 mb-md-0">
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                        <li class="breadcrumb-item">
                            <a href="#">
                                <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">{{ __('Volt') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Profile') }}</li>
                    </ol>
                </nav>
                <h2 class="h4">{{ __('Profile') }}</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-xl-8">
                <div class="card card-body border-0 shadow mb-4">
                    <h2 class="h5 mb-4">General information</h2>
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row align-items-center">
                            <div class="col-md-6 mb-3">
                                <label for="email">{{ __('Your Email') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                            </path>
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z">
                                            </path>
                                        </svg>
                                    </span>
                                    <input type="email" name="email" class="form-control"
                                        placeholder="{{ __('Email') }}" id="email"
                                        value="{{ old('email', auth()->user()->email) }}" required readonly>
                                </div>
                                @error('email') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="name">{{ 'Your Name' }}</label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </span>
                                    <input id="name" class="form-control" type="text" name="name"
                                        placeholder="{{ __('Name') }}"
                                        value="{{ old('email', auth()->user()->name) }}" required>
                                </div>
                                @error('name') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-md-6 mb-3">
                                <label for="password">{{ __('New Password') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2">
                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                clip-rule="evenodd">
                                            </path>
                                        </svg>

                                    </span>
                                    <input type="password" name="password" placeholder="{{ __('New Password') }}"
                                        class="form-control" id="password" required>
                                </div>
                                @error('password') <div class="invalid-feedback"> {{ $message }} </div> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon3">
                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                                clip-rule="evenodd">
                                            </path>
                                        </svg>

                                    </span>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        id="password_confirmation" placeholder="{{ __('New password confirmation') }}"
                                        required autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-gray-800 mt-2 animate-up-2">{{ __('Submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 col-xl-4">
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="card shadow border-0 text-center p-0">
                            <div class="profile-cover rounded-top">
                            </div>
                            <div class="card-body pb-5">
                                <img class="avatar-xl rounded-circle mx-auto mt-n7 mb-4"
                                    src="https://ui-avatars.com/api/?background=random&name={{ Auth::user()->name }}"
                                    alt="{{ Auth::user()->name }}">
                                <h4 class="h3">{{ auth()->user()->name }}</h4>
                                <h5 class="fw-normal">Senior Software Engineer</h5>
                                <p class="text-gray mb-4">New York, USA</p>
                                <a class="btn btn-sm btn-gray-800 d-inline-flex align-items-center me-2" href="#">
                                    <svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z">
                                        </path>
                                    </svg>
                                    Connect
                                </a>
                                <a class="btn btn-sm btn-secondary" href="#">Send Message</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
