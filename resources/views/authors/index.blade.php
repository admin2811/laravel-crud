@extends('layouts.app')
@section('title','Author')
@section('content')

<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">List Author</h1>
    <a href="{{ route('authors.create')}}" class="btn btn-primary">Add Product</a>
</div>
<hr />
<table class="table table-hover">
    <thead class="table-primary">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Bio</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if($authors->count() > 0)
        @foreach($authors as $rs)
        <tr>
            <td class="align-middle">{{ $rs->id }}</td>
            <td class="align-middle">{{ $rs->name }}</td>
            <td class="align-middle">{{ $rs->bio }}</td>
            <td class="align-middle">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('authors.show',$rs->id)}}" type="button" class="btn btn-secondary">Detail</a>
                    <a href="{{ route('authors.edit',$rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $rs->id }}"> Delete </button>
                    <form action="{{route('authors.destroy',$rs->id)}}" method="post">
                        <div class="modal fade" id="deleteModal-{{ $rs->id }}" tabindex="- 1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Confirmation</h5> <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body"> Are you sure you want to delete this author? </div>
                                    <div class="modal-footer"> <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('authors.destroy', $rs->id) }}" method="POST"> @csrf @method('DELETE') 
                                            <button type="submit" class="btn btn-danger">Delete</button> 
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td class="text-center" colspan="5">Author not found</td>
        </tr>
        @endif
    </tbody>
</table>
<div class="d-flex">
    {!! $authors->links() !!}
</div>
@endsection
<!--  -->