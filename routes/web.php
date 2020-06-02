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
    return view('layouts.master');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Restriction vers mon compte
Route::resource('/mon-compte', 'AccountController');

// Restriction admin simplifiée
Route::get('/admin', 'Admin\AdminController@index')->middleware(['auth', 'isAdmin']);

// Restriction administration
//Route::name('admin.')->prefix('admin')->middleware('auth')->group(function(){
//    Route::resource('articles', 'Admin\ArticleController');
//    //
//});
