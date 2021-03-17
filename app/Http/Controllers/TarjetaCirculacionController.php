<?php

namespace App\Http\Controllers;

use App\Models\TarjetaCirculacion;
use App\Models\User;
use App\Models\ImgTc;
use Illuminate\Http\Request;
use Session;
use DB;
use Carbon\Carbon;
use App\Models\Alertas;
use App\Models\Seguros;
class TarjetaCirculacionController extends Controller
{
/*|--------------------------------------------------------------------------
|Create TarjetaCirculacion Usuario
|--------------------------------------------------------------------------*/
    public function index(){

        $auto = DB::table('users')
        ->where('current_auto','=',auth()->user()->current_auto)
        ->first();

        $tarjeta_circulacion = TarjetaCirculacion::where('current_auto','=',$auto->current_auto)->first();

                        $users = DB::table('users')
        ->get();
                          // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();
          $alert2 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('start','<=', $current)
              ->where('status', '=', 0)
            ->get();

         //Trae la alerta Seguro
          $seguro_alerta = Seguros::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('end','<=', $current)
            ->get();
          //Trae la alerta Tc
          $tc_alerta = TarjetaCirculacion::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('end','<=', $current)
            ->get();

        return view('tarjeta-circulacion.tarjeta_circulacion',compact('tarjeta_circulacion', 'users', 'alert2','seguro_alerta','tc_alerta'));
    }

    public function update(Request $request,$id){

        $tarjeta_circulacion = TarjetaCirculacion::findOrFail($id);

        $tarjeta_circulacion->nombre = $request->get('nombre');
        $tarjeta_circulacion->tipo_placa = $request->get('tipo_placa');
        $tarjeta_circulacion->lugar_expedicion = $request->get('lugar_expedicion');

        $tarjeta_circulacion->fecha_emision = $request->get('fecha_emision');
        $tarjeta_circulacion->start = $request->get('end');
        $tarjeta_circulacion->end = $request->get('end');

        $tarjeta_circulacion->num_placa = $request->get('num_placa');
        $tarjeta_circulacion->current_auto = auth()->user()->current_auto;

        //datos para el calednario
        $tarjeta_circulacion->title = $request->get('title');
        $tarjeta_circulacion->color = $request->get('color');
        $tarjeta_circulacion->descripcion = $request->get('descripcion');

        $tarjeta_circulacion->update();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->route('index.tc', compact('tarjeta_circulacion'));

    }

/*|--------------------------------------------------------------------------
|Create TarjetaCirculacion Admin
|--------------------------------------------------------------------------*/
    public function indextc_admin(Request $request){

        $nombre = $request->get('nombre');

        $tarjeta_circulacion = TarjetaCirculacion::orderBy('id','DESC')
            ->nombre($nombre)
            ->where('id_empresa','=', NULL)
            ->get();

        $tarjeta_circulacion2 = TarjetaCirculacion::orderBy('id','DESC')
            ->where('id_user','=', NULL)
            ->get();

        $user = DB::table('users')
        ->get();

        // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();
          $alert2 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('start','<=', $current)
              ->where('status', '=', 0)
            ->get();
         //Trae la alerta Seguro
          $seguro_alerta = Seguros::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('end','<=', $current)
            ->get();
          //Trae la alerta Tc
          $tc_alerta = TarjetaCirculacion::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('end','<=', $current)
            ->get();

        return view('admin.tarjeta-circulacion.view-tc-admin',compact('tarjeta_circulacion', 'user', 'alert2', 'tarjeta_circulacion2','seguro_alerta','tc_alerta'));
    }

    public function  edit_admin($id){

        $tarjeta_circulacion = TarjetaCirculacion::findOrFail($id);
                        $users = DB::table('users')
        ->get();
                          // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();
          $alert2 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('start','<=', $current)
              ->where('status', '=', 0)
            ->get();
         //Trae la alerta Seguro
          $seguro_alerta = Seguros::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('end','<=', $current)
            ->get();
          //Trae la alerta Tc
          $tc_alerta = TarjetaCirculacion::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('end','<=', $current)
            ->get();

        return view('admin.tarjeta-circulacion.tarjeta_circulacion',compact('tarjeta_circulacion', 'users', 'alert2','seguro_alerta','tc_alerta'));
    }

    function update_admin(Request $request, $id){

        $validate = $this->validate($request, [
            'nombre' => 'required|max:191',
            'tipo_placa' => 'required|max:191',
            'lugar_expedicion' => 'required|max:191',
        ]);

        $tarjeta_circulacion = TarjetaCirculacion::findOrFail($id);
        $tarjeta_circulacion->nombre = $request->get('nombre');
        $tarjeta_circulacion->tipo_placa = $request->get('tipo_placa');
        $tarjeta_circulacion->lugar_expedicion = $request->get('lugar_expedicion');

        $tarjeta_circulacion->fecha_emision = $request->get('fecha_emision');
        $tarjeta_circulacion->start = $request->get('end');
        $tarjeta_circulacion->end = $request->get('end');

        $tarjeta_circulacion->num_placa = $request->get('num_placa');
        $tarjeta_circulacion->current_auto = auth()->user()->current_auto;

        //datos para el calednario
        $tarjeta_circulacion->title = $request->get('title');
        $tarjeta_circulacion->color = $request->get('color');
        $tarjeta_circulacion->descripcion = $request->get('descripcion');

        $tarjeta_circulacion->update();


        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('indextc_admin.tarjeta-circulacion', compact('tarjeta_circulacion'));
    }
}
