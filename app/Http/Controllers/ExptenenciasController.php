<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\ExpTenencias;
use Session;

class ExptenenciasController extends Controller
{
     function index(){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $auto_user = $user->{'id'};

        $exp_tenencias = DB::table('exp_tenencias')
        ->where('id_user','=',$auto_user)
        ->where('current_auto','=',auth()->user()->current_auto)
        ->get();

        return view('exp-fisico.view-tenencia',compact('exp_tenencias'));
    }

    public function create(){

        return view('exp-fisico.view-tenencia');
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'tenencia' => 'mimes:jpeg,bpm,jpg,png|max:900',
        ]);

        $exp_tenencias = new ExpTenencias;

    	if ($request->hasFile('tenencia')) {
    		$file=$request->file('tenencia');
    		$file->move(public_path().'/exp-tenencias',time().".".$file->getClientOriginalExtension());
    		$exp_tenencias->tenencia=time().".".$file->getClientOriginalExtension();
    	}

        $exp_tenencias->id_user = auth()->user()->id;
    	$exp_tenencias->current_auto = auth()->user()->current_auto;

        $exp_tenencias->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-tenencias', compact('exp_tenencias'));
    }
}
