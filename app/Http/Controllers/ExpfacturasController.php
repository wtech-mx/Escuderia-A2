<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\ExpFactura;
use Session;

class ExpfacturasController extends Controller
{
     function index(){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $auto_user = $user->{'id'};

        $exp_factura = DB::table('exp_facturas')
        ->where('id_user','=',$auto_user)
        ->where('current_auto','=',auth()->user()->current_auto)
        ->get();

        return view('exp-fisico.view-factura',compact('exp_factura'));
    }

    public function create(){

        return view('exp-fisico.view-factura');
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'factura' => 'mimes:jpeg,bpm,jpg,png|max:900',
        ]);

        $exp_factura = new ExpFactura;

    	if ($request->hasFile('factura')) {
    		$file=$request->file('factura');
    		$file->move(public_path().'/exp-factura',time().".".$file->getClientOriginalExtension());
    		$exp_factura->factura=time().".".$file->getClientOriginalExtension();
    	}

        $exp_factura->id_user = auth()->user()->id;
    	$exp_factura->current_auto = auth()->user()->current_auto;
//dd($exp_factura);
        $exp_factura->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-factura', compact('exp_factura'));
    }
}
