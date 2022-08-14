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
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/news/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');

Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');

Route::get('/category', [CategoryController::class, 'index'])
    ->name('category.index');
