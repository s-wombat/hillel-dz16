@extends('layouts.app')

@section('content')
    <h1>Edit category</h1>
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
          @if(isset($category->id))
              action="{{ route('categories.update', $category->id) }}"
            @endif
    >
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col">
                <label for="inputName" class="form-label">Full Name</label>
                <input type="text" id="inputName" class="form-control" name="name" value="@if(isset($category->id)) {{ $category->name }} @endif" placeholder="Name">
            </div>
            <div class="col">
                <label for="inputDescription" class="form-label">Description</label>
                <input type="text" id="inputDescription" class="form-control" name="description" value="@if(isset($category->id)) {{ $category->description }} @endif" placeholder="Description">
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