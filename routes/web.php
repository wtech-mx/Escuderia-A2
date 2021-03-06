<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Route;

use App\Exports\UsersExport;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

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

//Route::get('/', function () {
//    Storage::disk('google')->put('hello.txt', "Hello world");
//    return view('google');
//});

/*|--------------------------------------------------------------------------
|Exportacion de Excel
|--------------------------------------------------------------------------*/

Route::get('/exportar', 'UserController@export');

Route::get('/exportar', 'AutomovilController@export');

Route::get('/export_empresa', 'AutomovilController@export_empresa');

/*|--------------------------------------------------------------------------
|Forgot password
|--------------------------------------------------------------------------*/

Route::post('forgot-password', 'Auth\PasswordResetLinkController@store')->name('password.email');

Route::post('update-password', 'Auth\NewPasswordController@store')->name('password.update');

Route::get('offline', 'OfflineController@index')->name('index.offline');

/*|--------------------------------------------------------------------------
|Dashboard
|--------------------------------------------------------------------------*/

Route::get('dashboard', 'DashboardController@index')->name('index.dashboard');

Route::post('dashboarda', 'DashboardController@store')->name('store.dashboard');
/*|--------------------------------------------------------------------------
|Alert view
|--------------------------------------------------------------------------*/
Route::get('admin/alertas', 'AlertasController@index')->name('index.alert');
Route::post('admin/alert/create', 'AlertasController@store')->name('store.alert');

/*|--------------------------------------------------------------------------
|Calendario Admin
|--------------------------------------------------------------------------*/

Route::get('admin/calendar', 'AlertasController@index_calendar')->name('calendar.index_calendar');

Route::post('admin/calendar', 'AlertasController@store_calendar')->name('calendar.store_calendar');

Route::get('admin/calendar/show', 'AlertasController@show_calendar')->name('calendar.show_calendar');

Route::patch('admin/calendar/destroy/{id}', 'AlertasController@destroy_calendar')->name('calendar.destroy_calendar');

Route::patch('admin/calendar/update/{id}', 'AlertasController@update_calendar')->name('calendar.update_calendar');

/*|--------------------------------------------------------------------------
|Calendario Usuario
|--------------------------------------------------------------------------*/

Route::get('user/calendar', 'AlertasController@index_calendar_user')->name('calendar.index_calendar_user');

Route::post('user/calendar', 'AlertasController@store_calendar_user')->name('calendar.store_calendar_user');

Route::get('user/calendar/show', 'AlertasController@show_calendar_user')->name('calendar.show_calendar_user');

Route::patch('user/calendar/destroy/{id}', 'AlertasController@destroy_calendar_user')->name('calendar.destroy_calendar_user');

Route::patch('user/calendar/update/{id}', 'AlertasController@update_calendar_user')->name('calendar.update_calendar_user');

/*|--------------------------------------------------------------------------
|garaje edit - Usuario
|--------------------------------------------------------------------------*/

Route::get('automovil/index', 'AutomovilController@index')->name('index.automovil');
Route::get('automovil/crear', 'AutomovilController@create')->name('create.automovil');
Route::post('automovil/crear', 'AutomovilController@store')->name('store.automovil');
Route::get('automovil/edit/{id}', 'AutomovilController@edit')->name('edit.automovil');
Route::patch('automovil/update/{id}', 'AutomovilController@update')->name('update.automovil');

Route::patch('automovil/index/current_auto/{id}', 'AutomovilController@current_auto')->name('current_auto');

/*|--------------------------------------------------------------------------
|perfil
|--------------------------------------------------------------------------*/

Route::patch('profile/update/{id}', 'UserController@update')->name('update.user');
Route::get('profile/edit/{id}', 'UserController@edit')->name('edit.profile');

Route::patch('profile/update/password/{id}', 'UserController@update_password')->name('update_password.user');

/*|--------------------------------------------------------------------------
|Seguros
|--------------------------------------------------------------------------*/

Route::patch('seguro/update/{id}', 'SegurosController@update')->name('update.seguro');
Route::get('seguro/index', 'SegurosController@index')->name('index.seguro');

