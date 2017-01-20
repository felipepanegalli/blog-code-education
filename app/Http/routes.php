<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PostsController@index');

Route::group(['prefix'=>'auth'], function (){
    Route::get('login', 'Auth\AuthController@getLogin');
    Route::post('login', 'Auth\AuthController@postLogin');
    Route::get('logout', 'Auth\AuthController@getLogout');
});


Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function (){
    Route::group(['prefix'=>'posts'], function (){
        Route::get('', ['as'=>'admin.posts.index', 'uses'=>'PostsAdminController@index']);
        Route::get('add', ['as'=>'admin.posts.add', 'uses'=>'PostsAdminController@add']);
        Route::post('store', ['as'=>'admin.posts.store', 'uses'=>'PostsAdminController@store']);
        Route::get('edit/{id}', ['as'=>'admin.posts.edit', 'uses'=>'PostsAdminController@edit']);
        Route::put('update/{id}', ['as'=>'admin.posts.update', 'uses'=>'PostsAdminController@update']);
        Route::get('del/{id}', ['as'=>'admin.posts.del', 'uses'=>'PostsAdminController@del']);
    });
});




