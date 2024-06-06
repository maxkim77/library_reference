<?php

use Scriptotek\GoogleBooks\GoogleBooks;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/test', function () {
    $books = new GoogleBooks();
    dd($books->volumes->search('php'));
});

Auth::routes();

Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('books/{id}', [BookController::class, 'show'])->name('books.show');
Route::get('mybooks', [BookController::class, 'mybooks'])->name('books.mybooks'); // 이름 변경

Route::post('like', [LikeController::class, 'like']);
Route::post('unlike', [LikeController::class, 'unlike']);

// Auth::routes(); // 중복 제거

Route::get('/home', [HomeController::class, 'index'])->name('home');
