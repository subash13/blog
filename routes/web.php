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

Route::get('/', [
    'uses'=>'FrontendController@index',
     'as'=>'index'
]);

Auth::routes();

Route::group(['prefix'=>'admin','middleware'=>'auth'],function (){
    Route::get('/home', [
        'uses'=>'HomeController@index',
        'as'=>'home'
    ]);
    Route::get('/category',[
        'uses'=>'CategoryController@index',
        'as'=>'category.index'
    ]);
    Route::get('/category/create',[
        'uses'=>'CategoryController@create',
        'as'=>'category.create'
    ]);
    Route::get('/category/edit/{id}',[
        'uses'=>'CategoryController@edit',
        'as'=>'category.edit'
    ]);
    Route::post('/Category/update/{id}',[
        'uses'=>'CategoryController@update',
        'as'=>'category.update'
    ]);
    Route::get('/category/delete/{id}',[
        'uses'=>'CategoryController@destroy',
        'as'=>'category.destroy'
    ]);
    Route::post('/Category/store',[
        'uses'=>'CategoryController@store',
        'as'=>'category.store'
    ]);
    Route::get('/post',[
        'uses'=>'PostController@index',
        'as'=>'post.index'
    ]);
    Route::get('/post/trash',[
        'uses'=>'PostController@trash',
        'as'=>'post.trash'
    ]);
    Route::get('/post/create',[
        'uses'=>'PostController@create',
        'as'=>'post.create'
    ]);
    Route::get('/post/edit/{id}',[
        'uses'=>'PostController@edit',
        'as'=>'post.edit'
    ]);
    Route::post('/post/update/{id}',[
        'uses'=>'PostController@update',
        'as'=>'post.update'
    ]);
    Route::get('/post/delete/{id}',[
        'uses'=>'PostController@destroy',
        'as'=>'post.destroy'
    ]);
    Route::get('/post/kill/{id}',[
        'uses'=>'PostController@kill',
        'as'=>'post.kill'
    ]);
    Route::get('/post/restore/{id}',[
        'uses'=>'PostController@restore',
        'as'=>'post.restore'
    ]);
    Route::post('/post/store',[
        'uses'=>'PostController@store',
        'as'=>'post.store'
    ]);
    Route::get('/tag',[
        'uses'=>'TagController@index',
        'as'=>'tag.index'
    ]);
    Route::get('/tag/create',[
        'uses'=>'TagController@create',
        'as'=>'tag.create'
    ]);
    Route::get('/tag/edit/{id}',[
        'uses'=>'TagController@edit',
        'as'=>'tag.edit'
    ]);
    Route::post('/tag/update/{id}',[
        'uses'=>'TagController@update',
        'as'=>'tag.update'
    ]);
    Route::get('/tag/delete/{id}',[
        'uses'=>'TagController@destroy',
        'as'=>'tag.destroy'
    ]);
    Route::post('/tag/store',[
        'uses'=>'TagController@store',
        'as'=>'tag.store'
    ]);
    Route::get('/users',[
        'uses'=>'UsersController@index',
        'as'=>'user.index'
    ]);
    Route::get('/users/create',[
        'uses'=>'UsersController@create',
        'as'=>'user.create'
    ]);
    Route::post('/users/store',[
        'uses'=>'UsersController@store',
        'as'=>'user.store'
    ]);
    Route::get('/users/makeadmin/{id}',[
        'uses'=>'UsersController@makeadmin',
        'as'=>'user.admin'
    ]);
    Route::get('/users/makenotadmin/{id}',[
        'uses'=>'UsersController@makenotadmin',
        'as'=>'user.notadmin'
    ]);
    Route::get('/users/profile',[
        'uses'=>'ProfileController@index',
        'as'=>'profile.index'
    ]);
    Route::post('/users/profile/update',[
        'uses'=>'ProfileController@update',
        'as'=>'profile.update'
    ]);
    Route::post('/tag/update/{id}',[
        'uses'=>'TagController@update',
        'as'=>'tag.update'
    ]);
    Route::get('/user/delete/{id}',[
        'uses'=>'UsersController@destroy',
        'as'=>'user.destroy'
    ]);
    Route::get('/settings',[
        'uses'=>'SettingsController@index',
        'as'=>'settings.index'
    ])->middleware('admin');
    Route::post('/settings/update',[
        'uses'=>'SettingsController@update',
        'as'=>'settings.update'
    ])->middleware('admin');



});



