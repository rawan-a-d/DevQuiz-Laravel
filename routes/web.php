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

Auth::routes();

/* Authenticated users */
Route::middleware('auth')->group(function() {
    Route::get('/home', 'HomeController@index')->name('home');
});

/* ALLOW ONLY ADMIN TO ACCESS THOSE ROUTES */
Route::group(['middleware'=>'admin'], function(){
    Route::resource('/admin/users', 'UserController');
    Route::put('admin/users/{user}/admin', 'UserController@toAdmin');
    Route::put('admin/users/{user}/subscriber', 'UserController@toSubscriber');

    Route::resource('/admin/messages', 'MessageController')->middleware('auth');

    Route::resource('/admin/quizzes', 'QuestionController');
});
