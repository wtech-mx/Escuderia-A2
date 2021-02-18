<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\ExpRfc;
use Session;

class ExprfcController extends Controller
{
     function index(){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $auto_user = $user->{'id'};

        $exp_rfc = DB::table('exp_rfc')
        ->where('id_user','=',$auto_user)
        ->where('current_auto','=',auth()->user()->current_auto)
        ->get();

        return view('exp-fisico.view-rfc',compact('exp_rfc'));
    }

    public function create(){

        return view('exp-fisico.view-rfc');
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'rfc' => 'mimes:jpeg,bpm,jpg,png|max:900',
        ]);

        $exp_rfc = new ExpRfc;

    	if ($request->hasFile('rfc')) {
    		$file=$request->file('rfc');
    		$file->move(public_path().'/exp-rfc',time().".".$file->getClientOriginalExtension());
    		$exp_rfc->rfc=time().".".$file->getClientOriginalExtension();
    	}

        $exp_rfc->id_user = auth()->user()->id;
    	$exp_rfc->current_auto = auth()->user()->current_auto;

        $exp_rfc->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-rfc', compact('exp_rfc'));
    }
}