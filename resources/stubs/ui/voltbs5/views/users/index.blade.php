@extends('layouts.app')

@section('content')
    <div class="row py-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    {{ __('Users') }}
                </div>
                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

                <div class="card-footer">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
