<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
// ratings functions
Route::get('product/{id}/rating',[RatingController::class , 'viewRatingProduct'])->name('prduct.addRating');
Route::post('product/{id}/rating',[RatingController::class , 'storeRatingProduct'])->name('prduct.storeRating');
Route::get('post/{id}/rating',[RatingController::class , 'viewRatingPost'])->name('post.addRating');
Route::post('post/{id}/rating',[RatingController::class , 'storeRatingPost'])->name('post.storeRating');

//crud product
Route::resource('products', ProductController::class)->middleware('auth');
//crud posts
Route::resource('posts', PostController::class)->middleware('auth');
