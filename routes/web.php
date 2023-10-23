<?php

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

Route::get('/home', function () {
    return view('Home.index', ['user' => Auth::user()]);
});

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

Route::get('/my-order', function () {
    return view('my-order.myorder');
});

Route::get('/reload-captcha', [LoginController::class, 'reloadCaptcha']);

Route::controller(OrderController::class)->group(function(){
    Route::get('/admin/dashboard/order', 'dashboard')->middleware('auth');
});

Route::controller(MenuController::class)->group(function(){
    Route::match(['get', 'post'], '/admin/dashboard', 'dashboard')->middleware('auth');
    Route::get('/admin/dashboard/add', 'create')->middleware('auth');;
    Route::post('/admin/dashboard/store', 'store');
    Route::get('/admin/dashboard/checkSlug', 'checkSlug');
    Route::get('/admin/dashboard/{menu:slug}/edit', 'edit');
    Route::put('/admin/dashboard/{menu:slug}/update', 'update');
    Route::delete('/admin/dashboard/{menu:slug}/delete', 'destroy');
    // Route::post('/admin/dashboard/send-data', 'sortAndCat');

});
