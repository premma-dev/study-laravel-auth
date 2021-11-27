<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// protected route from home page
// user need to login and verify email
Route::get('/home', function () {
    return view('welcome') . Auth::user()->name;
})->middleware(['auth','verified']);


Route::get('/admin', function () {
    return 'admin page';
});
