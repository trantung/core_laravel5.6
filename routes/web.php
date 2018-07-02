<?php

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
    return view('administrator.dashboard');
    // return view('welcome');
});
Route::get('administrator/login', ['uses' => 'Administrators\Auth\AuthsController@getLogin'])->name('login');
Route::post('administrator/login', ['uses' => 'Administrators\Auth\AuthsController@postLogin'])->name('login.post');
Route::post('administrator/register', ['uses' => 'Administrators\Auth\AuthsController@postRegister'])->name('register');
Route::get('administrator/logout', ['uses' => 'Administrators\Auth\AuthsController@getLogout'])->name('logout');
Route::get('user/activation/{token}', 'Administrators\Auth\AuthsController@getActiveUser')->name('user.activate');

Route::group(['prefix' => 'administrator', 'middleware' => 'auth'], function () {
    Route::resource('/dashboard', Administrators\Systems\DashboardController::class);
    Route::resource('branch', Systems\BranchesController::class);

});