<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" ddSmiddleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::any('orgLogin', 'orgLoginController@login');
Route::any('orgLogin', 'LoginController@authenticate');



a
// 初回アクセス ###########
Route::get('lib','LibController@index')->name('first');
// Laravel標準ログイン機能へ
// Route::get('lib','LibController@login')->name('first');


//  承認後アクセス #############################
Route::get('lib/ad', 'LoginRouteController@admin')->name('Route');


//  管理画面 #################################
// to addUser
Route::get('lib/addUser', 'adminController@addUser')->name('re');//->middleware('auth');
// to addBook
Route::get('lib/addBook', 'adminController@addBook')->name('reBook');//->middleware('auth');
// to searchUsers
Route::get('lib/searchUsers', 'adminController@searchUsers');//->middleware('auth');
// to searchBooks
Route::get('lib/searchBooks', 'adminController@searchBooks');//->middleware('auth');

// ユーザー追加画面 #####################
// to confPage
Route::post('lib/addUserConf', 'addUserController@post');
// to insert&fin Page
Route::post('lib/insert', 'addUserController@insert');

// 書籍追加画面 #########################
Route::get('lib/addBookConf', 'addBookController@get');
Route::get('lib/insertbook', 'addBookController@insert');
// ログアウト
Route::get('lib/logout', 'LogOutController@logout');
