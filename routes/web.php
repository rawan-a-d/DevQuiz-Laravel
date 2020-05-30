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
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/aboutus', function () {
    return view('aboutus');
});
Route::get('/quizpage', function () {
    return view('quizpage');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::post('/contact/submit', 'MessageController@create');

Route::resource('/admin/messages', 'MessageController');

Route::put('admin/users/{user}/admin', 'UserController@toAdmin');
Route::put('admin/users/{user}/subscriber', 'UserController@toSubscriber');
Route::resource('/admin/users', 'UserController');

Route::resource('/admin/quizzes', 'QuestionController');
