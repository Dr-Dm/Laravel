<?php

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

Route::get('/', function () {
    return view("welcome");
});
Route::get('/info', static function () {
   return "This is my first Laravel project";
});
Route::get('/news', static function () {
    return "There will be news here";
});
Route::get('/news/{id}', static function (int $id): string {
    return "News number {$id}";
});

