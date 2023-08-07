<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SocialProvidersController;
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
    return view('welcome');

});

Route::group(['middleware' => 'auth'], static function() {


    Route::group(['prefix' => 'account', 'middleware' => 'auth'], static function() {
    Route::get('/', AccountController::class)->name('account');
});

    // Admin
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
        'middleware' => 'check.admin',

        ], static function() {
        Route::get('/', AdminController::class)
        ->name('index');
        Route::get('/parser', ParserController::class)
            ->name('parser');
        Route::resource('/categories', AdminCategoryController::class);
        Route::resource('/news', AdminNewsController::class);
});
});


Route::group(['middleware' => 'guest'], function () {
    Route::get('/{driver}/redirect', [SocialProvidersController::class, 'redirect'])
        ->where('driver', '\w+')
        ->name('social-providers.redirect');

    Route::get('{driver}/callback', [SocialProvidersController::class, 'callback'])
        ->where('driver', '\w+')
        ->name('social-providers.callback');
});

Route::resource('/categories', CategoryController::class)->only(['index', 'show', 'create', 'store']);


Route::group(['prefix' => ''], static function() {
    Route::get('/categories/{category_id}/news', [NewsController::class, 'index'])
        ->name('news')->where('category_id', '\d+');

    Route::get('/news/{news}/show', [NewsController::class, 'show'])
        ->where('news', '\d+')
        ->name('news.show');
});

Route::get('/sessions', function () {
    if (session()->has('mysession')) {
        dd(session()->all(), session()->get('mysession'));
        session()->forget('mysession');
    }
    //session()->put('mysession', 'Test Session');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

