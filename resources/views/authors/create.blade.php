@extends('layouts.app')
  
@section('title', 'Create Author')
  
@section('content')
    <h1 class="mb-0">Add Author</h1>
    <hr />
    <form action="{{ route('authors.store') }}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        @method('POST')
        <div class="row mb-3">  
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="Name Author" required>
            </div>
            <div class="col">
                <input type="text" name="bio" class="form-control" placeholder="Bio Author" required>
            </div>
            
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('authors.index') }}" class="btn btn-warning">Quay Lại</a>
            </div>
        </div>
    </form>
@endsection
