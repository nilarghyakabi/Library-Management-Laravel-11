<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function view(request $request){
        $book = Book::all();
        $search = $request->input('search');

        $book = Book::when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhereHas('author', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%");
                });
        })->get();

        $author=Author::all();
        return view('books.view')
            ->with('author', $author)
            ->with('book', $book)
            ->with('is_view', 1);
//        return view('books.view',compact('book'));
    }
    public function store(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'author_id' => 'required',
                'category' => 'required',
                'year' => 'required',
            ]);

            // Create a new book
            $book = new Book();
            $book->name = $request->input('name');
            $book->author_id = $request->input('author_id');
            $book->category = $request->input('category');
            $book->year = $request->input('year');
            $book->copy = $request->input('copy');
            $book->save();


            return redirect()->route('books.view')->with('success', 'Book created successfully!');
        }
    public function form()
    {
        $authors = Author::all();
        return view('books.form',compact('authors'));
    }
        public function edit($id)
        {
            $book = Book::find($id);
            if (!$book) {
                abort(404);
            }
            $authors = Author::all();
            return view('books.edit', compact('book','authors'));
        }

        public function update(Request $request, $id){
            $book = Book::find($id);
            if (!$book) {
                abort(404);
            }

            $request->validate([
                'name' => 'required',
                'author_id' => 'required|numeric',
                'category' => 'required',
                'year' => 'required|numeric',
            ]);

            $book->name = $request->input('name');
            $book->author_id = $request->input('author_id');
            $book->category = $request->input('category');
            $book->year = $request->input('year');
            $book->copy = $request->input('copy');

            $book->save();

            return redirect()->route('books.view')->with('success', 'Book updated successfully');
        }

    public function delete($id)
    {
        $book = Book::find($id);
        if ($book) {
            $book->delete();
            return redirect()->route('books.view')->with('success', 'Book deleted successfully');
        } else {
            return redirect()->route('books.view')->with('error', 'Book not found');
        }
    }

    //USER FUNCTION
    public function userView(Request $request){
        $book =Book::all();
        $search = $request->input('search');

        $book = Book::when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhereHas('author', function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('category', 'like', "%{$search}%");
                });
        })->get();

        $author=Author::all();
        return view('books.userView')
            ->with('author', $author)
            ->with('book', $book)
            ->with('is_view', 1);
    }

}
