<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Route;
use App\Models\User;

use App\Exports\UsersExport;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Taller;
use App\Models\CotizacionRemision;

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

Route::get('solicutud', function () {
    return view('emails.solicutud');
});

Route::view('remision', 'admin.cotizacion.remision')->name('remision');
//Route::get('/', function () {
//    Storage::disk('google')->put('hello.txt', "Hello world");
//    return view('google');
//});

/*|--------------------------------------------------------------------------
|Exportacion de Excel
|--------------------------------------------------------------------------*/

Route::get('/exportar/usuarios', 'UserController@export');

Route::get('/exportar/automovil', 'AutomovilController@export');

Route::get('/exportar/gasolina', 'GasolinaController@export');

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
Route::get('expediente/view-exp-fisico', 'ExpController@index')->name('index_exp');
Route::post('expediente/crear', 'ExpedientesController@store')->name('store.expexpediente');
Route::delete('expediente/eliminar/{id}', 'ExpedientesController@destroy_user')->name('destroy_user.expediente');
Route::post('expediente/view-exp-fisico', 'ExpedientesController@upload_user')->name('dropzone_user.store');


Route::get('factura/view', 'ExpedientesController@index')->name('index.exp-factura');

Route::get('bp/view', 'ExpedientesController@index')->name('index.exp-bp');

Route::get('cd/view', 'ExpedientesController@index')->name('index.exp-cd');

Route::get('cr/view', 'ExpedientesController@index')->name('index.exp-cr');

Route::get('ine/view', 'ExpedientesController@index')->name('index.exp-ine');

Route::get('poliza/view', 'ExpedientesController@index')->name('index.exp-poliza');

Route::get('reemplacamiento/view', 'ExpedientesController@index')->name('index.exp-reemplacamiento');

Route::get('rfc/view', 'ExpedientesController@index')->name('index.exp-rfc');

Route::get('tc/view', 'ExpedientesController@index')->name('index.exp-tc');

Route::get('tenencia/view', 'ExpedientesController@index')->name('index.exp-tenencias');

Route::get('certificado/view', 'ExpedientesController@index')->name('index.exp-certificado');

Route::get('inventario/view', 'ExpedientesController@index')->name('index.exp-inventario');

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
Route::group(['middleware' => ['permission:ver_usuario|create_admin|Editar Usuario']], function () {
    Route::get('admin/usuario/index', 'UserController@index_admin')->name('index_admin.user');

    Route::get('admin/usuario/crear', 'UserController@create_admin')->name('create_admin.user');
    Route::post('admin/usuario/crear', 'UserController@store_admin')->name('store_admin.user');

    Route::get('admin/usuario/edit/{id}', 'UserController@edit_admin')->name('edit_admin.user');
    Route::patch('admin/usuario/update/{id}', 'UserController@update_admin')->name('update_admin.user');
    Route::patch('admin/usuario/update/password/{id}', 'UserController@update_admin_password')->name('update_admin_password.user');
});

/*|--------------------------------------------------------------------------
|Servicios para cotizacion
|--------------------------------------------------------------------------*/
Route::get('admin/servicios/taller/view', 'TallerServiciosController@index')->name('index.servicios_taller');
Route::post('admin/servicios/taller/crear', 'TallerServiciosController@store')->name('store.servicios_taller');
Route::patch('admin/servicios/taller/update/{id}', 'TallerServiciosController@update')->name('update.servicios_taller');

/*|--------------------------------------------------------------------------
|Cotizacion para taller
|--------------------------------------------------------------------------*/
Route::get('admin/cotizacion/taller/view/{id}', 'OrdenServicioController@view')->name('view.cotizacion_taller');
Route::get('admin/cotizacion/taller/index', 'OrdenServicioController@index')->name('index.cotizacion_taller');
Route::post('admin/cotizacion/taller/crear', 'OrdenServicioController@store')->name('store.cotizacion_taller');
Route::get('admin/cotizacion/taller/auto/{id}', 'OrdenServicioController@GetAutoAgainstMainCatEdit');

