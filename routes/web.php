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
    return view('auth/login');
});
// Route::get('/index', 'HomeController@index');
// Route::get('/top', 'HomeController@top');
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
// Route::prefix('user')->group(function(){
//     Route::get('edit', 'UserController@edit');
//     Route::post('edit', 'UserController@update');
// });
Route::resource('users', 'UserController');
Route::resource('books', 'BookController');