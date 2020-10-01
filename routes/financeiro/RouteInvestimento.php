<?php

Route::resource('investimentos', 'Financeiro\InvestimentoController');
Route::get('investimento/getdata', 'Financeiro\InvestimentoController@anyData')->name('investimento.getdata');

?>