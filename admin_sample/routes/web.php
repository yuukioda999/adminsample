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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('user', 'UserController')->only(['index', 'store', 'update', 'destroy']);
Route::group(['middleware' => ['auth.admin']], function () {
	
	//管理側トップ
	Route::get('/admin', 'admin\AdminTopController@show');
	//ログアウト実行
	Route::post('/admin/logout', 'admin\AdminLogoutController@logout');
	//ユーザー一覧
	Route::get('/admin/user_list', 'admin\ManageUserController@showUserList')->name('list');;
	//ユーザー詳細
	Route::get('/admin/user/{id}', 'admin\ManageUserController@showUserDetail');
	//ユーザー更新
	Route::get('/admin/edit/{id}', 'admin\ManageUserController@showUserEdit');
	// //ユーザー更新
	Route::post('/admin/update', 'admin\ManageUserController@exeUpdate')->name('update');
	// //ユーザー削除
	Route::post('/admin/delete/{id}', 'admin\ManageUserController@exeDelete')->name('delete');
	
	
	

});

//管理側ログイン
Route::get('/admin/login', 'admin\AdminLoginController@showLoginform');
Route::post('/admin/login', 'admin\AdminLoginController@login');