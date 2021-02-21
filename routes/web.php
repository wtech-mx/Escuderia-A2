<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Route;

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


/*|--------------------------------------------------------------------------
|Usuario
|--------------------------------------------------------------------------*/

/*|--------------------------------------------------------------------------
|Dashboard
|--------------------------------------------------------------------------*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


/*|--------------------------------------------------------------------------
|garaje view
|--------------------------------------------------------------------------*/


Route::get('/garaje/view-garaje', function () {
    return view('garaje/view-garaje');
})->middleware(['auth'])->name('view-garaje');


/*|--------------------------------------------------------------------------
|garaje edit - Usuario
|--------------------------------------------------------------------------*/

Route::get('automovil/index','AutomovilController@index')->name('index.automovil');
Route::get('automovil/crear','AutomovilController@create')->name('create.automovil');
Route::post('automovil/crear','AutomovilController@store')->name('store.automovil');
Route::get('automovil/edit/{id}','AutomovilController@edit')->name('edit.automovil');
Route::patch('automovil/update/{id}','AutomovilController@update')->name('update.automovil');

Route::patch('automovil/index/current_auto/{id}','AutomovilController@current_auto')->name('current_auto');
    /*|--------------------------------------------------------------------------
    |garaje edit - Admin
    |--------------------------------------------------------------------------*/

    Route::get('admin/automovil/index','AutomovilController@index_admin')->name('index_admin.automovil');
    Route::get('admin/automovil/crear','AutomovilController@create_admin')->name('create_admin.automovil');
    Route::post('admin/automovil/crear','AutomovilController@store_admin')->name('store_admin.automovil');

    Route::get('admin/automovil/edit/{id}','AutomovilController@edit_admin')->name('edit_admin.automovil');
    Route::patch('admin/automovil/update/{id}','AutomovilController@update_admin')->name('update_admin.automovil');
/*|--------------------------------------------------------------------------
|perfil
|--------------------------------------------------------------------------*/

Route::patch('profile/update/{id}','UserController@update')->name('update.user');
Route::get('profile/edit/{id}','UserController@edit')->name('edit.profile');

/*|--------------------------------------------------------------------------
|Seguros
|--------------------------------------------------------------------------*/

Route::patch('seguro/update/{id}','SegurosController@update')->name('update.seguro');
Route::get('seguro/index','SegurosController@index')->name('index.seguro');

/*|--------------------------------------------------------------------------
|Documents
|--------------------------------------------------------------------------*/

Route::get('documents/view/exp','DocumentosController@index')->name('index.exp-tc');
Route::get('documents/crear/exp-tc','DocumentosController@create')->name('create.exp-tc');
Route::post('documents/crear/exp-tc','DocumentosController@store')->name('store.exp-tc');

Route::get('documents/view/vencimiento','DocumentosVencimientoController@index')->name('index.vencimiento-tc');
Route::get('documents/crear/vencimiento-tc','DocumentosVencimientoController@create')->name('create.vencimiento-tc');
Route::post('documents/crear/vencimiento-tc','DocumentosVencimientoController@store')->name('store.vencimiento-tc');

Route::get('documents/view/otro','DocumentosOtroController@index')->name('index.otro-tc');
Route::get('documents/crear/otro-tc','DocumentosOtroController@create')->name('create.otro-tc');
Route::post('documents/crear/otro-tc','DocumentosOtroController@store')->name('store.otro-tc');

Route::get('documents/view/lugar','DocumentosLugarExpController@index')->name('index.lugar-tc');
Route::get('documents/crear/lugar-tc','DocumentosLugarExpController@create')->name('create.lugar-tc');
Route::post('documents/crear/lugar-tc','DocumentosLugarExpController@store')->name('store.lugar-tc');

Route::get('/documents/view-documents', function () {
    return view('documents/view-documents');
})->middleware(['auth'])->name('view-documents');

/*|--------------------------------------------------------------------------
|Expedientes Fisicos
|--------------------------------------------------------------------------*/

Route::get('exp_carta/view/exp-cr','ExpcartaController@index')->name('index.exp-cr');
Route::get('exp_carta/crear/exp-cr','ExpcartaController@create')->name('create.exp-cr');
Route::post('exp_carta/crear/exp-cr','ExpcartaController@store')->name('store.exp-cr');

Route::get('exp_domicilio/view/exp-cd','ExpdomicilioController@index')->name('index.exp-cd');
Route::get('exp_domicilio/crear/exp-cd','ExpdomicilioController@create')->name('create.exp-cd');
Route::post('exp_domicilio/crear/exp-cd','ExpdomicilioController@store')->name('store.exp-cd');

Route::get('exp_factura/view/exp-factura','ExpfacturasController@index')->name('index.exp-factura');
Route::get('exp_factura/crear/exp-factura','ExpfacturasController@create')->name('create.exp-factura');
Route::post('exp_factura/crear/exp-factura','ExpfacturasController@store')->name('store.exp-factura');

Route::get('exp_ine/view/exp-ine','ExpineController@index')->name('index.exp-ine');
Route::get('exp_ine/crear/exp-ine','ExpineController@create')->name('create.exp-ine');
Route::post('exp_ine/crear/exp-ine','ExpineController@store')->name('store.exp-ine');

Route::get('exp_bp/view/exp-bp','ExplacasController@index')->name('index.exp-bp');
Route::get('exp_bp/crear/exp-bp','ExplacasController@create')->name('create.exp-bp');
Route::post('exp_bp/crear/exp-bp','ExplacasController@store')->name('store.exp-bp');

