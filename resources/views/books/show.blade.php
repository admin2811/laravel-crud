@extends('layouts.app')
 
@section('content')
    <h1 class="mb-0">Detail Book</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Author_ID</label>
            <input type="text" name="author_id" class="form-control" placeholder="Author_Id" value="{{ $book->author_id }}" readonly>
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="" value="{{ $book->title }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{ route('books.index')}}" class="btn btn-warning">Back</a>
        </div>
    </div>s
@endsection