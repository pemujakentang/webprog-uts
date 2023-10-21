<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;

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

Route::get('/reload-captcha', [LoginController::class, 'reloadCaptcha']);
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/admin/dashboard/order', function () {
    return view('admin.order');
});

Route::get('/admin/dashboard/edit', function () {
    return view('admin.edit');
});

Route::get('/admin/dashboard/add', function () {
    return view('admin.add');
});