<?php

Route::resource('pessoas', 'Basico\PessoaController');
Route::get('pessoa/getdata', 'Basico\PessoaController@anyData')->name('pessoa.getdata');

?>