Route::get('exp_poliza/view/exp-poliza','ExpolizaController@index')->name('index.exp-poliza');
Route::get('exp_poliza/crear/exp-poliza','ExpolizaController@create')->name('create.exp-poliza');
Route::post('exp_poliza/crear/exp-poliza','ExpolizaController@store')->name('store.exp-poliza');

Route::get('exp_reemplacamiento/view','ExpreemplacaminetoController@index')->name('index.exp-reemplacamiento');
Route::get('exp_reemplacamiento/crear','ExpreemplacaminetoController@create')->name('create.exp-reemplacamiento');
Route::post('exp_reemplacamiento/crear','ExpreemplacaminetoController@store')->name('store.exp-reemplacamiento');

Route::get('exp_rfc/view','ExprfcController@index')->name('index.exp-rfc');
Route::get('exp_rfc/crear','ExprfcController@create')->name('create.exp-rfc');
Route::post('exp_rfc/crear','ExprfcController@store')->name('store.exp-rfc');

Route::get('exp_tc/view','ExptcController@index')->name('index.exp-tc');
Route::get('exp_tc/crear','ExptcController@create')->name('create.exp-tc');
Route::post('exp_tc/crear','ExptcController@store')->name('store.exp-tc');

Route::get('exp_tenencias/view','ExptenenciasController@index')->name('index.exp-tenencias');
Route::get('exp_tenencias/crear','ExptenenciasController@create')->name('create.exp-tenencias');
Route::post('exp_tenencias/crear','ExptenenciasController@store')->name('store.exp-tenencias');

Route::get('/exp-fisico/view-exp-fisico', function () {
    return view('exp-fisico/view-exp-fisico');
})->middleware(['auth'])->name('view-exp-fisico');


/*|--------------------------------------------------------------------------
|Comparte y Gana
|--------------------------------------------------------------------------*/
Route::get('/win-and-share/view-win-share', function () {
    return view('win-and-share/view-win-share');
})->middleware(['auth'])->name('view-win-share');

/*|--------------------------------------------------------------------------
|Comparte y Gana
|--------------------------------------------------------------------------*/
Route::get('/alerts/view-alerts', function () {
    return view('alerts/view-alerts');
})->middleware(['auth'])->name('view-alerts');


/*|--------------------------------------------------------------------------
|Admin
|--------------------------------------------------------------------------*/

/*|--------------------------------------------------------------------------
|Admin
|--------------------------------------------------------------------------*/


Route::get('admin/dashboard', function () {
    return view('admin/dashboard');
})->middleware(['auth'])->name('admin-view-dashboard');


/*|--------------------------------------------------------------------------
|User view
|--------------------------------------------------------------------------*/

Route::get('admin/user/view-user-admin', function () {
    return view('admin/user/view-user-admin');
})->middleware(['auth'])->name('view-user-admin');

/*|--------------------------------------------------------------------------
|Empresas view
|--------------------------------------------------------------------------*/

Route::get('admin/empresas/view-empresas-admin', function () {
    return view('admin/empresas/view-empresas-admin');
})->middleware(['auth'])->name('view-empresas-admin');

Route::get('admin/empresa/crear','EmpresasController@create')->name('create.empresa');
Route::post('admin/empresa/crear','EmpresasController@store')->name('store.empresa');

/*|--------------------------------------------------------------------------
|SEGUROS view
|--------------------------------------------------------------------------*/

Route::get('admin/seguros/view-seguros-admin', function () {
    return view('admin/seguros/view-seguros-admin');
})->middleware(['auth'])->name('view-seguros-admin');

Route::get('admin/seguros/create-seguros-admin', function () {
    return view('admin/seguros/create-seguros-admin');
})->middleware(['auth'])->name('create-seguros-admin');


/*|--------------------------------------------------------------------------
|Sevicios
|--------------------------------------------------------------------------*/

Route::get('admin/services/mecanica', function () {
    return view('admin/services/mecanica');
})->middleware(['auth'])->name('mecanica');

/*|--------------------------------------------------------------------------
|Documents
|--------------------------------------------------------------------------*/

Route::get('admin/documents/view-documents-admin', function () {
    return view('admin/documents/view-documents-admin');
})->middleware(['auth'])->name('view-documents-admin');

Route::get('admin/documents/create-documents-admin', function () {
    return view('admin/documents/create-documents-admin');
})->middleware(['auth'])->name('create-documents-admin');

Route::get('admin/documents/edit-documents-admin', function () {
    return view('admin/documents/edit-documents-admin');
})->middleware(['auth'])->name('edit-documents-admin');

Route::get('admin/documents/view-exp-ts', function () {
    return view('admin/documents/view-exp-ts-admin');
})->middleware(['auth'])->name('view-exp-ts-admin');

Route::get('admin/documents/view-lugar-ts-admin', function () {
    return view('admin/documents/view-lugar-ts-admin');
})->middleware(['auth'])->name('view-lugar-ts-admin');

Route::get('admin/documents/view-vencimiento-ts-admin', function () {
    return view('admin/documents/view-vencimiento-ts-admin');
})->middleware(['auth'])->name('view-vencimiento-ts-admin');

Route::get('admin/documents/view-vencimiento-ts-admin', function () {
    return view('admin/documents/view-vencimiento-ts-admin');
})->middleware(['auth'])->name('view-vencimiento-ts-admin');

Route::get('admin/documents/view-otro-ts-admin', function () {
    return view('admin/documents/view-otro-ts-admin');
})->middleware(['auth'])->name('view-otro-ts-admin');


require __DIR__.'/auth.php';
