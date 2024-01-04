@extends('layouts.app')

@section('content')
    <h1>Create category</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        <div class="row">
            <div class="col">
                <label for="inputName" class="form-label">Name</label>
                <input type="text" id="inputName" class="form-control" name="name" placeholder="Name">
            </div>
            <div class="col">
                <label for="inputDescription" class="form-label">Description</label>
                <input type="text" id="inputDescription" class="form-control" name="description" placeholder="Description">
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

<style>
    .btn-user-save {
        margin: 32px 0;
    }
</style>
