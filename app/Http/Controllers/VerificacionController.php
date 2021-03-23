<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seguros;
use DB;
use Session;
use Carbon\Carbon;
use App\Models\Alertas;
use App\Models\Verificacion;
use App\Models\TarjetaCirculacion;

class VerificacionController extends Controller
{
/*|--------------------------------------------------------------------------
|Create Verificacion Admin_Admin
|--------------------------------------------------------------------------*/
    function index_admin(){

        $verificacion_user = Verificacion::orderBy('id','DESC')
            ->where('id_empresa', '=', NULL)
            ->get();

        $verificacion_empresa = Verificacion::orderBy('id','DESC')
            ->where('id_user', '=', NULL)
            ->get();

          $user = DB::table('users')
            ->where('role','=', '0')
            ->get();

           // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();
          $alert2 = Alertas::where('id_user', '=', auth()->user()->id)
            ->where('start','<=', $current)
            ->where('estatus', '=', 0)
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

        return view('admin.verificacion.view-verificacion-admin',compact('verificacion_user','verificacion_empresa', 'user', 'alert2', 'seguro_alerta','tc_alerta'));
    }

    public function edit_admin($id){

       $verificacion = Verificacion::findOrFail($id);

       $users = DB::table('users')
        ->get();
        // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();
          $alert2 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('start','<=', $current)
              ->where('estatus', '=', 0)
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

        return view('admin.verificacion.create-verificacion-admin',compact('verificacion', 'users', 'alert2', 'seguro_alerta','tc_alerta'));
    }

    public function update_admin(Request $request,$id)
    {

        $verificacion = Verificacion::findOrFail($id);

        $verificacion->id_user = $request->get('id_user');
        $verificacion->id_empresa = $request->get('id_empresa');
        $verificacion->current_auto = $request->get('current_auto');
        $verificacion->primer_semestre = $request->get('primer_semestre');
        $verificacion->segundo_semestre = $request->get('segundo_semestre');

        //datos para el calednario
        $verificacion->title = $request->get('title');
        $verificacion->color = $request->get('color');
        $verificacion->descripcion = $request->get('descripcion');
        $verificacion->start = $request->get('primer_semestre');
        $verificacion->end = $request->get('primer_semestre');
        $verificacion->estatus = $request->get('estatus');
        $verificacion->check = $request->get('check');

        $verificacion->update();

        Session::flash('success2', 'Se ha actualizado sus datos con exito');
        return redirect()->back();
    }
}