Route::get('/exportar/seguro', 'SegurosController@export');
Route::get('/exportar/seguro/empresa', 'SegurosController@export_empresa');
/*|--------------------------------------------------------------------------
|tarjeta-circulacion img
|--------------------------------------------------------------------------*/

Route::patch('tarjeta-circulacion/update/{id}', 'TarjetaCirculacionController@update')->name('update.tc');
Route::get('tarjeta-circulacion/index', 'TarjetaCirculacionController@index')->name('index.tc');

Route::post('tarjeta-circulacion/index', 'ImgTcController@store')->name('store.img-tc');

Route::get('/exportar/tc', 'TarjetaCirculacionController@export');
Route::get('/exportar/tc/empresa', 'TarjetaCirculacionController@export_tc');

/*|--------------------------------------------------------------------------
|Documents
|--------------------------------------------------------------------------*/

Route::get('documents/view/exp', 'DocumentosController@index')->name('index.exp-doc-tc');
Route::get('documents/crear/exp-tc', 'DocumentosController@create')->name('create.exp-doc-tc');
Route::post('documents/crear/exp-tc', 'DocumentosController@store')->name('store.exp-doc-tc');

Route::get('documents/view/vencimiento', 'DocumentosVencimientoController@index')->name('index.vencimiento-tc');
Route::get('documents/crear/vencimiento-tc', 'DocumentosVencimientoController@create')->name('create.vencimiento-tc');
Route::post('documents/crear/vencimiento-tc', 'DocumentosVencimientoController@store')->name('store.vencimiento-tc');

Route::get('documents/view/otro', 'DocumentosOtroController@index')->name('index.otro-tc');
Route::get('documents/crear/otro-tc', 'DocumentosOtroController@create')->name('create.otro-tc');
Route::post('documents/crear/otro-tc', 'DocumentosOtroController@store')->name('store.otro-tc');

Route::get('documents/view/lugar', 'DocumentosLugarExpController@index')->name('index.lugar-tc');
Route::get('documents/crear/lugar-tc', 'DocumentosLugarExpController@create')->name('create.lugar-tc');
Route::post('documents/crear/lugar-tc', 'DocumentosLugarExpController@store')->name('store.lugar-tc');

/*|--------------------------------------------------------------------------
|Expedientes Fisicos
|--------------------------------------------------------------------------*/

Route::get('exp_carta/view/exp-cr', 'ExpcartaController@index')->name('index.exp-cr');
Route::get('exp_carta/crear/exp-cr', 'ExpcartaController@create')->name('create.exp-cr');
Route::post('exp_carta/crear/exp-cr', 'ExpcartaController@store')->name('store.exp-cr');
Route::delete('exp_carta/eliminar/{id}', 'ExpcartaController@destroy')->name('destroy.exp-cr');

Route::get('exp_domicilio/view/exp-cd', 'ExpdomicilioController@index')->name('index.exp-cd');
Route::get('exp_domicilio/crear/exp-cd', 'ExpdomicilioController@create')->name('create.exp-cd');
Route::post('exp_domicilio/crear/exp-cd', 'ExpdomicilioController@store')->name('store.exp-cd');
Route::delete('exp_domicilio/eliminar/{id}', 'ExpdomicilioController@destroy')->name('destroy.exp-cd');

Route::get('exp_factura/view/exp-factura', 'ExpfacturasController@index')->name('index.exp-factura');
Route::get('exp_factura/crear/exp-factura', 'ExpfacturasController@create')->name('create.exp-factura');
Route::post('exp_factura/crear/exp-factura', 'ExpfacturasController@store')->name('store.exp-factura');
Route::delete('exp_factura/eliminar/{id}', 'ExpfacturasController@destroy')->name('destroy.exp-factura');

Route::get('exp_ine/view/exp-ine', 'ExpineController@index')->name('index.exp-ine');
Route::get('exp_ine/crear/exp-ine', 'ExpineController@create')->name('create.exp-ine');
Route::post('exp_ine/crear/exp-ine', 'ExpineController@store')->name('store.exp-ine');
Route::delete('exp_ine/eliminar/{id}', 'ExpineController@destroy')->name('destroy.exp-ine');

