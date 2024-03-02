<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('app');
});
Route::get("/list-post", [PostController::class, 'list'])->name('list-post');
Route::post("/create-post", [PostController::class, 'create'])->name('create-post');
Route::post("/update-post", [PostController::class, 'update'])->name('update-post');
Route::post("/delete-post", [PostController::class, 'delete'])->name('delete-post');

