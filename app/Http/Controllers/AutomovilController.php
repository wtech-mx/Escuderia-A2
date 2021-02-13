<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Automovil;
use Session;

class AutomovilController extends Controller
{
    function index(){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $auto_user = $user->{'id'};

        $automovil = DB::table('automovil')
        ->where('id_user','=',$auto_user)
        ->get();

        $marca = DB::table('marca')
            ->get();

        return view('garaje.view-garaje',compact('automovil', 'marca'));
    }

    public function create(){
         $marca = DB::table('marca')
            ->get();

        return view('garaje.create-garaje',compact('marca'));
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'submarca' => 'required|max:191',
            'tipo' => 'required|max:191',
            'kilometraje' => 'required|max:191',
            'subtipo' => 'required|max:191',
            'año' => 'required|max:191',
            'numero_serie' => 'required|max:191',
            'color' => 'required|max:191',
            'placas' => 'required|max:191',
        ]);

        $automovil = new Automovil;
        $automovil->id_marca = $request->get('id_marca');
        $automovil->submarca = $request->get('submarca');
        $automovil->tipo = $request->get('tipo');
        $automovil->kilometraje = $request->get('kilometraje');
        $automovil->subtipo = $request->get('subtipo');
        $automovil->año = $request->get('año');
        $automovil->numero_serie = $request->get('numero_serie');
        $automovil->color = $request->get('color');
        $automovil->placas = $request->get('placas');
        $automovil->estatus = $request->get('estatus');

        $automovil->id_user = auth()->user()->id;

        $automovil->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.automovil', compact('automovil'));
        //return view('garaje.view-garaje',compact('automovil'));
    }

    public function  edit($id){

        $automovil = Automovil::findOrFail($id);

        $marca = DB::table('marca')
            ->get();

        return view('garaje.edit-garaje',compact('automovil', 'marca'));
    }

    function update(Request $request, $id){

        $validate = $this->validate($request, [
            'submarca' => 'required|max:191',
            'tipo' => 'required|max:191',
            'kilometraje' => 'required|max:191',
            'subtipo' => 'required|max:191',
            'año' => 'required|max:191',
            'numero_serie' => 'required|max:191',
            'color' => 'required|max:191',
            'placas' => 'required|max:191',
        ]);

        $automovil = Automovil::findOrFail($id);
        $automovil->id_marca = $request->get('id_marca');
        $automovil->submarca = $request->get('submarca');
        $automovil->tipo = $request->get('tipo');
        $automovil->kilometraje = $request->get('kilometraje');
        $automovil->subtipo = $request->get('subtipo');
        $automovil->año = $request->get('año');
        $automovil->numero_serie = $request->get('numero_serie');
        $automovil->color = $request->get('color');
        $automovil->placas = $request->get('placas');
        $automovil->estatus = $request->get('estatus');

        $automovil->update();

        $marca = DB::table('marca')
            ->get();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.automovil', compact('automovil','marca'));
    }

}