Route::patch('admin/cotizacion/taller/estatus/{id}', 'OrdenServicioController@update_estatus')->name('update_estatus.cotizacion_taller');
Route::patch('admin/cotizacion/taller/ingreso/{id}', 'OrdenServicioController@ingreso')->name('ingreso.cotizacion_taller');
Route::get('/get-automoviles/{id}', 'OrdenServicioController@getAutomoviles')->name('get.automoviles');
Route::get('admin/cotizacion/taller/imprimir/{id}', 'OrdenServicioController@imprimir')->name('orden.imprimir');


/*|--------------------------------------------------------------------------
|Orden de serivico
|--------------------------------------------------------------------------*/
Route::patch('admin/orden/servicio/taller/crear/{id}', 'OrdenServicioController@store_taller')->name('store_taller.cotizacion_taller');
Route::get('admin/cotizacion/taller/view/admin/{id}', 'OrdenServicioController@view_admin')->name('view_admin.cotizacion_taller');
Route::patch('admin/orden/servicio/taller/edit/{id}', 'OrdenServicioController@edit_cot_taller')->name('edit_cot_taller.cotizacion_taller');

Route::post('/import', 'ExcelImportController@import')->name('import.taller.servicios');

/*|--------------------------------------------------------------------------
|Create Role
|--------------------------------------------------------------------------*/
Route::group(['middleware' => ['permission:Crear Roles y Permisos']], function () {
    Route::get('admin/role/index', 'RoleController@index_role')->name('index_role.role');
    Route::get('admin/role/crear', 'RoleController@create_role')->name('create_role.role');
    Route::post('admin/role/store', 'RoleController@store_role')->name('store_role.role');

    Route::get('admin/role/edit/{id}', 'RoleController@edit_role')->name('edit_role.role');
    Route::patch('admin/role/edit/{id}', 'RoleController@update_role')->name('update_role.role');
    Route::delete('admin/role/destroy/{id}', 'RoleController@destroy')->name('destroy.role');
});

/*|--------------------------------------------------------------------------
|garaje edit - Admin
|--------------------------------------------------------------------------*/
Route::group(['middleware' => ['permission:Ver Automovil|Crear Automovil|Edit Automovil']], function () {
    Route::get('admin/automovil/index', 'AutomovilController@index_admin')->name('index_admin.automovil');
    Route::get('admin/automovil/crear', 'AutomovilController@create_admin')->name('create_admin.automovil');
    Route::post('admin/automovil/crear', 'AutomovilController@store_admin')->name('store_admin.automovil');
    Route::get('admin/automovil/edit/{id}', 'AutomovilController@edit_admin')->name('edit_admin.automovil');
    Route::patch('admin/automovil/update/{id}', 'AutomovilController@update_admin')->name('update_admin.automovil');
});

/*|--------------------------------------------------------------------------
|Empresas view
|--------------------------------------------------------------------------*/

/* Create Empresa_Auto */
Route::get('admin/empresa/auto/crear', 'EmpresasController@create_empresa')->name('create_empresa.empresa');
Route::post('admin/empresa/auto/crear', 'EmpresasController@store_empresa')->name('store_empresa.empresa');

/* Create Empresa_Admin */
Route::group(['middleware' => ['permission:Ver Emp|Crear Emp|Editar Emp']], function () {
    Route::get('admin/empresa/index', 'EmpresasController@index_admin')->name('index_admin.empresa');
    Route::get('admin/empresa/create', 'EmpresasController@create_admin')->name('create_admin.empresa');
    Route::post('admin/empresa/create', 'EmpresasController@store_admin')->name('store_admin.empresa');

    Route::get('admin/empresa/edit/{id}', 'EmpresasController@edit_admin')->name('edit_admin.empresa');
    Route::patch('admin/empresa/update/{id}', 'EmpresasController@update_admin')->name('update_admin.empresa');

    Route::get('/descargar-db', 'DatabaseController@descargarBaseDeDatos')->name('descargar.db');
});

