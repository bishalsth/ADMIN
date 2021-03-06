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

// Route::get('/admin','AdminController@login');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::match(['get','post'],'/admin','AdminController@login');



Route::get('/admin/logout','AdminController@logout');

Route::group(['middleware'=> ['auth']],function(){
    Route::get('/admin/dashboard','AdminController@dashboard');
});