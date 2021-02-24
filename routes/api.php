<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/hello', [App\Http\Controllers\ApiController::class, 'hello']);
Route::get('/published-categories', [App\Http\Controllers\ApiController::class, 'publishedCategories']);
Route::get('/category-blog/{id}', [App\Http\Controllers\ApiController::class, 'categoryBlog']);
Route::get('/latest-blog', [App\Http\Controllers\ApiController::class, 'latestBlog']);
Route::get('/blog-details/{id}', [App\Http\Controllers\ApiController::class, 'blogDetails']);
