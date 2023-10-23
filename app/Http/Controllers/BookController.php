<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::latest()->paginate(8);
        return view('books.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'author_id' => 'required|numeric',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('books.create')
                ->withErrors($validator)
                ->withInput();
        }
    
        $book = Book::create($request->all());
    
        if ($book) {
            Toastr::success('Add book successfully');
            return redirect()->route('books.index');
        } else {
            Toastr::error('Add book failed');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        // Validate the incoming data
        $request->validate([
            'title' => 'required',
            'author_id' => 'numeric',
        ]);
    
        // Update the book's information
        $book->update($request->all());
    
        if ($book) {
            Toastr::success('Update book successfully');
            return redirect()->route('books.index');
        } else {
            Toastr::error('Update book failed');
            return redirect()->back();
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        Toastr::success('Delete book successfully');
        return redirect()->route('books.index');
    }
}
