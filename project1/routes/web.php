<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/create-posts', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::post('/store-posts', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::get('/show-posts', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');
Route::get('/edit-posts/{post}', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
Route::put('/update-posts/{post}', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
Route::get('/delete-posts/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.delete');
Route::get('/show-single-post/{post}', [App\Http\Controllers\PostController::class, 'singlePostShow'])->name('singlePost.show');
Route::get('/create-category', [App\Http\Controllers\CategoryController::class,'create'])->name('category.create');
Route::post('/store-category', [App\Http\Controllers\CategoryController::class,'store'])->name('category.store');
Route::get('/show-categories', [App\Http\Controllers\CategoryController::class,'show'])->name('category.show');
Route::get('/edit-categories/{category}', [App\Http\Controllers\CategoryController::class,'edit'])->name('category.edit');
Route::get('/delete-categories/{category}', [App\Http\Controllers\CategoryController::class,'destroy'])->name('category.delete');
Route::put('/update-categories/{category}', [App\Http\Controllers\CategoryController::class,'update'])->name('category.update');

Route::get('/about', function(){
    return view('about');
})->name('about');

Route::get('/contact', function(){
    return view('contact');
})->name('contact');

    
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
