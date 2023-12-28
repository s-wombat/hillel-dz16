@extends('layouts.app')

@section('content')
    <div>
        <h2>Event:</h2>
        <p>Id = {{ $event->id }}</p>
        <p>Title = {{ $event->title }}</p>
        <p>Notes = {{ $event->notes }}</p>
        <p>Date Start = {{ $event->dt_start }}</p>
        <p>Date End = {{ $event->dt_end }}</p>
    </div>
@endsection
