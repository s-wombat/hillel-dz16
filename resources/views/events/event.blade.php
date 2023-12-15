@extends('layouts.app')

@section('content')
    <div>
        <p>Id = {{ $event->id }}</p>
        <p>Name = {{ $event->name }}</p>
        <p>Description = {{ $event->description }}</p>
        <p>dateTime = {{ $event->dateTime }}</p>
        <p>Created at = {{ $event->created_at }}</p>
        <p>Updated at = {{ $event->updated_at }}</p>
    </div>
@endsection
