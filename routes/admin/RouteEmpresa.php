<?php

Route::resource('empresas', 'Admin\EmpresaController');
Route::get('empresa/getdata', 'Admin\EmpresaController@anyData')->name('empresa.getdata');

?>