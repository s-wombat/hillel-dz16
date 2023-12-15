@extends('layouts.app')

@section('content')
    <div>
        <p>Id = {{ $user->id }}</p>
        <p>Name = {{ $user->name }}</p>
        <p>Description = {{ $user->email }}</p>
        <p>Password = {{ $user->password }}</p>
        @if($user->is_admin == 0)
            <p>Admin = No</p>
        @else
            <p>Admin = Yes</p>
        @endif
        <p>Created at = {{ $user->created_at }}</p>
        <p>Updated at = {{ $user->updated_at }}</p>
    </div>
@endsection
