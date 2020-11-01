<?php

use Illuminate\Support\Facades\Route;
use App\Profile;
use App\User;
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

/*Route::get('/', function () {
    return view('layouts.app');
});*/


Auth::routes();

Route::get('/Dashboard', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
  
    Route::resource('Dashboard/posts','PostsController');
    Route::resource('Dashboard/users','usersController');
    Route::resource('Dashboard/category','CategoryController');

});
//env('APP_URL')
Route::domain('localhost')->group(function () {
  Route::get('/','IndexController@index');
});

Route::domain('blog.'.env('APP_DOMAIN'))->group(function () {
  Route::get('/','BlogController@index');
  Route::get('/post/{title}','PostsController@show');
Route::get('/all/{id}','CategoryController@show');
});

