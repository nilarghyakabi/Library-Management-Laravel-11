<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function view(Request $request)
    {
        $authors = Author::all();
        return view('authors.view', compact('authors'));
    }
    public function create(Request $request){

        return view('authors.form');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'country' => 'required',
        ]);

        $author = new Author();
        $author->name = $request->input('name');
        $author->age = $request->input('age');
        $author->country = $request->input('country');
        $author->save();

        return redirect()->route('author.view')->with('success', 'Author created successfully!');
    }

    public function edit(Request $request, $id){
        $author = Author::find($id);
        if (!$author) {
            abort(404);
        }
        return view('authors.edit', compact('author'));
    }
    public function update(Request $request, $id){
        $author = Author::find($id);
        if (!$author) {
            abort(404);
        }

        $request->validate([
            'name' => 'required',
            'age' => 'required|numeric',
            'country' => 'required',
        ]);

        $author->name = $request->input('name');
        $author->age = $request->input('author_id');
        $author->country = $request->input('category');

        $author->save();

        return redirect()->route('author.view')->with('success', 'Book updated successfully');
    }
    public function delete(Request $request, $id){
        $author = Author::find($id);
        if ($author) {
            $author->delete();
            return redirect()->route('author.view')->with('success', 'Book deleted successfully');
        } else {
            return redirect()->route('author.view')->with('error', 'Book not found');
        }
    }




}
