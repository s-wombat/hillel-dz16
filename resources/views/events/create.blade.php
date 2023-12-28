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
    <x-form method="POST" action="{{ route('events.store') }}">
         <div class="row">
            <div class="col">
                <x-label form-label for="inputTitle">Title</x-label>
                <x-input name="title" id="inputTitle" placeholder="Title"  />
            </div>
            <div class="col">
                <x-label form-label for="inputNotes">Notes</x-label>
                <x-input name="notes" id="inputNotes" placeholder="Notes" />
            </div>
         </div>
         <div class="row">
            <div class="col">
                <x-label form-label for="inputDateStart">Date Start</x-label>
                <x-input type="date" name="dt_start" id="inputDateStart" placeholder="Date Start" />
            </div>
             <div class="col">
                <x-label form-label for="inputUser">Select User</x-label>
                 <x-select name="user" id="inputUser">
                     @foreach($users as $user)
                         <option value="@if(isset($user->id)) {{ $user->id }} @endif">{{$user->name}}</option>
                     @endforeach
                 </x-select>
            </div>
         </div>
        <div class="row">
             <div class="col">
                 <div class="col">
                     <x-label form-label for="inputDateEnd">Date End</x-label>
                     <x-input type="date" name="dt_end" id="inputDateEnd" placeholder="Date End" />
                 </div>
             </div>
             <div class="col">
                <x-button type="submit" class="btn-user-save">Save</x-button>
             </div>
        </div>
    </x-form>
@endsection