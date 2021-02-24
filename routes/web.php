<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Front\CommentController;
use App\Http\Controllers\Front\Newsletter;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Route;

// Socialite

Route::get('auth/facebook', [SocialController::class, 'facebookRedirect']);

Route::get('auth/facebook/callback', [SocialController::class, 'loginWithFacebook']);

// Admin
Route::group(['middleware' => 'superAdmin'], function () {

// Website logo

Route::get('/logo/manage-logo', [App\Http\Controllers\Admin\ImageController::class, 'manageLogo'])->name('manage-logo');
Route::post('/logo/add-logo', [App\Http\Controllers\Admin\ImageController::class, 'addLogo'])->name('add-logo');
Route::post('/logo/delete-logo', [App\Http\Controllers\Admin\ImageController::class, 'deleteLogo'])->name('delete-logo');
// publish & unpublish logo
Route::get('/logo/unpublish-logo/{id}', [App\Http\Controllers\Admin\ImageController::class, 'unpublishLogo'])->name('unpublish-logo');
Route::get('/logo/publish-logo/{id}', [App\Http\Controllers\Admin\ImageController::class, 'publishLogo'])->name('publish-logo');

// Messages
Route::get('/message/manage-message', [App\Http\Controllers\Admin\MessageController::class, 'manageMessage'])->name('manage-message');
Route::post('/message/visitor-message', [App\Http\Controllers\Admin\MessageController::class, 'visitorMessage'])->name('visitor-message');
Route::get('/message/view-message/{id}', [App\Http\Controllers\Admin\MessageController::class, 'viewMessage'])->name('view-message');
Route::post('/message/delete-message', [App\Http\Controllers\Admin\MessageController::class, 'deleteMessage'])->name('delete-message');


// Category
Route::get('/category/add-category', [App\Http\Controllers\Admin\CategoryController::class, 'addCategory'])->name('add-category');
Route::get('category/manage-category', [App\Http\Controllers\Admin\CategoryController::class, 'manageCategory'])->name('manage-category');
Route::post('category/new-category', [App\Http\Controllers\Admin\CategoryController::class, 'newCategory'])->name('new-category');
Route::get('category/edit-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'editCategory'])->name('edit-category');
Route::post('category/update-category', [App\Http\Controllers\Admin\CategoryController::class, 'updateCategory'])->name('update-category');
Route::post('category/delete-category', [App\Http\Controllers\Admin\CategoryController::class, 'deleteCategory'])->name('delete-category');

// Publish and unpublish

Route::get('category/unpublish-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'unpublishCategory'])->name('unpublish-category');
Route::get('category/publish-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'publishCategory'])->name('publish-category');

// Blog
Route::get('/blog/view-blog/{id}', [App\Http\Controllers\Admin\BlogController::class, 'viewBlog'])->name('view-blog');
Route::get('/blog/add-blog', [App\Http\Controllers\Admin\BlogController::class, 'addBlog'])->name('add-blog');
Route::get('/blog/manage-blog', [App\Http\Controllers\Admin\BlogController::class, 'manageBlog'])->name('manage-blog');
Route::post('/blog/new-blog', [App\Http\Controllers\Admin\BlogController::class, 'newBlog'])->name('new-blog');
Route::get('/blog/edit-blog/{id}', [App\Http\Controllers\Admin\BlogController::class, 'editBlog'])->name('edit-blog');
Route::post('/blog/update-blog/', [App\Http\Controllers\Admin\BlogController::class, 'updateBlog'])->name('update-blog');
Route::post('/blog/delete-blog/', [App\Http\Controllers\Admin\BlogController::class, 'deleteBlog'])->name('delete-blog');

// Comment
Route::get('/comment/manage-comment/', [App\Http\Controllers\Admin\CommentController::class, 'manageComment'])->name('manage-comment');
Route::get('/comment/unpublish-comment/{id}', [App\Http\Controllers\Admin\CommentController::class, 'unpublishComment'])->name('unpublish-comment');
Route::get('/comment/publish-comment/{id}', [App\Http\Controllers\Admin\CommentController::class, 'publishComment'])->name('publish-comment');
Route::post('/comment/delete-comment', [App\Http\Controllers\Admin\CommentController::class, 'deleteComment'])->name('delete-comment');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Front

Route::get('/', [App\Http\Controllers\Front\ProjectController::class, 'index'])->name('/');

Route::get('/about-us', [App\Http\Controllers\Front\ProjectController::class, 'aboutUs'])->name('about');
Route::get('/contact', [App\Http\Controllers\Front\ProjectController::class, 'contactUs'])->name('contact');


Route::get('/news/news-details/{id}', [App\Http\Controllers\Front\ProjectController::class, 'blogDetails'])->name('blog-details');
Route::get('/all-news', [App\Http\Controllers\Front\ProjectController::class, 'allNews'])->name('all-news');
Route::get('/category-news/{id}', [App\Http\Controllers\Front\ProjectController::class, 'categoryNews'])->name('category-news');

// Visitor login/Register
Route::get('/visitor-login', [App\Http\Controllers\Front\VisitorController::class, 'visitorLogin'])->name('visitor-login');
Route::get('/visitor-register', [App\Http\Controllers\Front\VisitorController::class, 'visitorRegister'])->name('visitor-register');
Route::post('/new-visitor', [App\Http\Controllers\Front\VisitorController::class, 'newVisitor'])->name('new-visitor');
Route::post('/new-visitor-login', [App\Http\Controllers\Front\VisitorController::class, 'newVisitorLogin'])->name('new-visitor-login');
Route::get('/visitor-logout', [App\Http\Controllers\Front\VisitorController::class, 'visitorLogout'])->name('visitor-logout');

// Check email
Route::get('/check-email/{email}', [App\Http\Controllers\Front\VisitorController::class, 'checkEmail'])->name('check-email');
Route::get('/login-check-email/{email}', [App\Http\Controllers\Front\VisitorController::class, 'loginCheckEmail'])->name('check-email');

// Visitor comment
Route::post('/visitor-comment', [App\Http\Controllers\Front\CommentController::class, 'visitorComment'])->name('visitor-comment');

// Newsletter
Route::post('/newsletter', [App\Http\Controllers\Front\NewsletterController::class, 'newsletter'])->name('newsletter');







