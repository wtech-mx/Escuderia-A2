<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\DocumentosOtro;

class DocumentosOtroController extends Controller
{
     function index(){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $auto_user = $user->{'id'};

        $documentos = DB::table('documentos_otro')
        ->where('id_user','=',$auto_user)
        ->where('current_auto','=',auth()->user()->current_auto)
        ->get();

        return view('documents.view-otro-ts',compact('documentos'));
    }

    public function create(){

        return view('documents.create.otro-tc');
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'otro' => 'required',
            'img' => 'mimes:jpeg,bpm,jpg,png|max:900',
        ]);

        $documentos = new DocumentosOtro;

    	if ($request->hasFile('img')) {
    		$file=$request->file('img');
    		// dd($file);
    		$file->move(public_path().'/otro-tc',time().".".$file->getClientOriginalExtension());
    		$documentos->img=time().".".$file->getClientOriginalExtension();
    	}

    	$documentos->otro = $request->get('otro');
        $documentos->id_user = auth()->user()->id;
    	$documentos->current_auto = auth()->user()->current_auto;

        $documentos->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.otro-tc', compact('documentos'));
        //return view('garaje.view-garaje',compact('automovil'));
    }

    public function create_admin($id)
    {
        /* Trae los datos el auto en el que esta */
        $automovil = DB::table('automovil')
        ->where('id','=',$id)
        ->first();

        $document_auto = $automovil->id;

        $documentos = DB::table('documentos_otro')
        ->where('current_auto','=', $document_auto)
        ->get();

        return view('admin.documents.view-otro-ts-admin',compact('documentos','automovil'));
    }

    public function store_admin(Request $request,$id){

        $validate = $this->validate($request,[
            'otro' => 'required',
            'img' => 'mimes:jpeg,bpm,jpg,png|max:900',
        ]);

        $documentos = new Documentos;
    	if ($request->hasFile('img')) {
    		$file=$request->file('img');
    		$file->move(public_path().'/otro-tc',time().".".$file->getClientOriginalExtension());
    		$documentos->img=time().".".$file->getClientOriginalExtension();
    	}

    	$documentos->otro = $request->get('otro');

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
