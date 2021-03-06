<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\ExpTc;
use App\Models\TarjetaCirculacion;
use Session;
use Carbon\Carbon;
use App\Models\Alertas;

class ExptcController extends Controller
{
     function index(){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $auto_user = $user->{'id'};

        $exp_tc = DB::table('exp_tc')
        ->where('id_user','=',$auto_user)
        ->where('current_auto','=',auth()->user()->current_auto)
        ->get();

                   // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();
          $alert2 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('fecha_inicio','<=', $current)
              ->where('status', '=', 0)
            ->get();

        $img = TarjetaCirculacion::where('current_auto','=',$user->current_auto)->first();

        return view('exp-fisico.view-tc',compact('exp_tc', 'img', 'alert2'));
    }

    public function create(){
                          // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();
          $alert2 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('fecha_inicio','<=', $current)
              ->where('status', '=', 0)
            ->get();

        return view('exp-fisico.view-tc', compact('alert2'));
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'tc' => 'mimes:jpeg,bpm,jpg,png|max:900',
        ]);

        $exp_tc = new ExpTc;

    	if ($request->hasFile('tc')) {
    		$file=$request->file('tc');
    		$file->move(public_path().'/exp-tc',time().".".$file->getClientOriginalExtension());
    		$exp_tc->tc=time().".".$file->getClientOriginalExtension();
    	}

        $exp_tc->id_user = auth()->user()->id;
    	$exp_tc->current_auto = auth()->user()->current_auto;

        $exp_tc->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-tc', compact('exp_tc'));
    }
/*|--------------------------------------------------------------------------
|Create TC Admin_Admin
|--------------------------------------------------------------------------*/


        public function create_admin($id)
    {
        /* Trae los datos el auto en el que esta */
        $automovil = DB::table('tarjeta_circulacion')
        ->where('current_auto','=',$id)
        ->first();

        $exp_tc = DB::table('img_tcs')
        ->where('id_tc','=', $automovil->id)
        ->get();

                          // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();
          $alert2 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('fecha_inicio','<=', $current)
              ->where('status', '=', 0)
            ->get();

        return view('admin.exp-fisico.view-tc-admin',compact('exp_tc','automovil', 'alert2'));
    }

    public function store_admin(Request $request,$id){

        $validate = $this->validate($request,[
            'tc' => 'mimes:jpeg,bpm,jpg,png|max:900',
        ]);

        $exp = new ExpTc;
    	if ($request->hasFile('tc')) {
    		$file=$request->file('tc');
    		$file->move(public_path().'/exp-tc',time().".".$file->getClientOriginalExtension());
    		$exp->tc=time().".".$file->getClientOriginalExtension();
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
