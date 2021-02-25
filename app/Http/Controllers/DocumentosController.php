<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Automovil;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Documentos;

class DocumentosController extends Controller
{
     function index(){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $auto_user = $user->{'id'};

        $documentos = DB::table('documentos_exp')
        ->where('id_user','=',$auto_user)
        ->where('current_auto','=',auth()->user()->current_auto)
        ->get();

        return view('documents.view-exp-ts',compact('documentos'));
    }

    public function create(){

        return view('documents.create.exp-tc');

    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'fecha_expedicion' => 'required',
            'img' => 'mimes:jpeg,bpm,jpg,png|max:900',
        ]);

        $documentos = new Documentos;

    	if ($request->hasFile('img')) {
    		$file=$request->file('img');
    		// dd($file);
    		$file->move(public_path().'/exp-tc',time().".".$file->getClientOriginalExtension());
    		$documentos->img=time().".".$file->getClientOriginalExtension();
    	}

    	$documentos->fecha_expedicion = $request->get('fecha_expedicion');
        $documentos->id_user = auth()->user()->id;
    	$documentos->current_auto = auth()->user()->current_auto;

        $documentos->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-doc-tc', compact('documentos'));
    }

        /*|--------------------------------------------------------------------------
        |Create Doc Admin_Admin
        |--------------------------------------------------------------------------*/
     function index_admin(){
         /* Trae Autos de Usuarios */
        $automovil = Automovil::where('id_empresa', '=', NULL)->get();

        $automovil2 = Automovil::where('id_user', '=', NULL)->get();

        return view('admin.documents.view-documents-admin',compact('automovil','automovil2'));
    }

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

        return view('admin.documents.view-exp-ts-admin',compact('documentos','automovil'));
    }

    public function store_admin(Request $request,$id){

        $validate = $this->validate($request,[
            'fecha_expedicion' => 'required',
            'img' => 'required|mimes:jpeg,bpm,jpg,png|max:900',
        ]);

        $documentos = new Documentos;
    	if ($request->hasFile('img')) {
    		$file=$request->file('img');
    		$file->move(public_path().'/exp-tc',time().".".$file->getClientOriginalExtension());
    		$documentos->img=time().".".$file->getClientOriginalExtension();
    	}

    	$documentos->fecha_expedicion = $request->get('fecha_expedicion');

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
