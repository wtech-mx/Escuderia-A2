<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\ExpReemplacamiento;
use Session;

class ExpreemplacaminetoController extends Controller
{
     function index(){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $auto_user = $user->{'id'};

        $exp_reemplacamiento = DB::table('exp_reemplacamiento')
        ->where('id_user','=',$auto_user)
        ->where('current_auto','=',auth()->user()->current_auto)
        ->get();

        return view('exp-fisico.view-reemplacamiento',compact('exp_reemplacamiento'));
    }

    public function create(){

        return view('exp-fisico.view-reemplacamiento');
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'reemplacamiento' => 'mimes:jpeg,bpm,jpg,png|max:900',
        ]);

        $exp_reemplacamiento = new ExpReemplacamiento;

    	if ($request->hasFile('reemplacamiento')) {
    		$file=$request->file('reemplacamiento');
    		$file->move(public_path().'/exp-reemplacamiento',time().".".$file->getClientOriginalExtension());
    		$exp_reemplacamiento->reemplacamiento=time().".".$file->getClientOriginalExtension();
    	}

        $exp_reemplacamiento->id_user = auth()->user()->id;
    	$exp_reemplacamiento->current_auto = auth()->user()->current_auto;

        $exp_reemplacamiento->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-reemplacamiento', compact('exp_reemplacamiento'));
    }
}