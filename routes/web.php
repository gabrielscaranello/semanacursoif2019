<?php

Auth::routes();



Route::get('admin', array('as' => 'admin', function () {
    return View::make('admin');
}));

Route::get('/tadsdadepre-remediocontrolado', 'Site\HomeController@index');
Route::get('/', 'Site\HomeController@comingSon');
