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
        Route::post('salvar', ['as' => 'rep_store', 'uses' => 'RepublicController@store']);
        Route::get('{repId}/editar', ['as' => 'rep_edit', 'uses' => 'RepublicController@edit']);
        Route::put('{repId}/atualizar', ['as' => 'rep_update', 'uses' => 'RepublicController@update']);
        Route::post('{repId}/adicionar-membro', ['as' => 'rep_addMember', 'uses' => 'RepublicController@addMember']);
        Route::post('{repId}/add-meta', ['as' => 'rep_addMeta', 'uses' => 'RepublicController@addMeta']);

        Route::post('{repId}/aviso/salvar', ['as' => 'notice_store', 'uses' => 'NoticeController@store']);
        Route::get('{repId}/aviso/{noticeId}/alterar', ['as' => 'notice_edit', 'uses' => 'NoticeController@edit']);
        Route::put('{repId}/aviso/{noticeId}/salvar', ['as' => 'notice_update', 'uses' => 'NoticeController@update']);

        // Rota para pagar um conta
        Route::patch('pagar/{billId}', ['as' => 'bill_payment', 'uses' => 'BillController@payment']);

        Route::group(['prefix' => '{repId}/contas/'], function() {
            Route::get('', ['as' => 'bill_index', 'uses' => 'BillController@index']);
            Route::post('salvar', ['as' => 'bill_store', 'uses' => 'BillController@store']);
            Route::post('add-tipo', ['as' => 'bill_addBillType', 'uses' => 'BillController@addBillType']);
            Route::put('{billId}/atualizar', ['as' => 'bill_update', 'uses' => 'BillController@update']);
            Route::delete('{billId}/apagar', ['as' => 'bill_delete', 'uses' => 'BillController@delete']);
        });
    });
    //===================================================================================================

    Route::get('usuario/convidar', ['as' => 'rep_invite', 'uses' => 'UserController@invite']);
    Route::get('usuario/{userId}', ['as' => 'user_edit', 'uses' => 'UserController@edit']);
    Route::patch('usuario/{userId}/alterar', ['as' => 'user_updatePass', 'uses' => 'UserController@updatePass']);
    Route::put('usuario/{userId}/salvar', ['as' => 'user_update', 'uses' => 'UserController@update']);
    Route::get('usuario/{userId}/desativar', ['as' => 'user_destroy', 'uses' => 'UserController@destroy']);
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
