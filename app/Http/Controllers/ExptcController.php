<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\ExpTc;
use Session;

class ExptcController extends Controller
{
     function index(){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $auto_user = $user->{'id'};

        $exp_tc = DB::table('exp_tc')
        ->where('id_user','=',$auto_user)
        ->where('current_auto','=',auth()->user()->current_auto)
        ->get();

        return view('exp-fisico.view-tc',compact('exp_tc'));
    }

    public function create(){

        return view('exp-fisico.view-tc');
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'tc' => 'mimes:jpeg,bpm,jpg,png|max:900',
        ]);

        $exp_tc = new ExpTc;

    	if ($request->hasFile('tc')) {
    		$file=$request->file('tc');
    		$file->move(public_path().'/exp-tc',time().".".$file->getClientOriginalExtension());
    		$exp_tc->tc=time().".".$file->getClientOriginalExtension();
    	}

        $exp_tc->id_user = auth()->user()->id;
    	$exp_tc->current_auto = auth()->user()->current_auto;

        $exp_tc->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-tc', compact('exp_tc'));
    }
}