Route::get('/exportar/empresas', 'EmpresasController@export');

/*|--------------------------------------------------------------------------
|SEGUROS view
|--------------------------------------------------------------------------*/
Route::group(['middleware' => ['permission:Ver Seguro|Editar Seguro']], function () {
    Route::get('admin/seguros/index', 'SegurosController@index_admin')->name('index_admin.seguros');
    Route::get('admin/seguro/edit/{id}', 'SegurosController@edit_admin')->name('edit_admin.seguro');
    Route::patch('admin/seguro/update/{id}', 'SegurosController@update_admin')->name('update_admin.seguro');
    Route::post('admin/exp_poliza/crear', 'ExpedientesController@store_admin_s')->name('store_admin_s.exp-poliza');
});
/*|--------------------------------------------------------------------------
|Sevicios
|--------------------------------------------------------------------------*/
Route::group(['middleware' => ['permission:Ver Servicios|Crear Servicios']], function () {
    Route::get('admin/servicio/view', 'MecanicaController@view')->name('view.servicio');
    Route::patch('admin/servicio/update/{id}', 'MecanicaController@edit')->name('edit.servicio');
    Route::get('admin/servicio/crear', 'MecanicaController@create_servicio')->name('create_servicio.servicio');
    Route::post('admin/servicio/crear', 'MecanicaController@store_servicio')->name('store_servicio.servicio');
});

// Route::group(['middleware' => ['permission:Pronostico']], function () {
Route::get('admin/pronostico/crear', 'PronosticoController@create')->name('create.pronostico');
Route::get('admin/pronostico_tc/crear', 'PronosticoController@create_tc')->name('create.pronostico_tc');
Route::post('admin/pronostico/crear', 'PronosticoController@store')->name('store.pronostico');
Route::post('admin/pronostico_tc/crear', 'PronosticoController@store_tc')->name('store.pronostico_tc');

// });
Route::get('admin/pronostico_tc/crear/{id}', 'PronosticoController@GetSubCatAgainstMainCatEdit');

Route::get('admin/pronostico/crear/{id}', 'PronosticoController@GetSubCatAgainstMainCatEdit');
Route::post('/automovil', 'MecanicaController@automovil')->name('automovil.servicio');

Route::post('admin/servicio/proveedores/crear', 'MecanicaController@store_servicio_proveedor')->name('store_servicio_proveedor.servicio');

/* Rutas para el select */
Route::get('admin/servicio/crear/{id}', 'MecanicaController@GetSubCatAgainstMainCatEdit');
Route::get('admin/servicio/crear/empresa/{id}', 'MecanicaController@GetEmpreAgainstMainCatEdit');
Route::get('admin/servicio/crear/sector/{id}', 'MecanicaController@GetSectorAgainstMainCatEdit');

/*|--------------------------------------------------------------------------
|Documents
|--------------------------------------------------------------------------*/

/* Trae todos todos los autos */
Route::group(['middleware' => ['permission:Ver Tarjeta C.|Editar Tarjeta C.']], function () {
    Route::get('admin/tarjeta-circulacion/index/', 'TarjetaCirculacionController@indextc_admin')->name('indextc_admin.tarjeta-circulacion');
    Route::get('admin/tarjeta-circulacion/edit/{id}', 'TarjetaCirculacionController@edit_admin')->name('edit_admin.tarjeta-circulacion');
    Route::patch('admin/tarjeta-circulacion/update/{id}', 'TarjetaCirculacionController@update_admin')->name('update_admin.tarjeta-circulacion');
});

Route::post('admin/tarjeta-circulacion/create/', 'ExpedientesController@store_admin_tc')->name('store_admin_tc.tarjeta-circulacion');

