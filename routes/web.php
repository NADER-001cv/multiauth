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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


############# multi auth start#############


Route::get('/site','MultiauthController@site')->middleware('auth');


Route::get('/admin','MultiauthController@admin')->middleware('auth:admin');

Route::get('login/admin','MultiauthController@loginadmin')->name('login.admin')->middleware('admin:admin');

Route::post('login/admin','MultiauthController@authenticate')->name('save.admin.login');







#################### end multi auth ###########