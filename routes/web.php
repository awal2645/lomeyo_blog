<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogFrontEndController;
use App\Http\Controllers\BlogLikeController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\BlogTagController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use App\Models\BlogLike;
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

Route::get('/', [FrontendController::class,'index'])->name('home.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [('register')::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//admin controller

Route::get('/admin',[AdminController::class,'index'] )->name('admin')->middleware(['auth', 'verified']);

//ADdmin blog Category controller

Route::get('/admin/blogcategory/add', [BlogCategoryController::class,'AddBlogCategory'])->name('add.blog.category')->middleware(['auth', 'verified']);
Route::post('/admin/blogcategory/add',[BlogCategoryController::class ,'StoreBlogCategory'])->name('store.blog.category')->middleware(['auth', 'verified']);
Route::get('/admin/blogcategory/list',[BlogCategoryController::class ,'ListBlogCategory'])->name('list.blog.category')->middleware(['auth', 'verified']);
Route::get('/admin/blogcategory/edit/{id}',[BlogCategoryController::class ,'BlogEdit'])->name('edit.blog.category')->middleware(['auth', 'verified']);
Route::post('/admin/blogcategory/edit/{id}',[BlogCategoryController::class ,'UpdateBlogCategory'])->name('update.blog.category')->middleware(['auth', 'verified']);
Route::get('/admin/blogcategory/del/{id}',[BlogCategoryController::class ,'DelBlogCategory'])->name('del.blog.category')->middleware(['auth', 'verified']);

//ADdmin blog Tag controller

Route::get('/admin/blog/tag/add', [BlogTagController::class,'AddBlogTag'])->name('add.blog.tag')->middleware(['auth', 'verified']);
Route::post('/admin/blog/tag/add',[BlogTagController::class ,'StoreBlogTag'])->name('store.blog.tag')->middleware(['auth', 'verified']);
Route::get('/admin/blog/tag/list',[BlogTagController::class ,'ListBlogTag'])->name('list.blog.tag')->middleware(['auth', 'verified']);
Route::get('/admin/blog/tag/edit/{id}',[BlogTagController::class ,'EditBlogTag'])->name('edit.blog.tag')->middleware(['auth', 'verified']);
Route::post('/admin/blog/tag/edit/{id}',[BlogTagController::class ,'UpdateBlogTag'])->name('update.blog.tag')->middleware(['auth', 'verified']);
Route::get('/admin/blog/tag/del/{id}',[BlogTagController::class ,'DelBlogTag'])->name('del.blog.tag')->middleware(['auth', 'verified']);

//Addmin Blog Post controller

Route::get('/admin/blogpost',[BlogPostController::class, 'AddBlogPost'])->name('add.blog.post')->middleware(['auth', 'verified']);
Route::post('/admin/blogpost',[BlogPostController::class, 'StoreBlogPost'])->name('store.blog.post')->middleware(['auth', 'verified']);
Route::get('/admin/blogpost/list',[BlogPostController::class, 'ListBlogPost'])->name('list.blog.post')->middleware(['auth', 'verified']);
Route::get('/admin/blogpost/preview/{slug}',[BlogPostController::class, 'PreviewBlogPost'])->name('preview.blog.post')->middleware(['auth', 'verified']);
Route::get('/admin/blogpost/edit/{id}',[BlogPostController::class, 'EditBlogPost'])->name('edit.blog.post')->middleware(['auth', 'verified']);
Route::post('/admin/blogpost/edit/{id}',[BlogPostController::class, 'UpdateBlogPost'])->name('update.blog.post')->middleware(['auth', 'verified']);
Route::get('/admin/blogpost/del/{id}',[BlogPostController::class, 'DelBlogPost'])->name('del.blog.post')->middleware(['auth', 'verified']);



//ADdmin blog Frontend controller
Route::get('/all',[BlogFrontEndController::class, 'AllPost'])->name('all.post');
Route::get('/admin/blog/frontend/add', [BlogFrontEndController::class,'AddBlogFrontend'])->name('add.blog.frontend')->middleware(['auth', 'verified']);
Route::post('/admin/blog/frontend/edit/{id}',[BlogFrontEndController::class ,'UpdateBlogFrontend'])->name('update.blog.frontend')->middleware(['auth', 'verified']);
Route::get('post/tag/{id}',[BlogFrontEndController::class, 'TagPost'])->name('tag.post');
Route::get('post/category/{category_slug}',[BlogFrontEndController::class, 'CategoryPost'])->name('category.post');
Route::get('/search',[BlogFrontEndController::class, 'Search'])->name('search');

//
Route::resource('comments',CommentController::class);
Route::post('likes',[BlogLikeController::class, 'store'])->name('likes.store');
Route::get('likes/del/{id}',[BlogLikeController::class, 'destroy'])->name('likes.destroy');
require __DIR__.'/auth.php';