/*|--------------------------------------------------------------------------
|Expedientes Fisicos
|--------------------------------------------------------------------------*/
Route::delete('expediente/eliminar/{id}', 'ExpedientesController@destroy')->name('destroy.expediente');
/* Trae todos todos los autos */
Route::group(['middleware' => ['permission:Ver Expedientes|Crear Exp|Borrar Exp']], function () {
    Route::get('admin/exp-fisico/index/', 'ExpedientesController@index_admin')->name('index_admin.view-exp-fisico-admin');

    /* Trae datos de facttura */
    Route::post('admin/expediente/view-exp-fisico/{id}', 'ExpedientesController@upload')->name('dropzone.store');


    Route::post('admin/exp-fisico/crear/{id}', 'ExpedientesController@store_admin')->name('store_admin.expedientes');

    Route::get('admin/exp-fisico/factura/view/{id}', 'ExpedientesController@create_admin')->name('create_admin.view-factura-admin');

    Route::get('admin/exp-fisico/bp/view/{id}', 'ExpedientesController@create_admin')->name('create_admin.view-bp-admin');

    Route::get('admin/exp-fisico/cd/view/{id}', 'ExpedientesController@create_admin')->name('create_admin.view-cd-admin');

    Route::get('admin/exp-fisico/cr/view/{id}', 'ExpedientesController@create_admin')->name('create_admin.view-cr-admin');

    Route::get('admin/exp-fisico/ine/view/{id}', 'ExpedientesController@create_admin')->name('create_admin.view-ine-admin');

    Route::get('admin/exp-fisico/poliza/view/{id}', 'ExpedientesController@create_admin')->name('create_admin.view-poliza-admin');


    Route::get('admin/exp-fisico/reemplacamiento/view/{id}', 'ExpedientesController@create_admin')->name('create_admin.view-reemplacamiento-admin');

    Route::get('admin/exp-fisico/rfc/view/{id}', 'ExpedientesController@create_admin')->name('create_admin.view-rfc-admin');

    Route::get('admin/exp-fisico/tc/view/{id}', 'ExpedientesController@create_admin')->name('create_admin.view-tc-admin');

    Route::get('admin/exp-fisico/tenencia/view/{id}', 'ExpedientesController@create_admin')->name('create_admin.view-tenencia-admin');

    Route::get('admin/exp-fisico/certificado/view/{id}', 'ExpedientesController@create_admin')->name('create_admin.view-certificado-admin');
});
Route::get('admin/exp-fisico/inventario/view/{id}', 'ExpedientesController@create_admin')->name('create_admin.view-inventario-admin');
/*|--------------------------------------------------------------------------
|Marca
|--------------------------------------------------------------------------*/
Route::post('admin/servicio/crear/marca', 'MarcaController@store')->name('store.marca');

/*|--------------------------------------------------------------------------
|VERIFICACION view
|--------------------------------------------------------------------------*/
Route::group(['middleware' => ['permission:Ver Veri|Editar Veri']], function () {
    Route::get('admin/verificacion/index', 'VerificacionController@index_admin')->name('index_admin.verificacion');
    Route::get('admin/verificacion/edit/{id}', 'VerificacionController@edit_admin')->name('edit_admin.verificacion');
    Route::patch('admin/verificacion/update/{id}', 'VerificacionController@update_admin')->name('update_admin.verificacion');

    Route::post('admin/periodo2/update/{id}', 'VerificacionController@update_periodo2')->name('update_periodo2.verificacion');
});
/*|--------------------------------------------------------------------------
|Correo view
|--------------------------------------------------------------------------*/
Route::get('send-mail', [DashboardController::class, 'alerta']);

