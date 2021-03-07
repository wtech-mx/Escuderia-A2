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

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

Route::get('dashboard','DashboardController@index')->name('index.dashboard');

/*|--------------------------------------------------------------------------
|Alert view
|--------------------------------------------------------------------------*/
Route::get('admin/alertas','AlertasController@index')->name('index.alert');
Route::post('admin/alert/create','AlertasController@store')->name('store.alert');

Route::get('dashboarda','DashboardController@alerts')->name('alerts.alert');


/*|--------------------------------------------------------------------------
|Calendario
|--------------------------------------------------------------------------*/

Route::get('admin/eventos', 'EventosController@index')->name('eventos.index');

Route::post('admin/eventos', 'EventosController@store')->name('eventos.store');

Route::get('admin/eventos/show', 'EventosController@show')->name('eventos.show');

Route::delete('admin/eventos/destroy/{id}', 'EventosController@destroy')->name('eventos.destroy');

Route::patch('admin/eventos/update/{id}', 'EventosController@update')->name('eventos.update');
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
|tarjeta-circulacion img
|--------------------------------------------------------------------------*/

Route::patch('tarjeta-circulacion/update/{id}','TarjetaCirculacionController@update')->name('update.tc');
Route::get('tarjeta-circulacion/index','TarjetaCirculacionController@index')->name('index.tc');

//Route::get('tarjeta-circulacion/index','TarjetaCirculacionController@index')->name('index.img-tc');
Route::post('tarjeta-circulacion/index','ImgTcController@store')->name('store.img-tc');

/*|--------------------------------------------------------------------------
|Documents
|--------------------------------------------------------------------------*/

Route::get('documents/view/exp','DocumentosController@index')->name('index.exp-doc-tc');
Route::get('documents/crear/exp-tc','DocumentosController@create')->name('create.exp-doc-tc');
Route::post('documents/crear/exp-tc','DocumentosController@store')->name('store.exp-doc-tc');

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
|Tarjeta circulacion
|--------------------------------------------------------------------------*/

Route::get('/tarjeta-circulacion/tarjeta_circulacion', function () {
    return view('tarjeta-circulacion/tarjeta_circulacion');
})->middleware(['auth'])->name('tarjeta_circulacion');

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


/*|--------------------------------------------------------------------------
|User view
|--------------------------------------------------------------------------*/

/* Create User_Auto */
Route::get('admin/user/create','UserController@create')->name('create.user');
Route::post('admin/user/create','UserController@store_auto')->name('store_auto.user');

/* Create User_Admin */
Route::get('admin/usuario/index','UserController@index_admin')->name('index_admin.user');
Route::get('admin/usuario/crear','UserController@create_admin')->name('create_admin.user');
Route::post('admin/usuario/crear','UserController@store_admin')->name('store_admin.user');

Route::get('admin/usuario/edit/{id}','UserController@edit_admin')->name('edit_admin.user');
Route::patch('admin/usuario/update/{id}','UserController@update_admin')->name('update_admin.user');

/*|--------------------------------------------------------------------------
|garaje edit - Admin
|--------------------------------------------------------------------------*/

Route::get('admin/automovil/index','AutomovilController@index_admin')->name('index_admin.automovil');
Route::get('admin/automovil/crear','AutomovilController@create_admin')->name('create_admin.automovil');
Route::post('admin/automovil/crear','AutomovilController@store_admin')->name('store_admin.automovil');
Route::get('admin/automovil/edit/{id}','AutomovilController@edit_admin')->name('edit_admin.automovil');
Route::patch('admin/automovil/update/{id}','AutomovilController@update_admin')->name('update_admin.automovil');

/*|--------------------------------------------------------------------------
|Empresas view
|--------------------------------------------------------------------------*/

/* Create Empresa_Auto */
Route::get('admin/empresa/auto/crear','EmpresasController@create_empresa')->name('create_empresa.empresa');
Route::post('admin/empresa/auto/crear','EmpresasController@store_empresa')->name('store_empresa.empresa');

/* Create Empresa_Admin */
Route::get('admin/empresa/index','EmpresasController@index_admin')->name('index_admin.empresa');
Route::get('admin/empresa/create','EmpresasController@create_admin')->name('create_admin.empresa');
Route::post('admin/empresa/create','EmpresasController@store_admin')->name('store_admin.empresa');

Route::get('admin/empresa/edit/{id}','EmpresasController@edit_admin')->name('edit_admin.empresa');
Route::patch('admin/empresa/update/{id}','EmpresasController@update_admin')->name('update_admin.empresa');

/*|--------------------------------------------------------------------------
|SEGUROS view
|--------------------------------------------------------------------------*/
Route::get('admin/seguros/index','SegurosController@index_admin')->name('index_admin.seguros');
Route::get('admin/seguro/edit/{id}','SegurosController@edit_admin')->name('edit_admin.seguro');
Route::patch('admin/seguro/update/{id}','SegurosController@update_admin')->name('update_admin.seguro');
Route::post('admin/exp_poliza/crear','ExpolizaController@store_admin')->name('store_admin.exp-poliza');
/*|--------------------------------------------------------------------------
|Sevicios
|--------------------------------------------------------------------------*/

