<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function (  ) {
//     return view('welcome');
// });
//Hiển thị ra index khi chạy server
Route::get('/',[AuthorController::class,'index']);
Route::resource('authors',AuthorController::class);
Route::resource('books',BookController::class);
