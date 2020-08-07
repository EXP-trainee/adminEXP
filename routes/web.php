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
Route::get('/dashboard', 'UserController@dashboard')->name('dashboard');

Route::get('/showTodo', 'TodoController@showTodo')->name('showTodo');
Route::get('/showUser', 'UserController@showUser')->name('showUser');

Route::get('/shownhanvien', 'UserController@showNhanVien')->name('showNhanVien');
Route::get('/createnhanvien','UserController@createNhanVien')->name('createNhanVien');
Route::post('/postnhanvien','UserController@postNhanVien')->name('postNhanVien');
Route::get('/editnhanvien/{id}','UserController@editNhanVien')->name('editNhanVien');
Route::post('/updatenhanvien/{id}','UserController@updateNhanVien')->name('updateNhanVien');
Route::get('/deleteNhanvien/{id}','UserController@deleteNhanvien')->name('deleteNhanVien');
