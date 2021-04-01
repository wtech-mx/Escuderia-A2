<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpCertificado;
use Session;
use DB;

class ExpCertificadoController extends Controller
{
    function index(){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $exp_certificado = DB::table('exp_certificado')
        ->where('id_user','=',$user->id)
        ->where('current_auto','=',auth()->user()->current_auto)
        ->get();

        return view('exp-fisico.view-certificado',compact('exp_certificado'));
    }

    public function create(){

        return view('exp-fisico.view-certificado');
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'certificado' => 'mimes:jpeg,bpm,jpg,png,pdf|max:900',
        ]);

        $exp_certificados = new ExpCertificado;

        $exp_certificados->titulo = $request->get('titulo');
    	if ($request->hasFile('certificado')) {
    		$file=$request->file('certificado');
    		$file->move(public_path().'/exp-certificado',time().".".$file->getClientOriginalExtension());
    		$exp_certificados->certificado=time().".".$file->getClientOriginalExtension();
    	}

        $exp_certificados->id_user = auth()->user()->id;
    	$exp_certificados->current_auto = auth()->user()->current_auto;

        $exp_certificados->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-certificado', compact('exp_certificados'));
    }

/*|--------------------------------------------------------------------------
|Exp Certificado Admin
|--------------------------------------------------------------------------*/

    public function create_admin($id)
    {
        /* Trae los datos el auto en el que esta */
        $automovil = DB::table('automovil')
        ->where('id','=',$id)
        ->first();

        $exp_certificados = DB::table('exp_certificado')
        ->where('current_auto','=', $automovil->id)
        ->get();

        return view('admin.exp-fisico.view-certificado-admin',compact('exp_certificados','automovil'));
    }

    public function store_admin(Request $request,$id){

        $validate = $this->validate($request,[
            'certificado' => 'mimes:jpeg,bpm,jpg,png,pdf|max:900',
        ]);

        $exp = new ExpCertificado;
        $exp->titulo = $request->get('titulo');
    	if ($request->hasFile('certificado')) {
    		$file=$request->file('certificado');
    		$file->move(public_path().'/exp-certificado',time().".".$file->getClientOriginalExtension());
    		$exp->certificado=time().".".$file->getClientOriginalExtension();
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
