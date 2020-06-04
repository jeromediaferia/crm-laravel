<?php

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
Route::name('admin.')->prefix('admin')->middleware('auth')->group(function(){
//    Route::resource('articles', 'Admin\ArticleController');
    // Upload de fichier
    Route::resource('employes', 'Admin\EmployeController');

    // Restriction des images pour les administrateur
    Route::get('private-image/{imageName}', function($imageName){
        if( Gate::denies('isAdmin') ){
            abort(403);
        }
        return response()->file(storage_path('app/prive/images/'.$imageName));
    })->name('image');

    // Ajout d'utilisateur dans notre application avec FETCH/AJAX
    Route::resource('users', 'Admin\UserController');
});



