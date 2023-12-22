@extends('layouts.app')

@section('content')
    <h1>Create user</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
         <div class="row">
            <div class="col">
                <label for="inputName" class="form-label">Full Name</label>
                <input type="text" id="inputName" class="form-control" name="name" placeholder="Full name" aria-label="Full name">
            </div>
            <div class="col">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="text" id="inputPassword" class="form-control" name="password" placeholder="Password" aria-label="Password">
            </div>
         </div>
         <div class="row">
            <div class="col">
                <label for="inputEmail" class="form-label">Email address</label>
                <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email" aria-label="Email">
            </div>
             <div class="col">
                <label for="inputPasswordConfirmation" class="form-label">Password Confirmation</label>
                <input type="text" id="inputPasswordConfirmation" class="form-control" name="password_confirmation" placeholder="Password Confirmation" aria-label="Password Confirmation">
            </div>
         </div>
        <div class="row">
             <div class="col">
                <label for="inputRole" class="form-label">Role</label>
                 <select class="form-select" id="inputRole"  name="role" aria-label="Role">
                     <option value="0">User</option>
                     <option value="1">Admin</option>
                 </select>
            </div>
             <div class="col">
                <button type="submit" class="btn btn-primary btn-user-save">Save</button>
             </div>
        </div>
    </form>
@endsection