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

Route::group(['middleware' => ['auth']], function() {

    //==================================== Rotas de Repúblicas ===========================================
    Route::get('dashboard', ['as' => 'home', 'uses' => 'RepublicController@index']);
    Route::get('buscar', ['as' => 'rep_search', 'uses' => 'RepublicController@search']);

    Route::group(['prefix' => 'admin/republicas/'], function() {
        Route::get('cadastrar', ['as' => 'rep_create', 'uses' => 'RepublicController@create']);
        Route::get('convidar', ['as' => 'rep_invite', 'uses' => 'RepublicController@invite']);
        Route::post('salvar', ['as' => 'rep_store', 'uses' => 'RepublicController@store']);
        Route::get('{repId}/editar', ['as' => 'rep_edit', 'uses' => 'RepublicController@edit']);
        Route::put('{repId}/atualizar', ['as' => 'rep_update', 'uses' => 'RepublicController@update']);
        Route::post('{repId}/adicionar-membro', ['as' => 'rep_addMember', 'uses' => 'RepublicController@addMember']);
    });
    //===================================================================================================

    Route::get('usuario/{userId}', ['as' => 'user_edit', 'uses' => 'UserController@edit']);
    Route::put('usuario/{userId}/salvar', ['as' => 'user_update', 'uses' => 'UserController@update']);
});

//=============================================== Images Route ============================================
Route::get('/images/{folder}/{image?}/{size?}', ['as' => 'images', 'uses' => function($folder, $image, $size) {
    $path = storage_path() . '/app/' . $folder . '/' . $image;
    $img = Image::make($path)->resize(null, $size, function ($constraint) {
        $constraint->aspectRatio();
    });

    return $img->response();
}]);
//==========================================================================================================
