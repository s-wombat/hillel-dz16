@extends('layouts.app')

@section('content')
    <h1>Edit event</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <x-form method="POST" action="{{ route('events.update', $event->id) }}">
        @method('PUT')
        <div class="row">
            <div class="col">
                <x-label form-label for="inputTitle">Title</x-label>
                <x-input type="text" id="inputTitle" name="title" :value="$event->title" placeholder="Title" />
            </div>
            <div class="col">
                <x-label form-label for="inputNotes">Notes</x-label>
                <x-input type="text" id="inputNotes" name="notes" :value="$event->notes" placeholder="Notes" />
            </div>
        </div>
        <div class="row">
            <div class="col">
                <x-label form-label for="inputDateStart">Date Start</x-label>
                <x-input type="text" id="inputDateStart" name="dt_start" :value="$event->dt_start" />
            </div>
            <div class="col">
                <x-label form-label for="inputUser">Select User</x-label>
                <x-select name="user" id="inputUser">
                    @foreach($users as $user)
                        <option value="@isset($user) {{ $user->id }} @endisset" @if($event->user->id == $user->id) selected @endif>{{$user->name}}</option>
                    @endforeach
                </x-select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="col">
                    <x-label form-label for="inputDateEnd">Date End</x-label>
                    <x-input type="text" id="inputDateEnd" name="dt_end" :value="$event->dt_end" />
                </div>
            </div>
            <div class="col">
                <x-button type="submit" class="btn-user-save">Save</x-button>
            </div>
        </div>
    </x-form>
@endsection