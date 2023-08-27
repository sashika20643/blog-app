<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;



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
    return redirect(route('blog.show'));
});

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', [PostController::class, 'indexpage'])->name('dash.index');


    //..................routes for categories............................
    Route::prefix('categories')->group(function () {
        // List all categories
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');

        // Display the category creation form
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');

        // Store a new category in the database
        Route::post('/', [CategoryController::class, 'store'])->name('categories.store');

        // Display the category editing form
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');

        // Update an existing category in the database
        Route::put('/{category}', [CategoryController::class, 'update'])->name('categories.update');

        // Delete a category
        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    });


    //.....................contacts................................
    Route::prefix('contacts')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('Contacts.index');


    });
    //.........................posts Routes .....................................
    Route::prefix('posts')->group(function () {

        // List all posts
        Route::get('/', [PostController::class, 'index'])->name('posts.index');

        // Display the post creation form
        Route::get('/create', [PostController::class, 'create'])->name('posts.create');

        // Store a new post in the database
        Route::post('/', [PostController::class, 'store'])->name('posts.store');

        // Display the post editing form
        Route::get('/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

        // Update an existing post in the database
        Route::put('/{post}', [PostController::class, 'update'])->name('posts.update');

        // Delete a post
        Route::delete('/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


    });


});


Route::prefix('/blog')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('blog.show');

    Route::get('post/{id}', [BlogController::class, 'showPost'])->name('blog.post.show');
    Route::get('category/{id}', [BlogController::class, 'showcat'])->name('blog.cat.show');

    Route::get('/about', [BlogController::class, 'about'])->name('blog.aboutme');
    Route::get('/contact', [BlogController::class, 'contact'])->name('blog.contact');
    Route::post('/contact/store', [ContactController::class, 'contactstore'])->name('blog.contactstore');
    Route::post('/posts/search', [PostController::class, 'search'])->name('posts.search');




});

Route::get('/test', function () {
    return view('blog.layouts.bloglayout');
});
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
