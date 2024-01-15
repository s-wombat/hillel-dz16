@extends('layouts.app')

@section('content')
    <a class="btn btn-outline-primary" href="{{ route('users.create') }}" role="button">Create user</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Options</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            @include('users.partials.row', ['user' => $user])
        @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
@endsection