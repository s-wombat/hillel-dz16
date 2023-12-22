@extends('layouts.app')

@section('content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">DateTime</th>
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