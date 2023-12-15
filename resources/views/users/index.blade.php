@extends('layouts.app')

@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
        </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                @include('partials.rowUser', ['user' => $user])
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
@endsection