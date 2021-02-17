<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Seguros;
use Session;

class SegurosController extends Controller
{
     public function index(){
        $auto = DB::table('users')
        ->where('current_auto','=',auth()->user()->current_auto)
        ->first();

        $current_auto = $auto->{'current_auto'};

        $seguro = DB::table('seguros')
            ->where('current_auto','=',$current_auto)
            ->get();

        return view('seguros.view-seguros',compact('seguro'));
    }

    public function update(Request $request,$id){
        $validate = $this->validate($request,[
            'seguro' => 'required|max:150',
            'fecha_expedicion' => 'required',
    		'fecha_vencimiento' => 'required',
            'tipo_cobertura' => 'required|max:150',
            'costo' => 'required|max:150',
            'costo_anual' => 'required|max:150',
        ]);

        $seguro = Seguros::findOrFail($id);
        $seguro->seguro = $request->get('seguro');
        dd($seguro);
        $seguro->fecha_expedicion = $request->get('fecha_expedicion');
        $seguro->fecha_vencimiento = $request->get('fecha_vencimiento');
        $seguro->tipo_cobertura = $request->get('tipo_cobertura');
        $seguro->costo = $request->get('costo');
        $seguro->costo_anual = $request->get('costo_anual');

        $seguro->id_user = auth()->user()->id;
        $seguro->current_auto = auth()->user()->current_auto;

        $seguro->update();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->route('index.seguro', compact('seguro'));
    }
}
