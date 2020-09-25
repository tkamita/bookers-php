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
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/book/like/{id}', 'BookController@like')->name('book.like');
Route::get('/book/unlike/{id}', 'BookController@unlike')->name('book.unlike');
Route::resource('users', 'UserController');
Route::resource('books', 'BookController');
Route::post('/book/comment/{id}', 'CommentController@comment')->name('book.comment');
Route::delete('book/comment/{id}', 'CommentController@destroy')->name('delete.comment');
