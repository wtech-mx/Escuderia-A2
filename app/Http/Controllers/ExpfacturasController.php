<?php

namespace App\Http\Controllers;

use App\Models\Automovil;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\ExpFactura;
use Session;
use Carbon\Carbon;
use App\Models\Alertas;
use App\Models\Seguros;
use App\Models\TarjetaCirculacion;

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
         $user = DB::table('users')
            ->where('role','=', '0')
            ->get();

        return view('exp-fisico.view-factura',compact('user'));
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

        /*|--------------------------------------------------------------------------
        |Create Doc Admin_Admin
        |--------------------------------------------------------------------------*/
     function index_admin(){
         /* Trae Autos de Usuarios */

        $automovil = Automovil::where('id_empresa', '=', NULL)->get();

        $automovil2 = Automovil::where('id_user', '=', NULL)->get();
         $user = DB::table('users')
            ->where('role','=', '0')
            ->get();

        return view('admin.exp-fisico.view-exp-fisico-admin',compact('automovil','automovil2'));
    }

        public function create_admin($id)
    {
        /* Trae los datos el auto en el que esta */
        $automovil = DB::table('automovil')
        ->where('id','=',$id)
        ->first();

        $exp_auto = $automovil->id;

        $exp_factura = DB::table('exp_facturas')
        ->where('current_auto','=', $exp_auto)
        ->get();

         $user = DB::table('users')
            ->where('role','=', '0')
            ->get();

        return view('admin.exp-fisico.view-factura-admin',compact('exp_factura','automovil', 'user'));
    }

    public function store_admin(Request $request,$id){

        $validate = $this->validate($request,[
            'factura' => 'mimes:jpeg,bpm,jpg,png|max:900',
        ]);

        $exp = new ExpFactura;
    	if ($request->hasFile('factura')) {
    		$file=$request->file('factura');
    		$file->move(public_path().'/exp-factura',time().".".$file->getClientOriginalExtension());
    		$exp->factura=time().".".$file->getClientOriginalExtension();
    	}

//    	$exp->fecha_expedicion = $request->get('fecha_expedicion');

    	/* Compara el auto que se selecciono con la db */
        $automovil = DB::table('automovil')
        ->where('id','=',$id)
        ->first();

        $exp->current_auto = $automovil->id;

        $exp->id_user = $automovil->id_user;

        $exp->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->back();
    }


}
