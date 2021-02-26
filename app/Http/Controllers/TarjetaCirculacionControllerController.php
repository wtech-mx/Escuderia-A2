<?php

namespace App\Http\Controllers;

use App\Models\TarjetaCirculacion;
use Illuminate\Http\Request;
use Session;
use DB;

class TarjetaCirculacionControllerController extends Controller
{
/*|--------------------------------------------------------------------------
|Create TarjetaCirculacion Usuario
|--------------------------------------------------------------------------*/
    public function index(){

        $auto = DB::table('users')
        ->where('current_auto','=',auth()->user()->current_auto)
        ->first();

        $tarjeta_circulacion = TarjetaCirculacion::where('current_auto','=',$auto->current_auto)->first();

        return view('tarjeta-circulacion.tarjeta_circulacion',compact('tarjeta_circulacion'));
    }

    public function update(Request $request,$id){

        $tarjeta_circulacion = TarjetaCirculacion::findOrFail($id);

        $tarjeta_circulacion->nombre = $request->get('nombre');
        $tarjeta_circulacion->tipo_placa = $request->get('tipo_placa');
        $tarjeta_circulacion->lugar_expedicion = $request->get('lugar_expedicion');
        $tarjeta_circulacion->fecha_emision = $request->get('fecha_emision');
        $tarjeta_circulacion->fecha_vencimiento = $request->get('fecha_vencimiento');
        $tarjeta_circulacion->num_placa = $request->get('num_placa');

        $tarjeta_circulacion->update();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->route('index.tc', compact('tarjeta_circulacion'));

    }
}
