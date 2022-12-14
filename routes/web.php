<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BlogController;
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
//
//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/blog-details/{slug}',[HomeController::class,'blogDetails'])->name('blog.details');
Route::get('/blog-category/{categoryId}',[HomeController::class,'category'])->name('blog.category');
Route::get('/about',[HomeController::class,'aboutDetails'])->name('about.details');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/user-reg',[HomeController::class,'userReg'])->name('user.reg');
Route::post('/save-user',[HomeController::class,'saveUser'])->name('user.register');
Route::get('/user-login',[HomeController::class,'userLogin'])->name('user.login');
Route::post('/user-login',[HomeController::class,'LoginCheck'])->name('user.login');
Route::get('/user-logout',[HomeController::class,'logout'])->name('user.logout');

Route::get('/user-profile/{id}',[HomeController::class,'userProfile'])->name('user.profile');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::get('/category',[CategoryController::class,'category'])->name('category');
    Route::post('/category-create',[CategoryController::class,'save'])->name('category.create');
    Route::get('/category-edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
    Route::post('/category-edit-save',[CategoryController::class,'editSave'])->name('category.edit.save');
    Route::post('/category-delete',[CategoryController::class,'delete'])->name('category.delete');

    Route::get('/author',[AuthorController::class,'author'])->name('author');
    Route::post('/author-create',[AuthorController::class,'authorSave'])->name('author.create');
    Route::get('/author-edit/{id}',[AuthorController::class,'edit'])->name('author.edit');
    Route::post('/author-edit-save',[AuthorController::class,'editSave'])->name('author.edit.save');
    Route::post('/author-delete',[AuthorController::class,'delete'])->name('author.delete');

    Route::get('/blog',[BlogController::class,'index'])->name('blog');
    Route::post('/new-blog',[BlogController::class,'save'])->name('new.blog');
    Route::get('/blog-manage',[BlogController::class,'manageBlog'])->name('manage.blog');
    Route::get('/edit-blog/{id}',[BlogController::class,'edit'])->name('edit.blog');
    Route::post('/blog-update',[BlogController::class,'update'])->name('blog.update');
    Route::get('/edit-status/{id}',[BlogController::class,'editStatus'])->name('edit.status');
    Route::post('/blog-delete',[BlogController::class,'delete'])->name('blog.delete');
});


