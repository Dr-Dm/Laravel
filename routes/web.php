<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as AdminController;


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
Route::get('/', function() {
    return view('index');
});


// Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function() {
    Route::get('/', AdminController::class)
        ->name('index');
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
});


Route::resource('/categories', CategoryController::class)->only(['index', 'show', 'create', 'store']);
//
//Route::get('/categories', [CategoryController::class, 'index'])
//    ->name('categories');
//
//Route::get('/categories/discharge', [CategoryController::class, 'discharge'])
//    ->name('categories.discharge');


Route::group(['prefix' => ''], static function() {
    Route::get('/categories/{category_id}/news', [NewsController::class, 'index'])
        ->name('news')->where('category_id', '\d+');

    Route::get('/news/{id}/show', [NewsController::class, 'show'])
        ->where('id', '\d+')
        ->name('news.show');
});



