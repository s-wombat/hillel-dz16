@extends('layouts.app')

@section('content')
    <h1>Create event</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('events.store') }}">
        @csrf
         <div class="row">
            <div class="col">
                <label for="inputTitle" class="form-label">Title</label>
                <input type="text" id="inputTitle" class="form-control" name="title" placeholder="Title" aria-label="Title">
            </div>
            <div class="col">
                <label for="inputNotes" class="form-label">Notes</label>
                <input type="text" id="inputNotes" class="form-control" name="notes" placeholder="Notes" aria-label="Notes">
            </div>
         </div>
         <div class="row">
            <div class="col">
                <label for="inputDateStart" class="form-label">Date Start</label>
                <input type="date" id="inputDateStart" class="form-control" name="dt_start" placeholder="Date Start" aria-label="Date Start">
            </div>
             <div class="col">
                <label for="inputUser" class="form-label">Select User</label>
                 <select id="inputUser" class="form-select" name="user" aria-label="User">
                     @foreach($users as $user)
                         <option value="@if(isset($user->id)) {{ $user->id }} @endif">{{$user->name}}</option>
                     @endforeach
                 </select>
            </div>
         </div>
        <div class="row">
             <div class="col">
                 <div class="col">
                     <label for="inputDateEnd" class="form-label">Date End</label>
                     <input type="date" id="inputDateEnd" class="form-control" name="dt_end" placeholder="Date End" aria-label="Date End">
                 </div>
             </div>
             <div class="col">
                <button type="submit" class="btn btn-primary btn-user-save">Save</button>
             </div>
        </div>
    </form>
@endsection