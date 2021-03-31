<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\ExpPlacas;
use Session;
use Carbon\Carbon;
use App\Models\Alertas;
use App\Models\Seguros;
use App\Models\TarjetaCirculacion;

class ExplacasController extends Controller
{
      function index(){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $auto_user = $user->{'id'};

        $exp_placas = DB::table('exp_placas')
        ->where('id_user','=',$auto_user)
        ->where('current_auto','=',auth()->user()->current_auto)
        ->get();

        return view('exp-fisico.view-bp',compact('exp_placas'));
    }

    public function create(){

        return view('exp-fisico.view-bp');
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'placa' => 'mimes:jpeg,bpm,jpg,png,pdf|max:900',
        ]);

        $exp_placas = new ExpPlacas;

    	if ($request->hasFile('placa')) {
    		$file=$request->file('placa');
    		$file->move(public_path().'/exp-bp',time().".".$file->getClientOriginalExtension());
    		$exp_placas->placa=time().".".$file->getClientOriginalExtension();
    	}

        $exp_placas->id_user = auth()->user()->id;
    	$exp_placas->current_auto = auth()->user()->current_auto;

        $exp_placas->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-bp', compact('exp_placas'));
    }

        public function create_admin($id)
    {
        /* Trae los datos el auto en el que esta */
        $automovil = DB::table('automovil')
        ->where('id','=',$id)
        ->first();

        $exp_auto = $automovil->id;

        $exp_placas = DB::table('exp_placas')
        ->where('current_auto','=', $exp_auto)
        ->get();

        return view('admin.exp-fisico.view-bp-admin',compact('exp_placas','automovil'));
    }

    public function store_admin(Request $request,$id){

        $validate = $this->validate($request,[
            'placa' => 'mimes:jpeg,bpm,jpg,png,pdf|max:900',
        ]);

        $exp = new ExpPlacas;
    	if ($request->hasFile('placa')) {
    		$file=$request->file('placa');
    		$file->move(public_path().'/exp-placa',time().".".$file->getClientOriginalExtension());
    		$exp->placa=time().".".$file->getClientOriginalExtension();
    	}

//    	$exp->fecha_expedicion = $request->get('fecha_expedicion');

    	/* Compara el auto que se selecciono con la db */
        $automovil = DB::table('automovil')
        ->where('id','=',$id)
        ->first();

        $exp->current_auto = $automovil->id;
        $exp->id_user = $automovil->id_user;

        $exp->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->back();
    }

}
