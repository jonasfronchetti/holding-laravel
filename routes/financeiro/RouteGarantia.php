<?php

Route::resource('garantias', 'Financeiro\GarantiaController');
Route::get('garantia/getdata', 'Financeiro\GarantiaController@anyData')->name('garantia.getdata');

?>