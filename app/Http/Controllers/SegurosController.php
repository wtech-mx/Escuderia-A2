<?php

namespace App\Http\Controllers;

use App\Models\Seguros;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;

class SegurosController extends Controller
{

    public function update(Request $request,$id){

        $validate = $this->validate($request,[
            'seguro' => 'max:150',
            'fecha_expedicion' => 'max:150',
    		'fecha_vencimiento' => 'max:150',
            'tipo_cobertura' => 'max:150',
            'costo' => 'max:150',
            'costo_anual' => 'max:150',
        ]);

        $seguro = Seguros::findOrFail($id);

        $seguro->seguro = $request->get('seguro');
        $seguro->fecha_expedicion = $request->get('fecha_expedicion');
        $seguro->fecha_vencimiento = $request->get('fecha_vencimiento');
        $seguro->tipo_cobertura = $request->get('tipo_cobertura');
        $seguro->costo = $request->get('costo');
        $seguro->costo_anual = $request->get('costo_anual');

        $seguro->update();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return view('seguros.seguros', compact('seguro'));
    }

    public function edit($id){

        $auto = DB::table('users')
        ->where('current_auto','=',auth()->user()->current_auto)
        ->first();

        $seguro = DB::table('seguros')
        ->where('current_auto','=',$auto->current_auto)
        ->first();

        return view('seguros.seguros',compact('seguro'));
    }
}
