@extends('layouts.app')

@section('content')
    <div class="main py-4">
        <div class="card card-body border-0 shadow table-wrapper table-responsive">
            <h2 class="mb-4 h5">{{ __('Users') }}</h2>

            <p class="text-info mb-0">Sample table page</p>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="border-gray-200">{{ __('Name') }}</th>
                        <th class="border-gray-200">{{ __('Email') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td><span class="fw-normal">{{ $user->name }}</span></td>
                            <td><span class="fw-normal">{{ $user->email }}</span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div
                class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
