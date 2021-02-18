<?php

namespace App\Http\Controllers;

use App\Models\Seguros;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;

class SegurosController extends Controller
{

    public function index(){

        $auto = DB::table('users')
        ->where('current_auto','=',auth()->user()->current_auto)
        ->first();

        $seguro = DB::table('seguros')
        ->where('current_auto','=',$auto->current_auto)
        ->first();

        return view('seguros.seguros',compact('seguro'));
    }

    public function update(Request $request,$id){

        $seguro = Seguros::findOrFail($id);

        $seguro->seguro = $request->get('seguro');
        $seguro->fecha_expedicion = $request->get('fecha_expedicion');
        $seguro->fecha_vencimiento = $request->get('fecha_vencimiento');
        $seguro->tipo_cobertura = $request->get('tipo_cobertura');
        $seguro->costo = $request->get('costo');
        $seguro->costo_anual = $request->get('costo_anual');

        $seguro->update();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->route('index.seguro', compact('seguro'));
    }
}
