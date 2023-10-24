<?php

use App\Http\Controllers\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;

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

// Route::get('/menu', function () {
//     return view('user.index', ['user' => Auth::user()]);
// });

Route::get('/', function(){
    return view('landing.index');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'authenticate');

    Route::get('/signup', 'signup_view');
    Route::post('/signup', 'signup');
});


Route::get('/logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/login');
});

Route::get('/reload-captcha', [LoginController::class, 'reloadCaptcha']);

Route::controller(OrderController::class)->group(function(){
    Route::match(['get', 'post'], '/admin/dashboard/order', 'dashboard')->middleware('auth');
    Route::get('/my-orders', 'showOrder')->middleware("auth");
    Route::post('/my-orders-filter', 'orders')->middleware('auth');
    Route::put('/admin/change-status/{id}', 'changeStatus')->middleware('auth');
    Route::post('/order', 'order')->middleware('auth');
    Route::get('/reset-cart', 'resetCart');

    Route::get('/order/success', 'redirectSuccess');
});

Route::controller(MenuController::class)->group(function(){
    Route::match(['get', 'post'], '/admin/dashboard', 'dashboard')->middleware('auth');
    Route::get('/admin/dashboard/add', 'create')->middleware('auth');
    Route::post('/admin/dashboard/store', 'store')->middleware('auth');
    Route::get('/admin/dashboard/checkSlug', 'checkSlug')->middleware('auth');
    Route::get('/admin/dashboard/{menu:slug}/edit', 'edit')->middleware('auth');
    Route::put('/admin/dashboard/{menu:slug}/update', 'update')->middleware('auth');
    Route::delete('/admin/dashboard/{menu:slug}/delete', 'destroy')->middleware('auth');
    Route::match(['get', 'post'], '/menu', 'mainMenuPage');
    Route::get('/{menu:slug}', 'show')->middleware('auth');
    Route::post('/cart/{id}', 'addToCart');
});

Route::controller(CartController::class)->group(function(){
    Route::delete('/cart/{id}/delete', 'removeFromCart')->middleware('auth');
    Route::get('/cart/{id}/edit', 'editCartView')->middleware('auth');
    Route::put('/cart/{id}/update', 'editCart')->middleware('auth');
    Route::get('/my-orders/summary', 'checkout')->middleware('auth');
});