Route::get('exp_bp/view/exp-bp', 'ExplacasController@index')->name('index.exp-bp');
Route::get('exp_bp/crear/exp-bp', 'ExplacasController@create')->name('create.exp-bp');
Route::post('exp_bp/crear/exp-bp', 'ExplacasController@store')->name('store.exp-bp');
Route::delete('exp_bp/eliminar/{id}', 'ExplacasController@destroy')->name('destroy.exp-bp');

Route::get('exp_poliza/view/exp-poliza', 'ExpolizaController@index')->name('index.exp-poliza');
Route::get('exp_poliza/crear/exp-poliza', 'ExpolizaController@create')->name('create.exp-poliza');
Route::post('exp_poliza/crear/exp-poliza', 'ExpolizaController@store')->name('store.exp-poliza');
Route::delete('exp_poliza/eliminar/{id}', 'ExpolizaController@destroy')->name('destroy.exp-poliza');

Route::get('exp_reemplacamiento/view', 'ExpreemplacaminetoController@index')->name('index.exp-reemplacamiento');
Route::get('exp_reemplacamiento/crear', 'ExpreemplacaminetoController@create')->name('create.exp-reemplacamiento');
Route::post('exp_reemplacamiento/crear', 'ExpreemplacaminetoController@store')->name('store.exp-reemplacamiento');
Route::delete('exp_reemplacamiento/eliminar/{id}', 'ExpreemplacaminetoController@destroy')->name('destroy.exp-reemplacamiento');

Route::get('exp_rfc/view', 'ExprfcController@index')->name('index.exp-rfc');
Route::get('exp_rfc/crear', 'ExprfcController@create')->name('create.exp-rfc');
Route::post('exp_rfc/crear', 'ExprfcController@store')->name('store.exp-rfc');
Route::delete('exp_rfc/eliminar/{id}', 'ExprfcController@destroy')->name('destroy.exp-rfc');

Route::get('exp_tc/view', 'ExptcController@index')->name('index.exp-tc');
Route::get('exp_tc/crear', 'ExptcController@create')->name('create.exp-tc');
Route::post('exp_tc/crear', 'ExptcController@store')->name('store.exp-tc');
Route::delete('exp_tc/eliminar/{id}', 'ExptcController@destroy')->name('destroy.exp-tc');

Route::get('exp_tenencias/view', 'ExptenenciasController@index')->name('index.exp-tenencias');
Route::get('exp_tenencias/crear', 'ExptenenciasController@create')->name('create.exp-tenencias');
Route::post('exp_tenencias/crear', 'ExptenenciasController@store')->name('store.exp-tenencias');
Route::delete('exp_tenencias/eliminar/{id}', 'ExptenenciasController@destroy')->name('destroy.exp-tenencias');

Route::get('exp_certificado/view', 'ExpCertificadoController@index')->name('index.exp-certificado');
Route::get('exp_certificado/crear', 'ExpCertificadoController@create')->name('create.exp-certificado');
Route::post('exp_certificado/crear', 'ExpCertificadoController@store')->name('store.exp-certificado');
Route::delete('exp_certificado/eliminar/{id}', 'ExpCertificadoController@destroy')->name('destroy.exp-certificado');

Route::get('exp-fisico/view-exp-fisico', 'ExpController@index')->name('index_exp');

/*|--------------------------------------------------------------------------
|Comparte y Gana
|--------------------------------------------------------------------------*/
Route::get('/win-and-share/view-win-share', function () {
    return view('win-and-share/view-win-share');
})->middleware(['auth'])->name('view-win-share');

Route::get('recompensas', 'RecompensasController@index')->name('index.recompensas');

/*|--------------------------------------------------------------------------
|Sevicios Usuarios
|--------------------------------------------------------------------------*/

Route::get('servicio/view', 'MecanicaController@view_user')->name('view_user.servicio');

/*|--------------------------------------------------------------------------
|VERIFICACION view
|--------------------------------------------------------------------------*/
Route::get('verificacion/index', 'VerificacionController@index')->name('index.verificacion');

/*|--------------------------------------------------------------------------
|Admin User
|--------------------------------------------------------------------------*/

/* Create User_Auto */
Route::get('admin/user/create', 'UserController@create')->name('create.user');
Route::post('admin/user/create', 'UserController@store_auto')->name('store_auto.user');

