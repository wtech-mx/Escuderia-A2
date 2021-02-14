<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\DocumentosLugarExp;

class DocumentosLugarExpController extends Controller
{
     function index(){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $auto_user = $user->{'id'};

        $documentos = DB::table('documentos_lugarexp')
        ->where('id_user','=',$auto_user)
        ->where('current_auto','=',auth()->user()->current_auto)
        ->get();

        return view('documents.view-lugar-ts',compact('documentos'));
    }

    public function create(){

        return view('documents.create.lugar-tc');
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'lugar_expedicion' => 'mimes:jpeg,bpm,jpg,png|max:900',
        ]);

        $documentos = new DocumentosLugarExp;

    	if ($request->hasFile('lugar_expedicion')) {
    		$file=$request->file('lugar_expedicion');
    		// dd($file);
    		$file->move(public_path().'/lugarexp-tc',time().".".$file->getClientOriginalExtension());
    		$documentos->lugar_expedicion=time().".".$file->getClientOriginalExtension();
    	}

        $documentos->id_user = auth()->user()->id;
    	$documentos->current_auto = auth()->user()->current_auto;

        $documentos->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.lugar-tc', compact('documentos'));
        //return view('garaje.view-garaje',compact('automovil'));
    }
}
