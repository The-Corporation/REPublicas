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

Route::get('social/login/{provider}', ['as' => 'social_login', 'uses' => 'Auth\AuthController@redirectToProvider']);
Route::get('social/login/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('auth/login', ['as' => 'login-form', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register', ['as' => 'register-form', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('auth/register', ['as' => 'register', 'uses' => 'Auth\AuthController@postRegister']);

Route::get('/', function() {
    return redirect()->route('home');
});

Route::group(['prefix' => 'admin/republicas/', 'middleware' => ['auth']], function() {

    Route::get('', ['as' => 'home', 'uses' => 'RepublicController@index']);
    Route::get('cadastrar', ['as' => 'rep_create', 'uses' => 'RepublicController@create']);
    Route::get('{idRep}/editar', ['as' => 'rep_edit', 'uses' => 'RepublicController@edit']);
    Route::post('salvar', ['as' => 'rep_store', 'uses' => 'RepublicController@store']);
    Route::put('{idRep}/atualizar', ['as' => 'rep_update', 'uses' => 'RepublicController@update']);

});