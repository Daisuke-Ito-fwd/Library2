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
Route::post('orgLogin', 'LoginController@authenticate');

//ajax用  
Route::post('/api/allBooks', 'ajaxBooksController@index');
Route::post('/api/searchBooks', 'ajaxBooksController@index');
Route::post('/api/books_data', 'ajaxBooksController@data');
Route::post('/api/deleteBooks', 'ajaxBooksController@delete');
Route::post('/api/updateBook', 'ajaxBooksController@update');


// 初回アクセス ###########
Route::get('lib','LibController@index')->name('first');
// Laravel標準ログイン機能へ
// Route::get('lib','LibController@login')->name('first');


//  承認後アクセス #############################
Route::get('lib/index', 'LoginRouteController@admin')->name('Route')->middleware('auth');


//  管理画面 #################################
// https://www.ritolab.com/entry/56 アクセス制限について

Route::Group(['middleware'=>['auth', 'can:admin-only']], function(){

    // to addUser
Route::get('lib/addUser', 'adminController@addUser')->name('re')->middleware('auth');
// to addBook
Route::get('lib/addBook', 'adminController@addBook')->name('reBook')->middleware('auth');
// to searchUsers
Route::get('lib/searchUsers', 'adminController@searchUsers')->middleware('auth');
// to searchBooks
Route::get('lib/searchBooks', 'adminController@searchBooks')->middleware('auth');

// ユーザー追加画面 #####################
// to confPage
Route::post('lib/addUserConf', 'addUserController@post')->middleware('auth');
// to insert&fin Page
Route::post('lib/insert', 'addUserController@insert')->middleware('auth');

// ユーザー検索
Route::get('lib/adSearch', 'searchUserController@get')->middleware('auth');
Route::any('lib/edit', 'searchUserController@edit')->name('reEd')->middleware('auth');
Route::any('lib/editUserConf', 'searchUserController@editConf')->middleware('auth');
Route::any('lib/editUserFin', 'searchUserController@editFin')->middleware('auth');

//ajax用    
// Route::any('ajaxUser', 'ajaxController@index');
Route::post('/api/searchUser', 'ajaxController@index');
Route::post('/api/allUsers', 'ajaxController@index');
Route::post('/api/deleteUsers', 'ajaxController@delete');
Route::post('/api/updateUser', 'ajaxController@update');
Route::post('/api/checkEmail', 'ajaxController@email');


// ユーザー削除




// 書籍追加画面 #########################
Route::get('lib/addBookConf', 'addBookController@get');
Route::get('lib/insertbook', 'addBookController@insert');
});

// ログアウト
Route::get('lib/logout', 'LogOutController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// mail

Route::get('/mail', 'SendMailController@send');