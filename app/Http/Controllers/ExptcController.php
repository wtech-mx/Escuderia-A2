<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\ExpTc;
use App\Models\TarjetaCirculacion;
use Session;

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

        $img = TarjetaCirculacion::where('current_auto','=',$user->current_auto)->first();

        return view('exp-fisico.view-tc',compact('exp_tc', 'img'));
    }

    public function create(){

        return view('exp-fisico.view-tc');
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
|Create Seguro Admin_Admin
|--------------------------------------------------------------------------*/


        public function create_admin($id)
    {
        /* Trae los datos el auto en el que esta */
        $automovil = DB::table('automovil')
        ->where('id','=',$id)
        ->first();

        $exp_auto = $automovil->id;

        $exp_tc = DB::table('exp_tc')
        ->where('current_auto','=', $exp_auto)
        ->get();

        return view('admin.exp-fisico.view-tc-admin',compact('exp_tc','automovil'));
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
