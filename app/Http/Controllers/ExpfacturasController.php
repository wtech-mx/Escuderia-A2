<?php

namespace App\Http\Controllers;

use App\Models\Automovil;
use Illuminate\Http\Request;
use DB;
use App\Models\ExpFactura;
use App\Models\ExpCarta;
use App\Models\ExpDomicilio;
use App\Models\ExpIne;
use App\Models\ExpPlacas;
use App\Models\ExpPoliza;
use App\Models\ExpReemplacamiento;
use App\Models\ExpRfc;
use App\Models\ExpTc;
use App\Models\ExpTenencias;
use App\Models\ExpCertificado;
use Illuminate\Support\Facades\Storage;

use Session;
use Image;
use Illuminate\Support\Str;

class ExpfacturasController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('pagespeed');
    }

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
            'factura' => 'mimes:jpeg,bpm,jpg,png,pdf|max:900',
        ]);

        $exp_factura = new ExpFactura;

        $exp_factura->titulo = $request->get('titulo');
    	if ($request->hasFile('factura')) {
                $urlfoto = $request->file('factura');
                $nombre = time().".".$urlfoto->guessExtension();
                $ruta = public_path('/exp-factura/'.$nombre);
                $compresion = Image::make($urlfoto->getRealPath())
                    ->save($ruta,10);
   	}
         $exp_factura->factura = $compresion->basename;

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
     function index_admin(Request $request){
         /* Trae Autos de Usuarios */
//        $name = $request->get('name');

        $automovil = Automovil::where('id_empresa', '=', NULL)->get();

        $automovil2 = Automovil::where('id_user', '=', NULL)->get();

        $factura = ExpFactura::get()->count();
        $factura2 = ExpFactura::get();

        $tenencias = ExpTenencias::get()->count();
        $tenencias2 = ExpTenencias::get();

        $carta = ExpCarta::get()->count();
        $carta2 = ExpCarta::get();

        $poliza = ExpPoliza::get()->count();
        $poliza2 = ExpPoliza::get();

        $tc = ExpTc::get()->count();
        $tc2 = ExpTc::get();

        $reemplacamiento = ExpReemplacamiento::get()->count();
        $reemplacamiento2 = ExpReemplacamiento::get();

        $placas = ExpPlacas::get()->count();
        $placas2 = ExpPlacas::get();

        $ine = ExpIne::get()->count();
        $ine2 = ExpIne::get();

        $comprobante = ExpDomicilio::get()->count();
        $comprobante2 = ExpDomicilio::get();

        $certificado = ExpCertificado::get()->count();
        $certificado2 = ExpCertificado::get();

        $rfc = ExpRfc::get()->count();
        $rfc2 = ExpRfc::get();

        return view('admin.exp-fisico.view-exp-fisico-admin',compact('automovil','automovil2', 'factura', 'factura2',
                          'tenencias', 'tenencias2', 'carta', 'carta2', 'poliza', 'poliza2', 'tc', 'tc2', 'reemplacamiento', 'reemplacamiento2',
                          'placas', 'placas2', 'ine', 'ine2', 'comprobante', 'comprobante2', 'certificado', 'certificado2', 'rfc', 'rfc2'));
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

        $exp = new ExpFactura;
        $exp->titulo = $request->get('titulo');

    	if ($request->hasFile('factura')) {

                $urlfoto = $request->file('factura');
                $nombre = time().".".$urlfoto->guessExtension();
                $ruta = public_path('/exp-factura/'.$nombre);
                $compresion = Image::make($urlfoto->getRealPath())
                    ->save($ruta,10);

   	}
         $exp->factura = $compresion->basename;
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
