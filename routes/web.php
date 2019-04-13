<?php




Route::get('admin', array('as' => 'admin', function () {
    return View::make('admin');
}));

// Route::get('/sacidetresperna', 'Site\HomeController@index');
// Route::get('/', 'Site\HomeController@comingSon');
// Route::get('/register', 'Site\HomeController@register');
Route::get('/', 'Site\HomeController@index');
