<?php

Route::resource('despesas', 'Financeiro\DespesaController');
Route::get('despesa/getdata', 'Financeiro\DespesaController@anyData')->name('despesa.getdata');

?>