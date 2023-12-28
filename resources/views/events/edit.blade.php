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
    <form method="POST"
          @if(isset($event->id))
              action="{{ route('events.update', $event->id) }}"
            @endif
    >
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col">
                <label for="inputTitle" class="form-label">Title</label>
                <input type="text" id="inputTitle" class="form-control" name="title" value="@if(isset($event)) {{ $event->title }} @endif" placeholder="Title">
            </div>
            <div class="col">
                <label for="inputNotes" class="form-label">Notes</label>
                <input type="text" id="inputNotes" class="form-control" name="notes" value="@if(isset($event)) {{ $event->notes }} @endif" placeholder="Notes">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="inputDateStart" class="form-label">Date Start</label>
                <input type="text" id="inputDateStart" class="form-control" name="dt_start" value="@if(isset($event)) {{ $event->dt_start }} @endif" aria-label="Date Start">
            </div>
            <div class="col">
                <label for="inputUser" class="form-label">Select User</label>
                <select id="inputUser" class="form-select" name="user" aria-label="User">
                    @foreach($users as $user)
                        <option value="@if(isset($user)) {{ $user->id }} @endif" @if($event->user->id == $user->id) selected @endif>{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="col">
                    <label for="inputDateEnd" class="form-label">Date End</label>
                    <input type="text" id="inputDateEnd" class="form-control" name="dt_end" value="@if(isset($event)) {{ $event->dt_end }} @endif" aria-label="Date End">
                </div>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary btn-user-save">Save</button>
            </div>
        </div>
    </form>
@endsection