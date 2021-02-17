<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\ExpPoliza;
use Session;

class ExpolizaController extends Controller
{
      function index(){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $auto_user = $user->{'id'};

        $exp_poliza = DB::table('exp_poliza')
        ->where('id_user','=',$auto_user)
        ->where('current_auto','=',auth()->user()->current_auto)
        ->get();

        return view('exp-fisico.view-poliza',compact('exp_poliza'));
    }

    public function create(){

        return view('exp-fisico.view-poliza');
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'poliza' => 'mimes:jpeg,bpm,jpg,png|max:900',
        ]);

        $exp_poliza = new ExpPoliza;

    	if ($request->hasFile('poliza')) {
    		$file=$request->file('poliza');
    		$file->move(public_path().'/exp-poliza',time().".".$file->getClientOriginalExtension());
    		$exp_poliza->poliza=time().".".$file->getClientOriginalExtension();
    	}

        $exp_poliza->id_user = auth()->user()->id;
    	$exp_poliza->current_auto = auth()->user()->current_auto;

        $exp_poliza->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-poliza', compact('exp_poliza'));
    }
}
