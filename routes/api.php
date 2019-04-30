<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@authenticate');
    Route::post('register', 'AuthController@store');
    Route::get('logout', 'AuthController@logout');
    Route::get('check', 'AuthController@check');
    Route::post('/verificaToken', 'AuthController@verificaToken');
});

Route::group(['prefix' => 'users'], function () {
    Route::post('login', 'Api\AuthController@authenticate');
    Route::post('register', 'Api\AuthController@authenticate');
    Route::post('logout', 'Api\AuthController@logout');
    Route::get('check', 'Api\AuthController@check');
    Route::post('/uploadAvatar', 'Api\UserController@uploadAvatar');
    Route::post('/verificaToken', 'Api\AuthController@verificaToken');
});


//gerenciamento de minicurso
Route::group(['prefix' => 'mini-curso'], function () {
    Route::get('/list', 'Api\MiniCursoController@list');
    Route::get('/show', 'Api\MiniCursoController@show');
    Route::post('/inscrever', 'Api\MiniCursoController@inscrever');
    Route::post('/miniCursosHasUser', 'Api\MiniCursoController@miniCursosHasUser');
    Route::post('/miniCursosHasUserDel', 'Api\MiniCursoController@miniCursosHasUserDel');
    Route::post('/getItem', 'Api\MiniCursoController@getItem');
    Route::post('/uploadBanner', 'Api\MiniCursoController@uploadBanner');
    Route::post('/store', 'Api\MiniCursoController@store');
    Route::post('/update', 'Api\MiniCursoController@update');
    Route::post('/delete', 'Api\MiniCursoController@delete');
});



//gerenciamento de cronograma
Route::group(['prefix' => 'cronograma'], function () {
    Route::get('/list', 'Api\CronogramController@list');
    Route::post('/getItem', 'Api\CronogramController@getItem');
    Route::post('/uploadBanner', 'Api\CronogramController@uploadBanner');
    Route::post('/store', 'Api\CronogramController@store');
    Route::post('/update', 'Api\CronogramController@update');
    Route::post('/delete', 'Api\CronogramController@delete');
});



//gerenciamento de palestra
Route::group(['prefix' => 'palestra'], function () {
    Route::get('/list', 'Api\PalestraController@list');
    Route::post('/getItem', 'Api\PalestraController@getItem');
    Route::post('/uploadBanner', 'Api\PalestraController@uploadBanner');
    Route::post('/store', 'Api\PalestraController@store');
    Route::post('/update', 'Api\PalestraController@update');
    Route::post('/delete', 'Api\PalestraController@delete');
});


//gerenciamento da galeria
Route::group(['prefix' => 'gallery'], function () {
    Route::get('/list', 'Api\GalleryController@list');
    Route::post('/getItem', 'Api\GalleryController@getItem');
    Route::post('/uploadBanner', 'Api\GalleryController@uploadBanner');
    Route::post('/store', 'Api\GalleryController@store');
    Route::post('/update', 'Api\GalleryController@update');
    Route::post('/delete', 'Api\GalleryController@delete');
});

//gerenciamento da usuario
Route::group(['prefix' => 'users'], function () {
    Route::get('/list', 'Api\UserController@list');
    Route::post('/getItem', 'Api\UserController@getItem');
    Route::post('/avatar', 'Api\UserController@avatar');
    Route::post('/store', 'Api\UserController@store');
    Route::post('/update', 'Api\UserController@update');
    Route::post('/delete', 'Api\UserController@delete');
});

//gerenciamento da usuario
Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', 'Api\DashboardController@index');
});
