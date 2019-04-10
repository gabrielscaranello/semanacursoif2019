<?php




Route::get('admin', array('as' => 'admin', function () {
    return View::make('admin');
}));

Route::get('/revisao-ortografica', 'Site\HomeController@index');
Route::get('/sacidetresperna', 'Site\HomeController@index');
Route::get('/', 'Site\HomeController@comingSon');
Route::get('/register', 'Site\HomeController@register');
