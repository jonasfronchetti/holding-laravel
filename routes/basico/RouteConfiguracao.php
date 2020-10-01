<?php

Route::resource('configuracoes', 'Basico\ConfiguracaoController');
Route::get('configuracao/getdata', 'Basico\ConfiguracaoController@anyData')->name('configuracao.getdata');

?>