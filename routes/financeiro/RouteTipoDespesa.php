<?php

Route::resource('tipodespesas', 'Financeiro\TipoDespesaController');
Route::get('tipodespesa/getdata', 'Financeiro\TipoDespesaController@anyData')->name('tipodespesa.getdata');

?>