<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
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
Route::get('/', function() {
    return view('index');
});


Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories');

Route::group(['prefix' => ''], static function() {
    Route::get('/categories/{category_id}/news', [NewsController::class, 'index'])
        ->name('news')->where('category_id', '\d+');

    Route::get('/news/{id}/show', [NewsController::class, 'show'])
        ->where('id', '\d+')
        ->name('news.show');
});



