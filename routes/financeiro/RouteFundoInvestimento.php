<?php

Route::resource('fundoinvestimentos', 'Financeiro\FundoInvestimentoController');
Route::get('fundoinvestimento/getdata', 'Financeiro\FundoInvestimentoController@anyData')->name('fundoinvestimento.getdata');

?>