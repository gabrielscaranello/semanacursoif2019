<?php

Auth::routes();



Route::get('admin', array('as' => 'admin', function () {
    return View::make('admin');
}));

Route::get('/revisao-ortografica', 'Site\HomeController@index');
Route::get('/algomaisfacil', 'Site\HomeController@index');
Route::get('/', 'Site\HomeController@comingSon');
