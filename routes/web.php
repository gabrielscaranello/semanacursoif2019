<?php

Auth::routes();



Route::get('admin', array('as' => 'admin', function () {
    return View::make('admin');
}));

Route::get('/', 'Site\HomeController@index');