/*|--------------------------------------------------------------------------
|Notas
|--------------------------------------------------------------------------*/
Route::group(['middleware' => ['permission:Ver Notas|Crear Notas|Editar Notas|Eliminar Notas']], function () {
    Route::get('admin/notas/view', 'NotasContoller@index')->name('index.notas');
    Route::get('admin/notas/crear', 'NotasContoller@create')->name('create.notas');
    Route::post('admin/notas/store', 'NotasContoller@store')->name('store.notas');
    Route::post('admin/notas/edit', 'NotasContoller@edit')->name('edit.notas');
    Route::post('admin/notas/update/{id}', 'NotasContoller@update')->name('update.notas');
    Route::delete('admin/notas/destroy/{id}', 'NotasContoller@destroy')->name('destroy.notas');
});
/*|--------------------------------------------------------------------------
|Licencia de conducir view
|--------------------------------------------------------------------------*/
Route::get('licencia/index', 'LicenciaController@index')->name('index.licencia');
Route::patch('licencia/update/{id}', 'LicenciaController@update')->name('update.licencia');

Route::group(['middleware' => ['permission:Ver Licencia de Conducir|Editar Licencia de Conducir']], function () {
    Route::get('admin/licencia/index', 'LicenciaController@index_admin')->name('index_admin.licencia');
    Route::get('admin/licencia/edit/{id}', 'LicenciaController@edit_admin')->name('edit_admin.licencia');
    Route::patch('admin/licencia/update/{id}', 'LicenciaController@update_admin')->name('update_admin.licencia');
});
/*|--------------------------------------------------------------------------
|Cupones
|--------------------------------------------------------------------------*/
Route::group(['middleware' => ['permission:Ver Cupones|Crear Cupones|Editar Cupones|Eliminar Cupones']], function () {
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
});
Route::get('cupon/view', 'CuponController@index')->name('index.cupon');
require __DIR__ . '/auth.php';

/*|--------------------------------------------------------------------------
|Cotizacion
|--------------------------------------------------------------------------*/
Route::group(['middleware' => ['permission:Ver Cupones|Crear Cupones|Editar Cupones|Eliminar Cupones']], function () {
    Route::get('admin/cotizacion/view', 'CotizacionController@index')->name('index.cotizacion');
    Route::get('admin/cotizacion/crear', 'CotizacionController@create')->name('create.cotizacion');
    Route::get('admin/cotizacion/crear/{id}', 'CotizacionController@GetAutoAgainstMainCatEdit');
});
Route::get('cotizacion/view/{id}', 'CotizacionController@index_user')->name('index_user.cotizacion');


Route::post('admin/cotizacion/store', 'CotizacionController@store')->name('store.cotizacion');
Route::get('admin/cotizacion/edit/{id}', 'CotizacionController@edit')->name('edit.cotizacion');

Route::get('admin/cotizacion/videos/{id}', 'CotizacionController@videos')->name('videos.cotizacion');

Route::get('admin/cotizacion/crear/{user}', function (User $user) {
    return $user->only('name');
});

/*|--------------------------------------------------------------------------
|Diagnostico
|--------------------------------------------------------------------------*/
Route::get('admin/diagnostico/edit/{id}', 'CotizacionDiagnosticoController@edit')->name('edit.diagnostico');
Route::post('admin/diagnostico/update/{id}', 'CotizacionDiagnosticoController@update')->name('update.diagnostico');

Route::get('admin/taller/edit/{id}', 'TallerController@edit')->name('edit.taller');
Route::post('admin/taller/update', 'TallerController@update')->name('update.taller');

Route::get('admin/taller/changeStatus', 'TallerController@ChangeUserStatus')->name('ChangeUserStatus.taller');

/*|--------------------------------------------------------------------------
|sector
|--------------------------------------------------------------------------*/
Route::post('admin/sector/store', 'UserController@store_sector')->name('store.sector');
Route::delete('admin/sector/destroy/{id}', 'UserController@destroy_sector')->name('destroy.sector');

