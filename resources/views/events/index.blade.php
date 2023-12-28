@extends('layouts.app')

@section('content')
    <x-a-button class="btn btn-outline-primary" href="{{ route('events.create') }}">Create</x-a-button>
{{--    <x-button class="btn btn-outline-danger" type="submit">Delete</x-button>--}}
{{--    <x-a-button class="btn btn-outline-secondary" href="">Edit</x-a-button>--}}
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Notes</th>
            <th scope="col">Date Start</th>
            <th scope="col">Date End</th>
            <th scope="col">User</th>
            <th scope="col">Options</th>
        </tr>
        </thead>
        <tbody>
        @foreach($events as $event)
            @include('partials.row_event', ['event' => $event])
        @endforeach
        </tbody>
    </table>
    {{ $events->links() }}
@endsection