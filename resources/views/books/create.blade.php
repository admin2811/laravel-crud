@extends('layouts.app')
  
@section('title', 'Create Books')
  
@section('content')
    <h1 class="mb-0">Add Books</h1>
    <hr />
    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        @method('POST')
        <div class="row mb-3">  
            <div class="col">
                <input type="text" name="author_id" class="form-control" placeholder="Book" required>
                @if($errors->has('author_id'))
                    <p class="text-danger">{{ $errors->first('author_id') }}</p>
                @endif
            </div>
            <div class="col">
                <input type="text" name="title" class="form-control" placeholder="Title" required>
                @if($errors->has('title'))
                    <p class="text-danger">{{ $errors->first('title') }}</p>
                @endif
            </div>   
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('books.index') }}" class="btn btn-warning">Back</a>
            </div>
        </div>
    </form>
@endsection
