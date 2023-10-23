@extends('layouts.app')
 
@section('content')
    <h1 class="mb-0">Detail Author</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="author" class="form-control" placeholder="Author" value="{{ $author->name }}" readonly>
            <label class="form-label">Bio</label>
            <input type="text" name="bio" class="form-control" placeholder="Author" value="{{ $author->bio }}" readonly>
            
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{ route('authors.index')}}" class="btn btn-warning">Back</a>
        </div>
    </div>
@endsection