/* Create User_Admin */
    Route::get('admin/usuario/index', 'UserController@index_admin')->name('index_admin.user');

    Route::get('admin/usuario/crear', 'UserController@create_admin')->name('create_admin.user');
    Route::post('admin/usuario/crear', 'UserController@store_admin')->name('store_admin.user');

    Route::get('admin/usuario/edit/{id}', 'UserController@edit_admin')->name('edit_admin.user');
    Route::patch('admin/usuario/update/{id}', 'UserController@update_admin')->name('update_admin.user');
    Route::patch('admin/usuario/update/password/{id}', 'UserController@update_admin_password')->name('update_admin_password.user');


/*|--------------------------------------------------------------------------
|Create Role
|--------------------------------------------------------------------------*/
Route::get('admin/role/index', 'RoleController@index_role')->name('index_role.role');
Route::get('admin/role/crear', 'RoleController@create_role')->name('create_role.role');
Route::post('admin/role/store', 'RoleController@store_role')->name('store_role.role');

Route::get('admin/role/edit/{id}', 'RoleController@edit_role')->name('edit_role.role');
Route::patch('admin/role/edit/{id}', 'RoleController@update_role')->name('update_role.role');



/*|--------------------------------------------------------------------------
|garaje edit - Admin
|--------------------------------------------------------------------------*/

Route::get('admin/automovil/index', 'AutomovilController@index_admin')->name('index_admin.automovil');
Route::get('admin/automovil/crear', 'AutomovilController@create_admin')->name('create_admin.automovil');
Route::post('admin/automovil/crear', 'AutomovilController@store_admin')->name('store_admin.automovil');
Route::get('admin/automovil/edit/{id}', 'AutomovilController@edit_admin')->name('edit_admin.automovil');
Route::patch('admin/automovil/update/{id}', 'AutomovilController@update_admin')->name('update_admin.automovil');

/*|--------------------------------------------------------------------------
|Empresas view
|--------------------------------------------------------------------------*/

/* Create Empresa_Auto */
Route::get('admin/empresa/auto/crear', 'EmpresasController@create_empresa')->name('create_empresa.empresa');
Route::post('admin/empresa/auto/crear', 'EmpresasController@store_empresa')->name('store_empresa.empresa');

/* Create Empresa_Admin */
Route::get('admin/empresa/index', 'EmpresasController@index_admin')->name('index_admin.empresa');
Route::get('admin/empresa/create', 'EmpresasController@create_admin')->name('create_admin.empresa');
Route::post('admin/empresa/create', 'EmpresasController@store_admin')->name('store_admin.empresa');

Route::get('admin/empresa/edit/{id}', 'EmpresasController@edit_admin')->name('edit_admin.empresa');
Route::patch('admin/empresa/update/{id}', 'EmpresasController@update_admin')->name('update_admin.empresa');

Route::get('/exportar/empresas', 'EmpresasController@export');

/*|--------------------------------------------------------------------------
|SEGUROS view
|--------------------------------------------------------------------------*/
Route::get('admin/seguros/index', 'SegurosController@index_admin')->name('index_admin.seguros');
Route::get('admin/seguro/edit/{id}', 'SegurosController@edit_admin')->name('edit_admin.seguro');
Route::patch('admin/seguro/update/{id}', 'SegurosController@update_admin')->name('update_admin.seguro');
Route::post('admin/exp_poliza/crear/', 'ExpolizaController@store_admin_s')->name('store_admin_s.exp-poliza');
/*|--------------------------------------------------------------------------
|Sevicios
|--------------------------------------------------------------------------*/

Route::get('admin/servicio/view', 'MecanicaController@view')->name('view.servicio');
Route::patch('admin/servicio/update/{id}', 'MecanicaController@edit')->name('edit.servicio');
Route::get('admin/servicio/crear', 'MecanicaController@create_servicio')->name('create_servicio.servicio');
Route::post('admin/servicio/crear', 'MecanicaController@store_servicio')->name('store_servicio.servicio');

Route::post('/automovil', 'MecanicaController@automovil')->name('automovil.servicio');

Route::post('admin/servicio/proveedores/crear', 'MecanicaController@store_servicio_proveedor')->name('store_servicio_proveedor.servicio');

