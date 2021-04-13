<?php

namespace App\Http\Controllers;

use DB;
use Session;
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

class ExpController extends Controller
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

        $automovil = DB::table('automovil')
        ->where('id_user','=',$auto_user)
        ->get();

        $carro = DB::table('automovil')
        ->where('id','=',auth()->user()->current_auto)
        ->get();

        $users = DB::table('users')
        ->get();

        $factura = ExpFactura::where('current_auto','=',auth()->user()->current_auto)->get()->count();

        $tenencias = ExpTenencias::where('current_auto','=',auth()->user()->current_auto)->get()->count();

        $carta = ExpCarta::where('current_auto','=',auth()->user()->current_auto)->get()->count();

        $poliza = ExpPoliza::where('current_auto','=',auth()->user()->current_auto)->get()->count();

        $tc = ExpTc::where('current_auto','=',auth()->user()->current_auto)->get()->count();

        $reemplacamiento = ExpReemplacamiento::where('current_auto','=',auth()->user()->current_auto)->get()->count();

        $placas = ExpPlacas::where('current_auto','=',auth()->user()->current_auto)->get()->count();

        $ine = ExpIne::where('current_auto','=',auth()->user()->current_auto)->get()->count();

        $comprobante = ExpDomicilio::where('current_auto','=',auth()->user()->current_auto)->get()->count();

        $certificado = ExpCertificado::where('current_auto','=',auth()->user()->current_auto)->get()->count();

        $rfc = ExpRfc::where('current_auto','=',auth()->user()->current_auto)->get()->count();

        return view('exp-fisico.view-exp-fisico',compact('carro', 'automovil', 'users', 'factura',
                          'tenencias', 'carta', 'poliza', 'tc', 'reemplacamiento', 'placas', 'ine', 'comprobante', 'certificado', 'rfc'));
    }


}
