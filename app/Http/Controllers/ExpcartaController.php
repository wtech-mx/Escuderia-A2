<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\ExpCarta;
use Session;

class ExpcartaController extends Controller
{
     function index(){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $auto_user = $user->{'id'};

        $exp_carta = DB::table('exp_carta')
        ->where('id_user','=',$auto_user)
        ->where('current_auto','=',auth()->user()->current_auto)
        ->get();

        return view('exp-fisico.view-cr',compact('exp_carta'));
    }

    public function create(){

        return view('exp-fisico.view-cr');
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'carta' => 'mimes:jpeg,bpm,jpg,png|max:900',
        ]);

        $exp_carta = new ExpCarta;

    	if ($request->hasFile('carta')) {
    		$file=$request->file('carta');
    		// dd($file);
    		$file->move(public_path().'/exp-carta',time().".".$file->getClientOriginalExtension());
    		$exp_carta->carta=time().".".$file->getClientOriginalExtension();
    	}

        $exp_carta->id_user = auth()->user()->id;
    	$exp_carta->current_auto = auth()->user()->current_auto;

        $exp_carta->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-cr', compact('exp_carta'));
        //return view('garaje.view-garaje',compact('automovil'));
    }
}
