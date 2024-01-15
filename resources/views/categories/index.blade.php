@extends('layouts.app')

@section('content')
    <a class="btn btn-outline-primary" href="{{ route('categories.create') }}" role="button">Create category</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Options</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            @include('categories.partials.row', ['$category' => $category])
        @endforeach
        </tbody>
    </table>
@endsection