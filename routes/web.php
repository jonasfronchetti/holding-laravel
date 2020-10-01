<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth', 'check_emitente'], 'prefix' => 'admin', 'as' => 'admin.'], function(){

    Route::get('/', function() { return view('sistema.template.form'); });

    Route::resource('permissions', 'Admin\PermissionController');
    Route::get('permission/getdata', 'Admin\PermissionController@anyData')->name('permission.getdata');

    Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionController@massDestroy', 'as' => 'permissions.mass_destroy']);
    if( App::environment('local') )
    {
        require (__DIR__ . '/admin/RouteEmpresa.php');
        require (__DIR__ . '/admin/RouteRole.php');
        require (__DIR__ . '/admin/RouteUser.php');
    }

});
Route::group(['middleware' => ['auth', 'check_emitente'], 'prefix' => 'basico', 'as' => 'basico.'], function(){

    if( App::environment('local') )
    {
        require (__DIR__ . '/basico/RoutePessoa.php');
        require (__DIR__ . '/basico/RouteConfiguracao.php');
    }
});

Route::group(['middleware' => ['auth', 'check_emitente'], 'prefix' => 'financeiro', 'as' => 'financeiro.'], function(){

    if( App::environment('local') )
    {
        require (__DIR__ . '/financeiro/RouteAplicacao.php');
        require (__DIR__ . '/financeiro/RouteAporte.php');
        require (__DIR__ . '/financeiro/RouteGarantia.php');
        require (__DIR__ . '/financeiro/RouteInvestimento.php');
        require (__DIR__ . '/financeiro/RouteFundoInvestimento.php');
        require (__DIR__ . '/financeiro/RouteTipoDespesa.php');
        require (__DIR__ . '/financeiro/RouteDespesa.php');
    }
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/rolesPermissions', 'HomeController@rolesPermissions');
