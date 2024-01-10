@extends('layouts.app')

@section('content')
    <h1>Edit user</h1>
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
        @if(isset($user->id))
            action="{{ route('users.update', $user->id) }}"
        @endif
    >
        @method('PUT')
        @csrf
         <div class="row">
            <div class="col">
                <label for="inputName" class="form-label">Full Name</label>
                <input type="text" id="inputName" class="form-control" name="name" value="@if(isset($user->id)) {{ $user->name }} @endif" placeholder="Full name" aria-label="Full name">
            </div>
            <div class="col">
                <label for="inputEmail" class="form-label">Email address</label>
                <input type="email" id="inputEmail" class="form-control" name="email" value="@if(isset($user->id)) {{ $user->email }} @endif" placeholder="Email" aria-label="Email">
            </div>
         </div>
         <div class="row">
            <div class="col">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" id="inputPassword" class="form-control" name="password" value="" placeholder="Password" aria-label="Password">
            </div>
             <div class="col">
                 <label for="inputRole" class="form-label">Role</label>
                 <select class="form-select" id="inputRole"  name="role" aria-label="Role">
                     <option value="0" @if($user->role == 0) selected @endif>User</option>
                     <option value="1" @if($user->role == 1) selected @endif>Admin</option>
                 </select>
             </div>
         </div>
        <div class="row">
            <div class="col"></div>
             <div class="col">
                <button type="submit" class="btn btn-primary btn-user-save">Save</button>
             </div>
        </div>
    </form>
@endsection