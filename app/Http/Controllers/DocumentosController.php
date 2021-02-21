<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        $user = User::where('role', '=', '0')->get();

        return view('admin.documents.view-documents-admin',compact('user'));
    }

        public function create_admin()
    {

        $users = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $auto_user = $users->{'id'};

        $documentos = DB::table('documentos_exp')
        ->where('id_user','=',$auto_user)
        ->where('current_auto','=',auth()->user()->current_auto)
        ->get();

        return view('admin.documents.view-exp-ts-admin',compact('documentos','users'));
    }

    public function store_admin(Request $request){

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

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('admin.documents.view-exp-ts-admin', compact('documentos'));
    }

}
