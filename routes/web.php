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
|garaje edit
|--------------------------------------------------------------------------*/

Route::get('/garaje/edit-garaje', function () {
    return view('garaje/edit-garaje');
})->middleware(['auth'])->name('edit-garaje');

/*|--------------------------------------------------------------------------
|perfil
|--------------------------------------------------------------------------*/
Route::patch('profile/update/{id}','UserController@update')->name('update.user');
Route::get('profile/edit/{id}','UserController@edit')->name('edit.profile');

/*|--------------------------------------------------------------------------
|Seguros
|--------------------------------------------------------------------------*/

Route::get('/seguros/view-seguros', function () {
    return view('seguros/view-seguros');
})->middleware(['auth'])->name('view-seguros');

/*|--------------------------------------------------------------------------
|Documents
|--------------------------------------------------------------------------*/

Route::get('/documents/view-documents', function () {
    return view('documents/view-documents');
})->middleware(['auth'])->name('view-documents');

Route::get('/documents/view-otro-ts', function () {
    return view('documents/view-otro-ts');
})->middleware(['auth'])->name('view-otro-ts');

Route::get('/documents/view-exp-ts', function () {
    return view('documents/view-exp-ts');
})->middleware(['auth'])->name('view-exp-ts');

Route::get('/documents/view-lugar-ts', function () {
    return view('documents/view-lugar-ts');
})->middleware(['auth'])->name('view-lugar-ts');

Route::get('/documents/view-vencimiento-ts', function () {
    return view('documents/view-vencimiento-ts');
})->middleware(['auth'])->name('view-vencimiento-ts');

Route::get('/documents/view-vencimiento-ts', function () {
    return view('documents/view-vencimiento-ts');
})->middleware(['auth'])->name('view-vencimiento-ts');


/*|--------------------------------------------------------------------------
|Expedientes Fisicos
|--------------------------------------------------------------------------*/
Route::get('/exp-fisico/view-exp-fisico', function () {
    return view('exp-fisico/view-exp-fisico');
})->middleware(['auth'])->name('view-exp-fisico');

Route::get('/exp-fisico/view-factura', function () {
    return view('exp-fisico/view-factura');
})->middleware(['auth'])->name('view-factura');

Route::get('/exp-fisico/view-cr', function () {
    return view('exp-fisico/view-cr');
})->middleware(['auth'])->name('view-cr');

Route::get('/exp-fisico/view-poliza', function () {
    return view('exp-fisico/view-poliza');
})->middleware(['auth'])->name('view-poliza');

Route::get('/exp-fisico/view-tc', function () {
    return view('exp-fisico/view-tc');
})->middleware(['auth'])->name('view-tc');

Route::get('/exp-fisico/view-reemplacamiento', function () {
    return view('exp-fisico/view-reemplacamiento');
})->middleware(['auth'])->name('view-reemplacamiento');

Route::get('/exp-fisico/view-bp', function () {
    return view('exp-fisico/view-bp');
})->middleware(['auth'])->name('view-bp');

Route::get('/exp-fisico/view-ine', function () {
    return view('exp-fisico/view-ine');
})->middleware(['auth'])->name('view-ine');

Route::get('/exp-fisico/view-cd', function () {
    return view('exp-fisico/view-cd');
})->middleware(['auth'])->name('view-cd');

Route::get('/exp-fisico/view-rfc', function () {
    return view('exp-fisico/view-rfc');
})->middleware(['auth'])->name('view-rfc');

Route::get('/exp-fisico/view-tenencia', function () {
    return view('exp-fisico/view-tenencia');
})->middleware(['auth'])->name('view-tenencia');

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
|garaje view
|--------------------------------------------------------------------------*/

Route::get('admin/garaje/view-garaje-admin', function () {
    return view('admin/garaje/view-garaje-admin');
})->middleware(['auth'])->name('view-garaje-admin');


/*|--------------------------------------------------------------------------
|garaje edit
|--------------------------------------------------------------------------*/

Route::get('admin/garaje/edit-garaje-admin', function () {
    return view('admin/garaje/edit-garaje-admin');
})->middleware(['auth'])->name('edit-garaje-admin');

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