/*|--------------------------------------------------------------------------
|Gasolina
|--------------------------------------------------------------------------*/
Route::get('admin/gasolina/index', 'GasolinaController@index_admin')->name('index_admin.gasolina');
Route::get('admin/gasolina/crear', 'GasolinaController@create_admin')->name('create.gasolina');
Route::post('admin/gasolina/store', 'GasolinaController@store_admin')->name('store.gasolina');
Route::get('admin/gasolina/view/{id}', 'GasolinaController@show_admin')->name('show.gasolina');
Route::get('admin/gasolina/edit/{id}', 'GasolinaController@edit_admin')->name('edit_admin.gasolina');
Route::patch('admin/gasolina/update/{id}', 'GasolinaController@update_admin')->name('update_admin.gasolina');

Route::get('admin/gasolina/crear/empresa/{id}', 'GasolinaController@GetSector2AgainstMainCatEdit');

/*|--------------------------------------------------------------------------
|Gasolina User
|--------------------------------------------------------------------------*/
Route::get('gasolina/index', 'GasolinaController@index2')->name('index2.gasolina');
Route::get('gasolina/crear', 'GasolinaController@create2')->name('create2.gasolina');
Route::post('gasolina/store', 'GasolinaController@store2')->name('store2.gasolina');

/*|--------------------------------------------------------------------------
|Remision
|--------------------------------------------------------------------------*/
Route::get('remision/edit/{id}', 'CotizacionRemisionController@edit')->name('edit.remision');
Route::post('remision/update', 'CotizacionRemisionController@update')->name('update.remision');

Route::post('remision/updater/{id}', 'CotizacionRemisionController@updateremision')->name('updateremision.remision');
Route::get('changeAprobacionRemision', 'CotizacionRemisionController@ChangeUserEstatus')->name('ChangeUserEstatus.remision');

Route::get('imprimir/cotizacion/{id}', 'CotizacionRemisionController@pdf_cotizacion')->name('print.cotizacion');
Route::get('imprimir/remision/{id}', 'CotizacionRemisionController@pdf_remision')->name('printf.remision');

/*|--------------------------------------------------------------------------
|Key Empresas
|--------------------------------------------------------------------------*/
Route::get('key/index', 'KeyController@index')->name('index.key');
Route::post('key/store', 'KeyController@store')->name('store.key');
Route::get('key/edit/{id}', 'KeyController@edit')->name('edit.key');
Route::patch('key/update/{id}', 'KeyController@update')->name('update.key');

Route::get('changeAprobacionKey', 'KeyController@ChangeLlave')->name('ChangeLlave.key');

/*|--------------------------------------------------------------------------
|Cotizacion para Admin
|--------------------------------------------------------------------------*/
Route::get('cotizacion', 'TallerController@up')->name('up.cotizacion');
Route::get('refaccion', 'TallerController@refaccion')->name('refaccion.cotizacion');
Route::get('mano_obra', 'TallerController@mano_obra')->name('mano_obra.cotizacion');
Route::get('importe_unitario', 'TallerController@importe_unitario')->name('importe_unitario.cotizacion');
Route::get('importe_total', 'TallerController@importe_total')->name('importe_total.cotizacion');

Route::delete('/cotizacion/{id}', function ($id) {
    $item = Taller::destroy($id);
    return Response::json($item);
});


/*|--------------------------------------------------------------------------
|Cotizacion Para user
|--------------------------------------------------------------------------*/
Route::get('reparacion', 'CotizacionRemisionController@reparacion')->name('reparacion.remision');
Route::get('mano', 'CotizacionRemisionController@mano')->name('mano.remision');
Route::get('importe', 'CotizacionRemisionController@importe')->name('importe.remision');
Route::get('fecha_cotizacion', 'CotizacionRemisionController@fecha_cotizacion')->name('fecha_cotizacion.remision');
Route::get('total_cotizacion', 'CotizacionRemisionController@total_cotizacion')->name('total_cotizacion.remision');

Route::delete('/remision/{id}', function ($id) {
    $item = CotizacionRemision::destroy($id);
    return Response::json($item);
});