/* Rutas para el select */
Route::get('admin/servicio/crear/{id}', 'MecanicaController@GetSubCatAgainstMainCatEdit');
Route::get('admin/servicio/crear/empresa/{id}', 'MecanicaController@GetEmpreAgainstMainCatEdit');

/*|--------------------------------------------------------------------------
|Documents
|--------------------------------------------------------------------------*/

/* Trae todos todos los autos */

Route::get('admin/tarjeta-circulacion/index/', 'TarjetaCirculacionController@indextc_admin')->name('indextc_admin.tarjeta-circulacion');
Route::get('admin/tarjeta-circulacion/edit/{id}', 'TarjetaCirculacionController@edit_admin')->name('edit_admin.tarjeta-circulacion');
Route::patch('admin/tarjeta-circulacion/update/{id}', 'TarjetaCirculacionController@update_admin')->name('update_admin.tarjeta-circulacion');

Route::post('admin/tarjeta-circulacion/create/', 'ImgTcController@store_admin')->name('store_admin.tarjeta-circulacion');

/*|--------------------------------------------------------------------------
|Expedientes Fisicos
|--------------------------------------------------------------------------*/

/* Trae todos todos los autos */
Route::get('admin/exp-fisico/index/', 'ExpfacturasController@index_admin')->name('index_admin.view-exp-fisico-admin');

/* Trae datos de facttura */
Route::get('admin/exp-fisico/factura/view/{id}', 'ExpfacturasController@create_admin')->name('create_admin.view-factura-admin');
Route::post('admin/exp-fisico/factura/crear/{id}', 'ExpfacturasController@store_admin')->name('store_admin.view-factura-admin');

Route::get('admin/exp-fisico/bp/view/{id}', 'ExplacasController@create_admin')->name('create_admin.view-bp-admin');
Route::post('admin/exp-fisico/bp/crear/{id}', 'ExplacasController@store_admin')->name('store_admin.view-bp-admin');

Route::get('admin/exp-fisico/cd/view/{id}', 'ExpdomicilioController@create_admin')->name('create_admin.view-cd-admin');
Route::post('admin/exp-fisico/cd/crear/{id}', 'ExpdomicilioController@store_admin')->name('store_admin.view-cd-admin');

Route::get('admin/exp-fisico/cr/view/{id}', 'ExpcartaController@create_admin')->name('create_admin.view-cr-admin');
Route::post('admin/exp-fisico/cr/crear/{id}', 'ExpcartaController@store_admin')->name('store_admin.view-cr-admin');

Route::get('admin/exp-fisico/ine/view/{id}', 'ExpineController@create_admin')->name('create_admin.view-ine-admin');
Route::post('admin/exp-fisico/ine/crear/{id}', 'ExpineController@store_admin')->name('store_admin.view-ine-admin');

Route::get('admin/exp-fisico/poliza/view/{id}', 'ExpolizaController@create_admin')->name('create_admin.view-poliza-admin');
Route::post('admin/exp-fisico/poliza/crear/{id}', 'ExpolizaController@store_admin')->name('store_admin.view-poliza-admin');

Route::get('admin/exp-fisico/reemplacamiento/view/{id}', 'ExpreemplacaminetoController@create_admin')->name('create_admin.view-reemplacamiento-admin');
Route::post('admin/exp-fisico/reemplacamiento/crear/{id}', 'ExpreemplacaminetoController@store_admin')->name('store_admin.view-reemplacamiento-admin');

Route::get('admin/exp-fisico/rfc/view/{id}', 'ExprfcController@create_admin')->name('create_admin.view-rfc-admin');
Route::post('admin/exp-fisico/rfc/crear/{id}', 'ExprfcController@store_admin')->name('store_admin.view-rfc-admin');

Route::get('admin/exp-fisico/tc/view/{id}', 'ExptcController@create_admin')->name('create_admin.view-tc-admin');
Route::post('admin/exp-fisico/tc/crear/{id}', 'ExptcController@store_admin')->name('store_admin.view-tc-admin');

Route::get('admin/exp-fisico/tenencia/view/{id}', 'ExptenenciasController@create_admin')->name('create_admin.view-tenencia-admin');
Route::post('admin/exp-fisico/tenencia/crear/{id}', 'ExptenenciasController@store_admin')->name('store_admin.view-tenencia-admin');

