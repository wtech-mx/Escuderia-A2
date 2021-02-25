<?php

namespace App\Http\Controllers;

use App\Models\Seguros;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;


class SegurosController extends Controller
{
/*|--------------------------------------------------------------------------
|Create Seguro Usuario
|--------------------------------------------------------------------------*/
    public function index(){

        $auto = DB::table('users')
        ->where('current_auto','=',auth()->user()->current_auto)
        ->first();

        $seguro = DB::table('seguros')
        ->where('current_auto','=',$auto->current_auto)
        ->first();

          switch($seguro){
            case( $seguro->seguro == 'aba' ):
                $img = 'aba.png';
            break;
            case( $seguro->seguro == 'afirme' ):
                $img = 'afirme.png';
            break;
            case( $seguro->seguro == 'aig' ):
                $img = 'aig.png';
            break;
            case( $seguro->seguro == 'ana' ):
                $img = 'ana.png';
            break;
            case( $seguro->seguro == 'atlas' ):
                $img = 'atlas.png';
            break;
            case( $seguro->seguro == 'axa' ):
                $img = 'axa.png';
            break;
            case( $seguro->seguro == 'banorte' ):
                $img = 'banorte.png';
            break;
            case( $seguro->seguro == 'general' ):
                $img = 'general.png';
            break;
            case( $seguro->seguro == 'sura' ):
                $img = 'sura.png';
            break;
            case( $seguro->seguro == 'vexmas' ):
                $img = 'vexmas.png';
            break;
            case( $seguro->seguro == 'gnp' ):
               $img = 'gnp.png';
            break;
            case( $seguro->seguro == 'hdi' ):
                $img = 'hdi.png';
            break;
            case( $seguro->seguro == 'inbursa' ):
                $img = 'inbursa.png';
            break;
            case( $seguro->seguro == 'latino' ):
                $img = 'latino.png';
            break;
            case( $seguro->seguro == 'mapfre' ):
                $img = 'mapfre.png';
            break;
            case( $seguro->seguro == 'qualitas' ):
                $img = 'qualitas.png';
            break;
            case( $seguro->seguro == 'potosi' ):
                $img = 'potosi.png';
            break;
            case( $seguro->seguro == 'miituo' ):
                $img = 'miituo.png';
            break;
            case( $seguro->seguro == 'zurich' ):
                $img = 'zurich.png';
            break;
        }

        return view('seguros.seguros',compact('seguro', 'img'));
    }

    public function update(Request $request,$id){

        $seguro = Seguros::findOrFail($id);

        $seguro->seguro = $request->get('seguro');
        $seguro->fecha_expedicion = $request->get('fecha_expedicion');
        $seguro->fecha_vencimiento = $request->get('fecha_vencimiento');
        $seguro->tipo_cobertura = $request->get('tipo_cobertura');
        $seguro->costo = $request->get('costo');
        $seguro->costo_anual = $request->get('costo_anual');

        $seguro->update();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->route('index.seguro', compact('seguro'));

    }

/*|--------------------------------------------------------------------------
|Create Seguro Admin_Admin
|--------------------------------------------------------------------------*/
     function index_admin(){

        $seguros = Seguros::where('id_empresa', '=', NULL)->get();

        $seguros2 = Seguros::where('id_user', '=', NULL)->get();

        return view('admin.seguros.view-seguros-admin',compact('seguros','seguros2'));
    }

    public function edit_admin($id){

       $seguro = Seguros::findOrFail($id);

        switch($seguro){
            case( $seguro->seguro == 'aba' ):
                $img = 'aba.png';
            break;
            case( $seguro->seguro == 'afirme' ):
                $img = 'afirme.png';
            break;
            case( $seguro->seguro == 'aig' ):
                $img = 'aig.png';
            break;
            case( $seguro->seguro == 'ana' ):
                $img = 'ana.png';
            break;
            case( $seguro->seguro == 'atlas' ):
                $img = 'atlas.png';
            break;
            case( $seguro->seguro == 'axa' ):
                $img = 'axa.png';
            break;
            case( $seguro->seguro == 'banorte' ):
                $img = 'banorte.png';
            break;
            case( $seguro->seguro == 'general' ):
                $img = 'general.png';
            break;
            case( $seguro->seguro == 'sura' ):
                $img = 'sura.png';
            break;
            case( $seguro->seguro == 'vexmas' ):
                $img = 'vexmas.png';
            break;
            case( $seguro->seguro == 'gnp' ):
               $img = 'gnp.png';
            break;
            case( $seguro->seguro == 'hdi' ):
                $img = 'hdi.png';
            break;
            case( $seguro->seguro == 'inbursa' ):
                $img = 'inbursa.png';
            break;
            case( $seguro->seguro == 'latino' ):
                $img = 'latino.png';
            break;
            case( $seguro->seguro == 'mapfre' ):
                $img = 'mapfre.png';
            break;
            case( $seguro->seguro == 'qualitas' ):
                $img = 'qualitas.png';
            break;
            case( $seguro->seguro == 'potosi' ):
                $img = 'potosi.png';
            break;
            case( $seguro->seguro == 'miituo' ):
                $img = 'miituo.png';
            break;
            case( $seguro->seguro == 'zurich' ):
                $img = 'zurich.png';
            break;
        }

        return view('admin.seguros.create-seguros-admin',compact('seguro','img'));
    }

    public function update_admin(Request $request,$id)
    {

        $seguro = Seguros::findOrFail($id);

        $seguro->seguro = $request->get('seguro');
        $seguro->fecha_expedicion = $request->get('fecha_expedicion');
        $seguro->fecha_vencimiento = $request->get('fecha_vencimiento');
        $seguro->tipo_cobertura = $request->get('tipo_cobertura');
        $seguro->costo = $request->get('costo');
        $seguro->costo_anual = $request->get('costo_anual');

        $seguro->update();

        Session::flash('success2', 'Se ha actualizado sus datos con exito');
        return redirect()->back();
    }
}
