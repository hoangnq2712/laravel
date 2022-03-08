<?php

use App\Http\Controllers\EloquentController;
use App\Http\Controllers\PostController;
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
    return view('blade.master');
});

Route::get('/post', [PostController::class, 'index'])->name('post');
Route::get('/post-create', [PostController::class, 'create'])->name('post.create');
Route::post('/post-create', [PostController::class, 'store'])->name('post.store');
Route::get('/post-edit', [PostController::class, 'edit'])->name('post.edit');
Route::post('/post-update', [PostController::class, 'store'])->name('post.update');
Route::get('/post-{id}', [PostController::class, 'show'])->name('post.detail');

Route::get('/post', [PostController::class, 'index'])->name('post');
Route::get('/post-create', [PostController::class, 'create'])->name('post.create');
Route::post('/post-create', [PostController::class, 'store'])->name('post.store');
Route::get('/post-create', [PostController::class, 'edit'])->name('post.edit');
Route::post('/post-update', [PostController::class, 'store'])->name('post.update');
Route::get('/post-{id}', [PostController::class, 'show'])->name('post.detail');

Route::get('/eloquent12', function () {
    return view('eloquent.search');
});

Route::post('/eloquent1', [EloquentController::class, 'eloquent1'])->name('eloquent1');
Route::post('/eloquent2', [EloquentController::class, 'eloquent2'])->name('eloquent2');

Route::get('/create-data', [EloquentController::class, 'createData']);
