<?php

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

//登录相关路由都定义在上面Auth::routes()方法内
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/posts', 'PostController');

Route::get('users/{users}', function (\App\User $user){
    dd($user);
});