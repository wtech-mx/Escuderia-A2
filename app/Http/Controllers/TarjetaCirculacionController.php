<?php

namespace App\Http\Controllers;

use App\Models\TarjetaCirculacion;
use App\Models\User;
use App\Models\ImgTc;
use Illuminate\Http\Request;
use Session;
use DB;

class TarjetaCirculacionController extends Controller
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
        $tarjeta_circulacion->current_auto = auth()->user()->current_auto;

        $tarjeta_circulacion->update();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->route('index.tc', compact('tarjeta_circulacion'));

    }

/*|--------------------------------------------------------------------------
|Create TarjetaCirculacion Usuario
|--------------------------------------------------------------------------*/
    public function indextc_admin(){

        $tarjeta_circulacion = TarjetaCirculacion::first();

        return view('admin.tarjeta-circulacion.view-tc-admin',compact('tarjeta_circulacion'));
    }

    public function  edit_admin($id){

        $auto = DB::table('users')
        ->where('current_auto','=',auth()->user()->current_auto)
        ->first();

        $tarjeta_circulacion = TarjetaCirculacion::where('current_auto','=',$auto->current_auto)->first();

        return view('admin.tarjeta-circulacion.tarjeta_circulacion',compact('tarjeta_circulacion'));
    }

    function update_admin(Request $request, $id){

        $validate = $this->validate($request, [
            'nombre' => 'required|max:191',
            'tipo_placa' => 'required|max:191',
            'lugar_expedicion' => 'required|max:191',
        ]);

        $tarjeta_circulacion = TarjetaCirculacion::findOrFail($id);
        $tarjeta_circulacion->id_user = $request->get('id_user');
        $tarjeta_circulacion->current_auto = $request->get('current_auto');
        $tarjeta_circulacion->nombre = $request->get('nombre');
        $tarjeta_circulacion->tipo_placa = $request->get('tipo_placa');
        $tarjeta_circulacion->lugar_expedicion = $request->get('lugar_expedicion');
        $tarjeta_circulacion->fecha_emision = $request->get('fecha_emision');
        $tarjeta_circulacion->fecha_vencimiento = $request->get('fecha_vencimiento');
        $tarjeta_circulacion->num_placa = $request->get('num_placa');

        $tarjeta_circulacion->update();


        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('indextc_admin.tarjeta-circulacion', compact('tarjeta_circulacion'));
    }
}
