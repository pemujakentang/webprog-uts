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
    return view('landing.index');
});

Route::get('/login', function () {
    return view('AUTH.login');
});

Route::get('/signup', function () {
    return view('AUTH.signup');
});

Route::get('/my-order', function () {
    return view('my-order.myorder');
});

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

Route::get('/order/summary', function () {
    return view('menu.summary');
});