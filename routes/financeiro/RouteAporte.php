<?php

Route::resource('aportes', 'Financeiro\AporteController');
Route::get('aporte/getdata', 'Financeiro\AporteController@anyData')->name('aporte.getdata');

Route::get('/painel', 'Financeiro\AporteController@painel');
Route::get('/aporte', 'Financeiro\AporteController@aporte');
Route::get('/extrato', 'Financeiro\AporteController@extrato');

?>