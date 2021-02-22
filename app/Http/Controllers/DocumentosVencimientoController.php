<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\DocumentosVencimiento;

class DocumentosVencimientoController extends Controller
{
     function index(){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $auto_user = $user->{'id'};

        $documentos = DB::table('documentos_vencimiento')
        ->where('id_user','=',$auto_user)
        ->where('current_auto','=',auth()->user()->current_auto)
        ->get();

        return view('documents.view-vencimiento-ts',compact('documentos'));
    }

    public function create(){

        return view('documents.create.vencimiento-tc');
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'fecha_vencimiento' => 'required',
            'img' => 'mimes:jpeg,bpm,jpg,png|max:900',
        ]);

        $documentos = new DocumentosVencimiento;

    	if ($request->hasFile('img')) {
    		$file=$request->file('img');
    		// dd($file);
    		$file->move(public_path().'/vencimiento-tc',time().".".$file->getClientOriginalExtension());
    		$documentos->img=time().".".$file->getClientOriginalExtension();
    	}

    	$documentos->fecha_vencimiento = $request->get('fecha_vencimiento');
        $documentos->id_user = auth()->user()->id;
    	$documentos->current_auto = auth()->user()->current_auto;

        $documentos->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.vencimiento-tc', compact('documentos'));
        //return view('garaje.view-garaje',compact('automovil'));
    }

            /*|--------------------------------------------------------------------------
        |Create Doc Admin_Admin
        |--------------------------------------------------------------------------*/
        public function create_admin($id)
    {
        /* Trae los datos el auto en el que esta */
        $automovil = DB::table('automovil')
        ->where('id','=',$id)
        ->first();

        $document_auto = $automovil->id;

        $documentos = DB::table('documentos_exp')
        ->where('current_auto','=', $document_auto)
        ->get();

        return view('admin.documents.view-vencimiento-ts-admin',compact('documentos','automovil'));
    }

    public function store_admin(Request $request,$id){

        $validate = $this->validate($request,[
            'fecha_vencimiento' => 'required',
            'img' => 'mimes:jpeg,bpm,jpg,png|max:900',
        ]);

        $documentos = new Documentos;
    	if ($request->hasFile('img')) {
    		$file=$request->file('img');
    		$file->move(public_path().'/exp-tc',time().".".$file->getClientOriginalExtension());
    		$documentos->img=time().".".$file->getClientOriginalExtension();
    	}

    	$documentos->fecha_vencimiento = $request->get('fecha_vencimiento');

    	/* Compara el auto que se selecciono con la db */
        $automovil = DB::table('automovil')
        ->where('id','=',$id)
        ->first();

        $documentos->current_auto = $automovil->id;
        $documentos->id_user = $automovil->id_user;

        $documentos->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->back();
    }
}
