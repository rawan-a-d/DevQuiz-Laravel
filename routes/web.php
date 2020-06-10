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
    return view('index');
});
Route::get('/profile/{id}', 'UserController@show');

Route::get('/aboutus', function () {
    return view('aboutus');
});
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/quizpage/{subject}/{level}/', 'QuestionController@first');

Route::get('/quizpage/{subject}/{level}/{id}/{correct}', 'QuestionController@next');

Route::post('/contact', 'MessageController@store');

Route::resource('/admin/messages', 'MessageController');

Route::put('admin/users/{user}/admin', 'UserController@toAdmin');
Route::put('admin/users/{user}/subscriber', 'UserController@toSubscriber');
Route::resource('/admin/users', 'UserController');

Route::resource('/admin/quizzes', 'QuestionController');
