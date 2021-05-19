<?php

namespace App\Http\Controllers;

use App\Models\Licencia;
use Illuminate\Http\Request;
use Session;
use DB;

class LicenciaController extends Controller
{

/*|--------------------------------------------------------------------------
|Create Licencia Usuario
|--------------------------------------------------------------------------*/
public function index(){

    $licencia = Licencia::where('id_user','=',auth()->user()->id)->get();

    return view('licencia.index',compact('licencia'));
}

public function update(Request $request,$id){

    $licencia = Licencia::findOrFail($id);

    $licencia->id_user = $request->get('id_user');
    $licencia->tipo = $request->get('tipo');
    $licencia->expedicion = $request->get('expedicion');

    $licencia->update();

    Session::flash('success', 'Se ha guardado sus datos con exito');
    return redirect()->route('index.tc', compact('tarjeta_circulacion'));

}
}
