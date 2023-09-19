<?php


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
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

//using controller

// to wecome page
Route::get('/', [WelcomeController::class, 'index'])->name('welcome.index'); // using controller is the best practice

// to blog page
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');

// to create new posts
Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
// Route::get('/create', function(){
//     return view('blogPosts.create_blog_post');
// })->name('create');

// to single blog post
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

// // to search a single blog post
// Route::get('/blog/{search}', [BlogController::class, 'search'])->name('blog.search');

// to edit single blog post
Route::get('/blog/{post}/edit', [BlogController::class, 'edit'])->name('blog.edit');

// to Delete single blog post
Route::delete('/blog/{post}/destroy', [BlogController::class, 'destroy'])->name('blog.destroy');

// to update single blog post
Route::put('/blog/{post}', [BlogController::class, 'update'])->name('blog.update');

// to store new post into the database
Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');

// category resource controller
Route::resource('/categories', CategoryController::class);
// GET|HEAD        categories ...................categories.index › CategoryController@index 
// POST            categories ...................categories.store › CategoryController@store 
// GET|HEAD        categories/create ............categories.create › CategoryController@create 
// GET|HEAD        categories/{category} ....... categories.show › CategoryController@show 
// PUT|PATCH       categories/{category} ........categories.update › CategoryController@update 
// DELETE          categories/{category} ........categories.destroy › CategoryController@destroy 
// GET|HEAD        categories/{category}/edit ...categories.edit › CategoryController@edit 


// to about page
Route::get('/about', function(){
    return view('about');
})->name('about');

// to contact page  //->name('contact.index'); its called named routes
Route::get('/contact', [ContactController::class,'index'])->name('contact.index');
// to send email from contact form 
Route::post('/contact/store', [ContactController::class,'store'])->name('contact.store');
 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
