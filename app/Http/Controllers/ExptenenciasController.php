<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\ExpTenencias;
use App\Models\TarjetaCirculacion;
use Session;
use Carbon\Carbon;
use App\Models\Alertas;
use App\Models\Seguros;

class ExptenenciasController extends Controller
{
     function index(){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $auto_user = $user->{'id'};

        $exp_tenencias = DB::table('exp_tenencias')
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


        return view('exp-fisico.view-tenencia',compact('exp_tenencias', 'alert2','seguro_alerta','tc_alerta'));
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

        return view('exp-fisico.view-tenencia',compact('alert2','seguro_alerta','tc_alerta'));
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'tenencia' => 'mimes:jpeg,bpm,jpg,png|max:900',
        ]);

        $exp_tenencias = new ExpTenencias;

    	if ($request->hasFile('tenencia')) {
    		$file=$request->file('tenencia');
    		$file->move(public_path().'/exp-tenencias',time().".".$file->getClientOriginalExtension());
    		$exp_tenencias->tenencia=time().".".$file->getClientOriginalExtension();
    	}

        $exp_tenencias->id_user = auth()->user()->id;
    	$exp_tenencias->current_auto = auth()->user()->current_auto;

        $exp_tenencias->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-tenencias', compact('exp_tenencias'));
    }

        public function create_admin($id)
    {
        /* Trae los datos el auto en el que esta */
        $automovil = DB::table('automovil')
        ->where('id','=',$id)
        ->first();

        $exp_auto = $automovil->id;

        $exp_tenencias = DB::table('exp_tenencias')
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

        return view('admin.exp-fisico.view-tenencia-admin',compact('exp_tenencias','automovil', 'alert2','seguro_alerta','tc_alerta'));
    }

    public function store_admin(Request $request,$id){

        $validate = $this->validate($request,[
            'tenencia' => 'mimes:jpeg,bpm,jpg,png|max:900',
        ]);

        $exp = new ExpTenencias;
    	if ($request->hasFile('tenencia')) {
    		$file=$request->file('tenencia');
    		$file->move(public_path().'/exp-tenencia',time().".".$file->getClientOriginalExtension());
    		$exp->tenencia=time().".".$file->getClientOriginalExtension();
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
