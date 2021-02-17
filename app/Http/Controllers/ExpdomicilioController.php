<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\ExpDomicilio;
use Session;

class ExpdomicilioController extends Controller
{
     function index(){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $auto_user = $user->{'id'};

        $exp_domicilio = DB::table('exp_domicilio')
        ->where('id_user','=',$auto_user)
        ->where('current_auto','=',auth()->user()->current_auto)
        ->get();

        return view('exp-fisico.view-cd',compact('exp_domicilio'));
    }

    public function create(){

        return view('exp-fisico.view-cd');
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'domicilio' => 'mimes:jpeg,bpm,jpg,png|max:900',
        ]);

        $exp_domicilio = new ExpDomicilio;

    	if ($request->hasFile('domicilio')) {
    		$file=$request->file('domicilio');
    		$file->move(public_path().'/exp-domicilio',time().".".$file->getClientOriginalExtension());
    		$exp_domicilio->domicilio=time().".".$file->getClientOriginalExtension();
    	}

        $exp_domicilio->id_user = auth()->user()->id;
    	$exp_domicilio->current_auto = auth()->user()->current_auto;
//dd($exp_domicilio);
        $exp_domicilio->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-cd', compact('exp_domicilio'));
    }
}
