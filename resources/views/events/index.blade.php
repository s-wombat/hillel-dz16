@extends('layouts.app')

@section('content')
    <x-a-button href="{{ route('events.create') }}" color="outline-primary">Create</x-a-button>
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
            @include('events.partials.row', ['event' => $event])
        @endforeach
        </tbody>
    </table>
    {{ $events->links() }}
@endsection