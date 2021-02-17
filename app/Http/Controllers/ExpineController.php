<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\ExpIne;
use Session;


class ExpineController extends Controller
{
     function index(){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $auto_user = $user->{'id'};

        $exp_ine = DB::table('exp_ine')
        ->where('id_user','=',$auto_user)
        ->where('current_auto','=',auth()->user()->current_auto)
        ->get();

        return view('exp-fisico.view-ine',compact('exp_ine'));
    }

    public function create(){

        return view('exp-fisico.view-ine');
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'ine' => 'mimes:jpeg,bpm,jpg,png|max:900',
        ]);

        $exp_ine = new ExpIne;

    	if ($request->hasFile('ine')) {
    		$file=$request->file('ine');
    		$file->move(public_path().'/exp-ine',time().".".$file->getClientOriginalExtension());
    		$exp_ine->ine=time().".".$file->getClientOriginalExtension();
    	}

        $exp_ine->id_user = auth()->user()->id;
    	$exp_ine->current_auto = auth()->user()->current_auto;

        $exp_ine->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-ine', compact('exp_ine'));
    }
}
