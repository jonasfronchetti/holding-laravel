<?php

Route::resource('users', 'Admin\UserController');
Route::get('user/getdata', 'Admin\UserController@anyData')->name('user.getdata');
Route::post('users_mass_destroy', ['uses' => 'Admin\UserController@massDestroy', 'as' => 'users.mass_destroy']);


?>