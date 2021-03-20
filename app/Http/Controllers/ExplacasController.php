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

        // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();
          $alert2 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('start','<=', $current)
              ->where('status', '=', 0)
            ->get();

         //Trae la alerta Seguro
          $seguro_alerta = Seguros::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('end','<=', $current)
            ->get();
          //Trae la alerta Tc
          $tc_alerta = TarjetaCirculacion::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('end','<=', $current)
            ->get();

        return view('exp-fisico.view-bp',compact('exp_placas', 'alert2', 'seguro_alerta','tc_alerta'));
    }

    public function create(){
          // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();
          $alert2 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('start','<=', $current)
              ->where('status', '=', 0)
            ->get();
          //Trae la alerta Seguro
          $seguro_alerta = Seguros::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('end','<=', $current)
            ->get();
          //Trae la alerta Tc
          $tc_alerta = TarjetaCirculacion::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('end','<=', $current)
            ->get();

        return view('exp-fisico.view-bp', compact('alert2','seguro_alerta','tc_alerta'));
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'placa' => 'mimes:jpeg,bpm,jpg,png|max:900',
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
                          // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();
          $alert2 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('start','<=', $current)
              ->where('status', '=', 0)
            ->get();
          //Trae la alerta Seguro
          $seguro_alerta = Seguros::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('end','<=', $current)
            ->get();
          //Trae la alerta Tc
          $tc_alerta = TarjetaCirculacion::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('end','<=', $current)
            ->get();

        return view('admin.exp-fisico.view-bp-admin',compact('exp_placas','automovil', 'alert2','seguro_alerta','tc_alerta'));
    }

    public function store_admin(Request $request,$id){

        $validate = $this->validate($request,[
            'placa' => 'mimes:jpeg,bpm,jpg,png|max:900',
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
