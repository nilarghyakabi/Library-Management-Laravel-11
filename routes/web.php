<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::prefix('books')->group(function () {
    Route::get('/view', [BookController::class, 'view'])->name('books.view');
    Route::get('/form', [BookController::class, 'form'])->name('books.form');
    Route::post('/store', [BookController::class, 'store'])->name('books.store');
    Route::get('/edit/{id}', [BookController::class, 'edit'])->name('books.edit');
    Route::post('/update/{id}', [BookController::class, 'update'])->name('books.update');
    Route::get('/delete/{id}', [BookController::class, 'delete'])->name('books.delete');

    //FOR USER
    Route::get('/userView', [BookController::class, 'userView'])->name('books.userView');


});
Route::prefix('author')->group(function () {
    Route::get('/view', [AuthorController::class, 'view'])->name('author.view');
    Route::get('/form', [AuthorController::class, 'create'])->name('author.form');
    Route::post('/store', [AuthorController::class, 'store'])->name('author.store');
    Route::get('/edit/{id}', [AuthorController::class, 'edit'])->name('author.edit');
    Route::post('/update/{id}', [AuthorController::class, 'update'])->name('author.update');
    Route::get('/delete/{id}', [AuthorController::class, 'delete'])->name('author.delete');
});
Route::middleware('auth')->group(function () {
    Route::get('/books/{id}/borrow', [BorrowController::class, 'borrowBook'])->name('books.borrow');
    Route::get('/borrow/{id}/details', [BorrowController::class, 'showBorrowDetails'])->name('borrows.detailsId');
    Route::get('/borrow/my-list', [BorrowController::class, 'details'])->name('borrow.userIndex');
    Route::get('/borrows', [BorrowController::class, 'index'])->name('borrows.index');
    Route::post('/borrows/{id}/return', [BorrowController::class, 'return'])->name('borrows.return');
});

Route::get('admin/dashboard',[HomeController::class,'index'])->
middleware(['auth', 'admin'])->name('admin.dashboard');
require __DIR__.'/auth.php';
