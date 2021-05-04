<?php

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

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('Admin')->group(function () {
Route::get('/login', 'App\Http\Controllers\Admin\AdminController@index');
Route::post('/login', 'App\Http\Controllers\Admin\AdminController@adminLogin')->name('login');;
Route::get('/register', 'App\Http\Controllers\Admin\AdminController@showAdminLoginForm');
Route::post('/register', 'App\Http\Controllers\Admin\AdminController@createAdmin')->name('register');
Route::get('/home', 'App\Http\Controllers\Admin\DashboardController@index')->name('home');
Route::get('/logout', 'App\Http\Controllers\Admin\AdminController@logout')->name('logout');
});