<?php

Route::resource('roles', 'Admin\RoleController');
Route::get('role/getdata', 'Admin\RoleController@anyData')->name('role.getdata');
//Route::get('roles', 'Admin\RoleController@index');
Route::post('roles_mass_destroy', ['uses' => 'Admin\RoleController@massDestroy', 'as' => 'roles.mass_destroy']);


?>