Route::get('admin/exp-fisico/certificado/view/{id}', 'ExpCertificadoController@create_admin')->name('create_admin.view-certificado-admin');
Route::post('admin/exp-fisico/certificado/crear/{id}', 'ExpCertificadoController@store_admin')->name('store_admin.view-certificado-admin');

/*|--------------------------------------------------------------------------
|Marca
|--------------------------------------------------------------------------*/
Route::post('admin/servicio/crear/marca', 'MarcaController@store')->name('store.marca');

/*|--------------------------------------------------------------------------
|VERIFICACION view
|--------------------------------------------------------------------------*/
Route::get('admin/verificacion/index', 'VerificacionController@index_admin')->name('index_admin.verificacion');
Route::get('admin/verificacion/edit/{id}', 'VerificacionController@edit_admin')->name('edit_admin.verificacion');
Route::patch('admin/verificacion/update/{id}', 'VerificacionController@update_admin')->name('update_admin.verificacion');

Route::post('admin/periodo2/update/{id}', 'VerificacionController@update_periodo2')->name('update_periodo2.verificacion');
/*|--------------------------------------------------------------------------
|Correo view
|--------------------------------------------------------------------------*/
Route::get('send-mail', [DashboardController::class, 'alerta']);

/*|--------------------------------------------------------------------------
|Notas
|--------------------------------------------------------------------------*/
Route::get('admin/notas/view', 'NotasContoller@index')->name('index.notas');
Route::get('admin/notas/crear', 'NotasContoller@create')->name('create.notas');
Route::post('admin/notas/store', 'NotasContoller@store')->name('store.notas');
Route::post('admin/notas/edit', 'NotasContoller@edit')->name('edit.notas');
Route::post('admin/notas/update/{id}', 'NotasContoller@update')->name('update.notas');
Route::delete('admin/notas/destroy/{id}', 'NotasContoller@destroy')->name('destroy.notas');

/*|--------------------------------------------------------------------------
|Licencia de conducir view
|--------------------------------------------------------------------------*/
Route::get('licencia/index', 'LicenciaController@index')->name('index.licencia');
Route::patch('licencia/update/{id}', 'LicenciaController@update')->name('update.licencia');

Route::get('admin/licencia/index', 'LicenciaController@index_admin')->name('index_admin.licencia');
Route::get('admin/licencia/edit/{id}', 'LicenciaController@edit_admin')->name('edit_admin.licencia');
Route::patch('admin/licencia/update/{id}', 'LicenciaController@update_admin')->name('update_admin.licencia');

/*|--------------------------------------------------------------------------
|Cupones
|--------------------------------------------------------------------------*/
Route::get('admin/cupon/view', 'CuponController@index_admin')->name('index_admin.cupon');
Route::get('admin/cupon/crear', 'CuponController@create_admin')->name('create_admin.cupon');
Route::post('admin/cupon/store', 'CuponController@store_admin')->name('store_admin.cupon');
Route::get('admin/cupon/edit/{id}', 'CuponController@edit_admin')->name('edit_admin.cupon');
Route::patch('admin/cupon/update/{id}', 'CuponController@update_admin')->name('update_admin.cupon');
Route::delete('admin/cupon/destroy/{id}', 'CuponController@destroy')->name('destroy.cupon');

Route::get('changeStatus', 'CuponController@ChangeUserStatus')->name('ChangeUserStatus.cupon');

Route::post('admin/cupon/asignacion/crear/', 'CuponController@update_asignacion')->name('update_asignacion.cupon');

Route::get('admin/cupon/lista-check/{id}', 'CuponController@lista_check')->name('lista_check.cupon');
Route::get('admin/cupon/check/edit/{id}', 'CuponController@edit_check')->name('edit_check.cupon');
Route::patch('admin/cupon/check/update/{id}', 'CuponController@update_check')->name('update_check.cupon');

Route::get('admin/cupon/asignacion/edit/{id}', 'CuponController@edit_asignacion')->name('edit_asignacion.cupon');

Route::get('cupon/view', 'CuponController@index')->name('index.cupon');

require __DIR__ . '/auth.php';
