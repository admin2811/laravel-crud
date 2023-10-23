<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::latest()->paginate(8);
        return view('authors.index',compact('authors'));   
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'bio' => 'required',
        ]);
        
        $author = Author::create($request->all());
        
        if ($author) {
            Toastr::success('Add author successfully');
            return redirect()->route('authors.index');
        } else {
            Toastr::error('Thêm mới tác giả thất bại');
            return redirect()->back();
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view('authors.show',compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('authors.edit',compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required',
            'bio' => 'required',
        ]);
        $author->update($request->all());
        Toastr::success('success','Update Successfully');
        return redirect()->route('authors.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
        Toastr::success('success','Delete Successful');
        return redirect()->route('authors.index');
    }
}
