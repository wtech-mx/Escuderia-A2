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
    }

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

        return view('admin.verificacion.view-verificacion-admin',compact('verificacion_user','verificacion_empresa', 'user'));
    }

    public function edit_admin($id){

       $verificacion = Verificacion::findOrFail($id);

       $verificacion_segunda = VerificacionSegunda::first();

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
        $verificacion->start = $request->get('primer_semestre');
        $verificacion->end = $request->get('primer_semestre');
        $verificacion->estatus = $request->get('estatus');
        $verificacion->check = $request->get('check');


        $verificacion->update();



        Session::flash('success2', 'Se ha actualizado sus datos con exito');
        return redirect()->back();
    }

    public function update_periodo2(Request $request,$id)
    {

        $verificacion_segunda = new VerificacionSegunda;

        $verificacion_segunda->id_verificacion = $id;
        $verificacion_segunda->title = $request->get('title');
        $verificacion_segunda->color = '#FF0000';
        $verificacion_segunda->descripcion = $request->get('descripcion');
        $verificacion_segunda->segundo_semestre = $request->get('segundo_semestre');
        $verificacion_segunda->start = $request->get('segundo_semestre');
        $verificacion_segunda->end = $request->get('segundo_semestre');
        $verificacion_segunda->estatus = 0;
        $verificacion_segunda->check = 0;
        $verificacion_segunda->image = $request->get('image');

        $verificacion_segunda->save();

        Session::flash('success2', 'Se ha actualizado sus datos con exito2');
        return redirect()->back();
    }
}
