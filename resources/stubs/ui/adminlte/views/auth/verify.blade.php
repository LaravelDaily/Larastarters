@extends('layouts.app')

@section('content')
    <div class="card-body login-card-body">
        <p class="login-box-msg">{{ __('Verify Your Email Address') }}</p>

        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif

        {{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }},
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <div class="row">
                <div class="col-12">
                    <button type="submit"
                            class="btn btn-primary btn-block">{{ __('click here to request another') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
