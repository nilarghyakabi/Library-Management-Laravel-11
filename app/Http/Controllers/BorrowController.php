<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    public function borrowBook($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return redirect()->back()->with('error', 'Book not found.');
        }
        if ($book->copy <= 0) {
            return redirect()->back()->with('error', 'This book is currently out of stock.');
        }



        $existingBorrow = Borrow::where('user_id', Auth::id())
            ->where('book_id', $book->id)
            ->whereNull('returned_at')
            ->first();

        if ($existingBorrow) {
            return redirect()->back()->with('error', 'You have already borrowed this book. Please return it before borrowing again.');
        }

        $borrow = Borrow::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'borrowed_at' => now(),

        ]);
        $book = $borrow->book;
        $book->copy = $book->copy - 1;
        $book->save();

        return redirect()->route('borrow.userIndex', $borrow->id)->with('success', 'Book borrowed successfully.');
    }

    public function showBorrowDetails($id)
    {
        $borrow = Borrow::with('book', 'user')->find($id);
        if (!$borrow) {
            return redirect()->back()->with('error', 'Borrow record not found.');
        }

        return view('borrows.userIndex', compact('borrow'));
    }

    public function index()
    {
        $borrows = Borrow::with('book', 'user')->get();
        return view('borrows.index', compact('borrows'));
    }

    public function canBorrow(Book $book)
    {
        $borrows = Borrow::where('user_id', $this->id)
            ->where('book_id', $book->id)
            ->whereNull('returned_at')
            ->first();

        return !$borrows;
    }

    public function return(Request $request, $id)
    {
        $borrow = Borrow::find($id);
        if ($borrow) {
            $borrow->returned_at = now();
            $borrow->save();

            $book = $borrow->book;
            $book->copy = $book->copy + 1;
            $book->save();


            return redirect()->back()->with('success', 'Book has been marked as returned');
        } else {
            return redirect()->back()->with('error', 'Book is not currently borrowed');
        }
    }
    public function details(){
        $borrows = Borrow::where('user_id', auth()->id())->get();
        return view('borrows.userIndex', compact('borrows'));
    }
}
