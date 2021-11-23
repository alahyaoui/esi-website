<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentRegisterController;
use App\Http\Controllers\StudentListController;

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
    return view('layouts.app');
});

Route::get('/index', function () {
    return view('layouts.app');
});

Route::get('/example', function () {
    return view('example');
});

Route::get('/programme', function () {
    return view('programme');
});

Route::get('/pae', function () {
    return view('pae');
});

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::get('/studentregister', 'App\Http\Controllers\StudentRegisterController@index')->name('studentregister');

Route::post('studentregister', 'App\Http\Controllers\StudentRegisterController@store')->name('storeStudent');

Route::get('/studentlist', 'App\Http\Controllers\StudentListController@index');

Route::get('/{path}', 'App\Http\Controllers\DownloadFileController@index')->name('download_file');

// TODO: Add file upload routes (and Controller)
// https://www.positronx.io/laravel-file-upload-with-validation/
