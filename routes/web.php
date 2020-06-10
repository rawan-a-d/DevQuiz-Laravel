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

/* ALLOW ONLY ADMIN TO ACCESS THOSE ROUTES */
Route::middleware('auth')->group(function() {
//    Route::resource('/admin/messages', 'MessageController')->middleware('auth');
//
//    Route::put('admin/users/{user}/admin', 'UserController@toAdmin');
//    Route::put('admin/users/{user}/subscriber', 'UserController@toSubscriber');
      //Route::resource('/admin/users', 'UserController');

    //Route::resource('/admin/quizzes', 'QuestionController');


    Route::get('/home', 'HomeController@index')->name('home');
});


//Route::middleware(['role:admin','auth'])->group(function(){
//
//    Route::get('admin/users', 'UserController@index')->name('users.index');
//});


Route::group(['middleware'=>'admin'], function(){
    Route::resource('/admin/users', 'UserController');
    Route::put('admin/users/{user}/admin', 'UserController@toAdmin');
    Route::put('admin/users/{user}/subscriber', 'UserController@toSubscriber');

    Route::resource('/admin/messages', 'MessageController')->middleware('auth');

    Route::resource('/admin/quizzes', 'QuestionController');
});
