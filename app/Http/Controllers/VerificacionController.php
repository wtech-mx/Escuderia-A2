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
use App\Models\VerificacionSegunda;

class VerificacionController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('pagespeed');
    }
/*|--------------------------------------------------------------------------
|Create Verificacion Admin_Admin
|--------------------------------------------------------------------------*/
    function index(){

        $auto = DB::table('users')
        ->where('current_auto','=',auth()->user()->current_auto)
        ->first();

        $verificacion = Verificacion::where('current_auto','=',$auto->current_auto)
            ->first();

        $verificacion_segunda = VerificacionSegunda::where('id_verificacion','=',$verificacion->id)
            ->get();

        return view('verificacion.view-verificacion',compact('verificacion', 'verificacion_segunda'));
    }
/*|--------------------------------------------------------------------------
|Create Verificacion Admin_Admin
|--------------------------------------------------------------------------*/
    function index_admin(){

        $verificacion_user = Verificacion::orderBy('id','DESC')
            ->where('id_empresa', '=', NULL)
            ->paginate(5);

        $verificacion_empresa = Verificacion::orderBy('id','DESC')
            ->where('id_user', '=', NULL)
            ->get();

          $user = DB::table('users')
            ->where('role','=', '0')
            ->paginate(5);

        return view('admin.verificacion.view-verificacion-admin',compact('verificacion_user','verificacion_empresa', 'user'));
    }

    public function edit_admin($id){

       $verificacion = Verificacion::findOrFail($id);

       $verificacion_segunda = VerificacionSegunda::where('id_verificacion', '=', $id)->first();

       $users = DB::table('users')
        ->get();

        return view('admin.verificacion.create-verificacion-admin',compact('verificacion','verificacion_segunda', 'users'));
    }

    public function update_admin(Request $request,$id)
    {

        $verificacion = Verificacion::findOrFail($id);

        $verificacion->id_user = $request->get('id_user');
        $verificacion->id_empresa = $request->get('id_empresa');
        $verificacion->current_auto = $request->get('current_auto');
        $verificacion->primer_semestre = $request->get('primer_semestre');

        //datos para el calednario
        $verificacion->title = $request->get('title');
        $verificacion->color = $request->get('color');
        $verificacion->image = $request->get('image');
        $verificacion->descripcion = $request->get('descripcion');
        $verificacion->device_token = $request->get('device_token');
        $verificacion->start = $request->get('primer_semestre');
        $verificacion->end = $request->get('primer_semestre');

        $verificacion->estatus = 0;
        $verificacion->estado_last_week = 0;
        $verificacion->estado_tomorrow = 0;
        $verificacion->check = 0;

        $verificacion->update();

        Session::flash('success2', 'Se ha actualizado sus datos con exito');
        return redirect()->back();
    }

    public function update_periodo2(Request $request,$id)
    {

        $verificacion_segunda = VerificacionSegunda::findOrFail($id);

        $verificacion_segunda->title = $request->get('title');
        $verificacion_segunda->color = '#ff0000e8';
        $verificacion_segunda->segundo_semestre = $request->get('segundo_semestre');
        $verificacion_segunda->start = $request->get('segundo_semestre');
        $verificacion_segunda->end = $request->get('segundo_semestre');
        $verificacion_segunda->descripcion = 'Segundo periodo de verificación: '.$verificacion_segunda->start;
        $verificacion_segunda->image = $request->get('image');
        $verificacion_segunda->device_token = $request->get('device_token');
        $verificacion_segunda->estatus = 0;
        $verificacion_segunda->estado_last_week = 0;
        $verificacion_segunda->estado_tomorrow = 0;
        $verificacion_segunda->check = 0;

        $verificacion_segunda->update();

        Session::flash('success2', 'Se ha actualizado sus datos con exito2');
        return redirect()->back();
    }
}
