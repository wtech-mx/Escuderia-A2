<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\ExpPlacas;
use Session;

class ExplacasController extends Controller
{
      function index(){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $auto_user = $user->{'id'};

        $exp_placas = DB::table('exp_placas')
        ->where('id_user','=',$auto_user)
        ->where('current_auto','=',auth()->user()->current_auto)
        ->get();

        return view('exp-fisico.view-bp',compact('exp_placas'));
    }

    public function create(){

        return view('exp-fisico.view-bp');
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'placa' => 'mimes:jpeg,bpm,jpg,png|max:900',
        ]);

        $exp_placas = new ExpPlacas;

    	if ($request->hasFile('placa')) {
    		$file=$request->file('placa');
    		$file->move(public_path().'/exp-bp',time().".".$file->getClientOriginalExtension());
    		$exp_placas->placa=time().".".$file->getClientOriginalExtension();
    	}

        $exp_placas->id_user = auth()->user()->id;
    	$exp_placas->current_auto = auth()->user()->current_auto;

        $exp_placas->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-bp', compact('exp_placas'));
    }
}
