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

    //=========================== Rotas de Repúblicas ==============================
    Route::get('dashboard', ['as' => 'home', 'uses' => 'RepublicController@index']);
    Route::group(['prefix' => 'admin/republicas/'], function() {
        Route::get('cadastrar', ['as' => 'rep_create', 'uses' => 'RepublicController@create']);
        Route::post('salvar', ['as' => 'rep_store', 'uses' => 'RepublicController@store']);
        Route::get('{repId}/editar', ['as' => 'rep_edit', 'uses' => 'RepublicController@edit']);
        Route::put('{repId}/atualizar', ['as' => 'rep_update', 'uses' => 'RepublicController@update']);
        Route::post('{repId}/add-meta', ['as' => 'rep_addMeta', 'uses' => 'RepublicController@addMeta']);

        // ++++++++++++++++++++++++ Rotas para quartos ++++++++++++++++++++++++++++
        Route::group(['prefix' => '{repId}/quartos/'], function () {
            Route::get('', ['as' => 'room_index', 'uses' => 'RoomController@index']);
            Route::get('/{roomId}/editar', ['as' => 'room_edit', 'uses' => 'RoomController@edit']);
            Route::put('/{roomId}/alterar', ['as' => 'room_update', 'uses' => 'RoomController@update']);
        });

        // +++++++++++++++++++++++++ Rotas para membros +++++++++++++++++++++++++++
        Route::get('{repId}/membros', ['as' => 'rep_members', 'uses' => 'RepublicController@members']);
        Route::post('{repId}/adicionar-membro', ['as' => 'rep_addMember', 'uses' => 'RepublicController@addMember']);
        Route::get('{repId}/usuario/convidar', ['as' => 'rep_invite', 'uses' => 'UserController@invite']);
        Route::get('{repId}/usuario/{userId}/enviar-convite', ['as' => 'rep_sendInvite', 'uses' => 'RepublicController@sendInvite']);
        Route::get('{repId}/usuario/{userId}/remover', ['as' => 'rep_removeMember', 'uses' => 'RepublicController@removeMember']);

        // ++++++++++++++++++++++++++++ Rotas de Avisos +++++++++++++++++++++++++++
        Route::group(['prefix' => '{repId}/aviso/' ], function () {
            Route::post('salvar', ['as' => 'notice_store', 'uses' => 'NoticeController@store']);
            Route::get('{noticeId}/alterar', ['as' => 'notice_edit', 'uses' => 'NoticeController@edit']);
            Route::put('{noticeId}/salvar', ['as' => 'notice_update', 'uses' => 'NoticeController@update']);
        });

        // ++++++++++++++++++++++++ Rota para pagar um conta +++++++++++++++++++++++++
        Route::patch('pagar/{billId}', ['as' => 'bill_payment', 'uses' => 'BillController@payment']);

        // +++++++++++++++++++++++++++ Rotas de contas ++++++++++++++++++++++++++++
        Route::group(['prefix' => '{repId}/contas/'], function() {
            Route::get('', ['as' => 'bill_index', 'uses' => 'BillController@index']);
            Route::post('salvar', ['as' => 'bill_store', 'uses' => 'BillController@store']);
            Route::put('{billId}/atualizar-conta', ['as' => 'bill_update', 'uses' => 'BillController@update']);

            // ++++++++++++++++++++++ Rotas de tipos de conta +++++++++++++++++++++++
            Route::get('tipos', ['as' => 'billtype_index', 'uses' => 'BillTypeController@index']);
            Route::post('add-tipo', ['as' => 'bill_addBillType', 'uses' => 'BillTypeController@addBillType']);
            Route::get('{billtypeId}/editar', ['as' => 'billtype_edit', 'uses' => 'BillTypeController@edit']);
            Route::put('{billtypeId}/atualizar', ['as' => 'billtype_update', 'uses' => 'BillTypeController@update']);
            Route::get('{billtypeId}/apagar', ['as' => 'billtype_delete', 'uses' => 'BillTypeController@destroy']);
        });

        Route::group(['prefix' => '{repid}/caixinha/'], function () {
                Route::get('geral', ['as' => 'report_general', 'uses' => 'ReportsController@general']);
                Route::get('individual', ['as' => 'report_perUser', 'uses' => 'ReportsController@perUser']);
        });
    });
    //======================================================================

    // =========================== Rotas de Usuário ================================
    Route::get('usuario/convite/{notificationId}', ['as' => 'user_showInvite', 'uses' => 'UserController@showInvite']);
    Route::get('usuario/buscar', ['as' => 'user_search', 'uses' => 'UserController@search']);

    Route::get('usuario/{userId}', ['as' => 'user_edit', 'uses' => 'UserController@edit']);
    Route::patch('usuario/{userId}/alterar', ['as' => 'user_updatePass', 'uses' => 'UserController@updatePass']);
    Route::put('usuario/{userId}/salvar', ['as' => 'user_update', 'uses' => 'UserController@update']);
    Route::get('usuario/{userId}/desativar', ['as' => 'user_destroy', 'uses' => 'UserController@destroy']);

    // Rotas de notificação
    Route::get('convite/{notificationId}/aceitar', ['as' => 'notification_accept', 'uses' => 'NotificationController@accept']);
    Route::get('convite/{notificationId}/negar', ['as' => 'notification_deny', 'uses' => 'NotificationController@deny']);
});
// =======================================================================
//============================= Images Route =================================
Route::get('/images/{folder}/{image?}/{size?}', ['as' => 'images', 'uses' => function($folder, $image, $size) {
    $path = storage_path() . '/app/' . $folder . '/' . $image;
    $img = Image::make($path)->resize(null, $size, function ($constraint) {
        $constraint->aspectRatio();
    });

    return $img->response();
}]);
//=======================================================================
