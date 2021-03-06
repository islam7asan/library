<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Book:read
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/show/{id}', [BookController::class, 'show'])->name('book.show');
//Book:create
Route::get('books/create',[BookController::class, 'create'])->name('books.create');
Route::post('books/create',[BookController::class, 'create'])->name('books.create');
//Book:update
Route::get('books/update/{id}',[BookController::class, 'update'])->name('books.update');
Route::post('books/update/{id}',[BookController::class, 'update'])->name('books.update');
//Book:delete
Route::get('books/delete/{id}',[BookController::class, 'delete'])->name('books.delete');