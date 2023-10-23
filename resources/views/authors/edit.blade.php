@extends('layouts.app')

@section('content')
<h1 class="mb-0">Edit Author</h1>
<hr />
<form action="{{ route('authors.update', $author->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $author->name }}">
            <label class="form-label">Bio</label>
            <input type="text" name="bio" class="form-control" placeholder="Name" value="{{ $author->bio }}">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('authors.index') }}" class="btn btn-warning">Back</a>
        </div>
    </div>
</form>
@endsection