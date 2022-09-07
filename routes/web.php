<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeedbackFormController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\NewsSourceController as AdminNewsSourceController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as AdminController;

use App\Http\Controllers\OrderFormController;
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
})->name('index');

Route::get('/hello', function () {
    return view('hello');
});

Route::get('/about', function () {
    return view('about');
});

Route::middleware('auth')->group(function () {
    Route::get('/account', AccountController::class)
        ->name('account');

    //Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::middleware('is_admin')->prefix('admin')->name('admin.')->group( function() {
        Route::get('/', AdminController::class)
            ->name('index');
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('news', AdminNewsController::class);
        Route::resource('news_sources', AdminNewsSourceController::class);
        Route::resource('users', AdminUserController::class);
    });
});

Route::get('/news/{news:slug}', [NewsController::class, 'show'])
    ->name('news.show');

Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories.index');

Route::get('/contacts', function() {
    return view('contacts.index');
})->name('contacts.index');

Route::post('/contacts', FeedbackFormController::class)
    ->name('feedback_form');

Route::get('/make-order', function() {
    return view('make_order.index');
})->name('make_order.index');

Route::post('/make-order', OrderFormController::class)
    ->name('order_form');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
