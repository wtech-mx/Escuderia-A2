<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\ExpPoliza;
use App\Models\TarjetaCirculacion;
use Session;
use Carbon\Carbon;
use App\Models\Alertas;
use App\Models\Seguros;

class ExpolizaController extends Controller
{
      function index(){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $auto_user = $user->{'id'};

        $exp_poliza = DB::table('exp_poliza')
        ->where('id_user','=',$auto_user)
        ->where('current_auto','=',auth()->user()->current_auto)
        ->get();

         // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();
          $alert2 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('start','<=', $current)
              ->where('estatus', '=', 0)
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

        $img = TarjetaCirculacion::where('current_auto','=',$user->current_auto)->first();

        return view('exp-fisico.view-poliza',compact('exp_poliza', 'img', 'alert2', 'seguro_alerta','tc_alerta'));
    }

    public function create(){
                          // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();
          $alert2 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('start','<=', $current)
              ->where('estatus', '=', 0)
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

        return view('exp-fisico.view-poliza', compact('alert2', 'seguro_alerta','tc_alerta'));
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'poliza' => 'mimes:jpeg,bpm,jpg,png|max:900',
        ]);

        $exp_poliza = new ExpPoliza;

    	if ($request->hasFile('poliza')) {
    		$file=$request->file('poliza');
    		$file->move(public_path().'/exp-poliza',time().".".$file->getClientOriginalExtension());
    		$exp_poliza->poliza=time().".".$file->getClientOriginalExtension();
    	}

        $exp_poliza->id_user = auth()->user()->id;
    	$exp_poliza->current_auto = auth()->user()->current_auto;

        $exp_poliza->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-poliza', compact('exp_poliza'));
    }

        public function create_admin($id)
    {
        /* Trae los datos el auto en el que esta */
        $automovil = DB::table('automovil')
        ->where('id','=',$id)
        ->first();

        $exp_auto = $automovil->id;

        $exp_poliza = DB::table('exp_poliza')
        ->where('current_auto','=', $exp_auto)
        ->get();
                          // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();
          $alert2 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('start','<=', $current)
              ->where('estatus', '=', 0)
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

        return view('admin.exp-fisico.view-poliza-admin',compact('exp_poliza','automovil', 'alert2', 'seguro_alerta','tc_alerta'));
    }

    public function store_admin(Request $request){

        $validate = $this->validate($request,[
            'poliza' => 'mimes:jpeg,bpm,jpg,png|max:900',
        ]);

        $exp = new ExpPoliza;
    	if ($request->hasFile('poliza')) {
    		$file=$request->file('poliza');
    		$file->move(public_path().'/exp-poliza',time().".".$file->getClientOriginalExtension());
    		$exp->poliza=time().".".$file->getClientOriginalExtension();
    	}

    	$exp->current_auto = $request->get('current_auto');

    	/* Compara el auto que se selecciono con la db */
        $automovil = DB::table('automovil')
        ->where('id','=', $exp->current_auto)
        ->first();

        $exp->current_auto = $automovil->id;

        $exp->id_user = $automovil->id_user;

        $exp->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->back();
    }

}