Route::get('admin/services/mecanica', function () {
    return view('admin/services/mecanica');
})->middleware(['auth'])->name('mecanica');

Route::get('admin/servicio/view','MecanicaController@view')->name('view.servicio');
Route::get('admin/servicio/crear','MecanicaController@create_servicio')->name('create_servicio.servicio');
Route::post('admin/servicio/crear','MecanicaController@store_servicio')->name('store_servicio.servicio');

/* Rutas para el select */
Route::get('admin/servicio/crear/{id}', 'MecanicaController@GetSubCatAgainstMainCatEdit');
Route::get('admin/servicio/crear/empresa/{id}', 'MecanicaController@GetEmpreAgainstMainCatEdit');

/*|--------------------------------------------------------------------------
|Documents
|--------------------------------------------------------------------------*/

/* Trae todos todos los autos */

Route::get('admin/tarjeta-circulacion/index/','TarjetaCirculacionController@indextc_admin')->name('indextc_admin.tarjeta-circulacion');
Route::get('admin/tarjeta-circulacion/edit/{id}','TarjetaCirculacionController@edit_admin')->name('edit_admin.tarjeta-circulacion');
Route::patch('admin/tarjeta-circulacion/update/{id}','TarjetaCirculacionController@update_admin')->name('update_admin.tarjeta-circulacion');

Route::post('admin/tarjeta-circulacion/create/','ImgTcController@store_admin')->name('store_admin.tarjeta-circulacion');

/*|--------------------------------------------------------------------------
|Expedientes Fisicos
|--------------------------------------------------------------------------*/

/* Trae todos todos los autos */
Route::get('admin/exp-fisico/index/','ExpfacturasController@index_admin')->name('index_admin.view-exp-fisico-admin');

/* Trae datos de facttura */
Route::get('admin/exp-fisico/factura/view/{id}','ExpfacturasController@create_admin')->name('create_admin.view-factura-admin');
Route::post('admin/exp-fisico/factura/crear/{id}','ExpfacturasController@store_admin')->name('store_admin.view-factura-admin');

Route::get('admin/exp-fisico/bp/view/{id}','ExplacasController@create_admin')->name('create_admin.view-bp-admin');
Route::post('admin/exp-fisico/bp/crear/{id}','ExplacasController@store_admin')->name('store_admin.view-bp-admin');

Route::get('admin/exp-fisico/cd/view/{id}','ExpdomicilioController@create_admin')->name('create_admin.view-cd-admin');
Route::post('admin/exp-fisico/cd/crear/{id}','ExpdomicilioController@store_admin')->name('store_admin.view-cd-admin');

Route::get('admin/exp-fisico/cr/view/{id}','ExpcartaController@create_admin')->name('create_admin.view-cr-admin');
Route::post('admin/exp-fisico/cr/crear/{id}','ExpcartaController@store_admin')->name('store_admin.view-cr-admin');

Route::get('admin/exp-fisico/ine/view/{id}','ExpineController@create_admin')->name('create_admin.view-ine-admin');
Route::post('admin/exp-fisico/ine/crear/{id}','ExpineController@store_admin')->name('store_admin.view-ine-admin');

Route::get('admin/exp-fisico/poliza/view/{id}','ExpolizaController@create_admin')->name('create_admin.view-poliza-admin');
Route::post('admin/exp-fisico/poliza/crear/{id}','ExpolizaController@store_admin')->name('store_admin.view-poliza-admin');

Route::get('admin/exp-fisico/reemplacamiento/view/{id}','ExpreemplacaminetoController@create_admin')->name('create_admin.view-reemplacamiento-admin');
Route::post('admin/exp-fisico/reemplacamiento/crear/{id}','ExpreemplacaminetoController@store_admin')->name('store_admin.view-reemplacamiento-admin');

Route::get('admin/exp-fisico/rfc/view/{id}','ExprfcController@create_admin')->name('create_admin.view-rfc-admin');
Route::post('admin/exp-fisico/rfc/crear/{id}','ExprfcController@store_admin')->name('store_admin.view-rfc-admin');

Route::get('admin/exp-fisico/tc/view/{id}','ExptcController@create_admin')->name('create_admin.view-tc-admin');
Route::post('admin/exp-fisico/tc/crear/{id}','ExptcController@store_admin')->name('store_admin.view-tc-admin');

Route::get('admin/exp-fisico/tenencia/view/{id}','ExptenenciasController@create_admin')->name('create_admin.view-tenencia-admin');
Route::post('admin/exp-fisico/tenencia/crear/{id}','ExptenenciasController@store_admin')->name('store_admin.view-tenencia-admin');

/*|--------------------------------------------------------------------------
|Marca
|--------------------------------------------------------------------------*/
Route::post('admin/servicio/crear/marca','MarcaController@store')->name('store.marca');


require __DIR__.'/auth.php';
