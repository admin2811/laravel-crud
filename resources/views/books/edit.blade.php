@extends('layouts.app')

@section('content')
<h1 class="mb-0">Edit Book</h1>
<hr />
<form action="{{ route('books.update', $book->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Author ID</label>
            <input type="text" name="author_id" class="form-control" placeholder="Name" value="{{ $book->author_id }}">
            @if($errors->has('author_id'))
            <p class="text-danger">{{ $errors->first('author_id') }}</p>
            @endif
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Name" value="{{ $book->title }}">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('books.index') }}" class="btn btn-warning">Back</a>
        </div>
    </div>
</form>
@endsection