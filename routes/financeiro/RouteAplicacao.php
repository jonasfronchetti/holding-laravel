<?php

Route::resource('aplicacoes', 'Financeiro\AplicacaoController');
Route::get('aplicacao/getdata', 'Financeiro\AplicacaoController@anyData')->name('aplicacao.getdata');

?>