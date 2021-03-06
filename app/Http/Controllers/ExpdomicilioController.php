<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\ExpDomicilio;
use Session;
use Carbon\Carbon;
use App\Models\Alertas;

class ExpdomicilioController extends Controller
{
     function index(){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $auto_user = $user->{'id'};

        $exp_domicilio = DB::table('exp_domicilio')
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

        return view('exp-fisico.view-cd',compact('exp_domicilio', 'alert2'));
    }

    public function create(){
                          // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();
          $alert2 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('fecha_inicio','<=', $current)
              ->where('status', '=', 0)
            ->get();

        return view('exp-fisico.view-cd', 'alert2');
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'domicilio' => 'mimes:jpeg,bpm,jpg,png|max:900',
        ]);

        $exp_domicilio = new ExpDomicilio;

    	if ($request->hasFile('domicilio')) {
    		$file=$request->file('domicilio');
    		$file->move(public_path().'/exp-domicilio',time().".".$file->getClientOriginalExtension());
    		$exp_domicilio->domicilio=time().".".$file->getClientOriginalExtension();
    	}

        $exp_domicilio->id_user = auth()->user()->id;
    	$exp_domicilio->current_auto = auth()->user()->current_auto;
//dd($exp_domicilio);
        $exp_domicilio->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-cd', compact('exp_domicilio'));
    }

        public function create_admin($id)
    {
        /* Trae los datos el auto en el que esta */
        $automovil = DB::table('automovil')
        ->where('id','=',$id)
        ->first();

        $exp_auto = $automovil->id;

        $exp_domicilio = DB::table('exp_domicilio')
        ->where('current_auto','=', $exp_auto)
        ->get();

                          // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();
          $alert2 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('fecha_inicio','<=', $current)
              ->where('status', '=', 0)
            ->get();

        return view('admin.exp-fisico.view-cd-admin',compact('exp_domicilio','automovil', 'alert2'));
    }

    public function store_admin(Request $request,$id){

        $validate = $this->validate($request,[
            'domicilio' => 'mimes:jpeg,bpm,jpg,png|max:900',
        ]);

        $exp = new ExpDomicilio;
    	if ($request->hasFile('domicilio')) {
    		$file=$request->file('domicilio');
    		$file->move(public_path().'/exp-domicilio',time().".".$file->getClientOriginalExtension());
    		$exp->domicilio=time().".".$file->getClientOriginalExtension();
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
