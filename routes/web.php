<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!xa
|
*/

Route::get('/', [BooksController::class, 'index'])->name('start');
Route::get('/books/unique_num', [BooksController::class, 'unique_num'])->name('unique_num');
Route::get('/books/showArr', [BooksController::class, 'showArr'])->name('showArr');
Route::get('/books/result', [BooksController::class, 'result'])->name('result');
Route::get('/books/clear', [BooksController::class, 'clear'])->name('clear');
Route::get('/books/insert', [BooksController::class, 'insert'])->name('insert');