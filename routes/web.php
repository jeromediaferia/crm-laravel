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

// Restriction administration
//Route::->prefix('/')->->middleware('auth')->group(function(){
//    Route::resource('/articles', 'Admin\ArticleController');
//    //
//});
