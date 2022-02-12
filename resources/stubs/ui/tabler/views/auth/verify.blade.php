@extends('layouts.app')

@section('content')
    <div class="page-body">
        <div class="container-xl">

            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        {{ __('Verify Your Email Address') }}
                    </div>
                </div>
                <div class="card-body">
                    <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                    
                    {{ __('If you did not receive the email') }},

                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf

                        <button type="submit" class="btn btn-primary">{{ __('click here to request another') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
