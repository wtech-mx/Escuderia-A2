<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use DB;
use Session;
use Carbon\Carbon;
use App\Models\Alertas;
use App\Models\Seguros;
use App\Models\TarjetaCirculacion;

use \App\Mail\MyTestMail;


class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

   public function index()
    {

        $users = User::where('id','=',auth()->user()->id)
        ->first();

        $user = DB::table('users')
            ->where('role','=', 0)
            ->get();


        // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();
          $alert2 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('start','<=', $current)
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

        //Trae la alerta Verificacion
          $verificacion= TarjetaCirculacion::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('end','<=', $current)
            ->get();

          if($users->role == 0){
              return view('dashboard',compact('users', 'user', 'alert2', 'seguro_alerta','tc_alerta', 'verificacion'));
          }else{
              return view('admin.dashboard',compact('users', 'user', 'alert2', 'seguro_alerta','tc_alerta', 'verificacion'));
          }
    }

       public function alerts()
    {
        //Traer nombre y foto
        $users = User::where('id','=',auth()->user()->id)
        ->first();

        // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();

        //Trae la alerta
          $alert2 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('start','<=', $current)
            ->get();
        //Trae la alerta al controlador
          $alert3 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('start','<=', $current)
            ->where('estatus', '=', 0)
            ->first();

        //Trae la alerta Seguro
          $seguro_alerta = Seguros::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('end','<=', $current)
            ->get();
        //Trae la alerta Seguro Controlador
          $seguro_alerta2 = Seguros::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('end','<=', $current)
            ->first();

        //Trae la alerta Tc
          $tc_alerta = TarjetaCirculacion::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('end','<=', $current)
            ->get();
        //Trae la alerta Tc Controlador
          $tc_alerta2 = TarjetaCirculacion::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('end','<=', $current)
            ->first();

        //Trae la alerta Verificacion
          $verificacion= TarjetaCirculacion::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('end','<=', $current)
            ->get();
        //Trae la alerta Verificacion Controlador
          $verificacion2 = TarjetaCirculacion::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('end','<=', $current)
            ->first();


            if($alert3 != NULL){
                $alert3->estatus = 1;
                 $alert3->save();
             }

            if($seguro_alerta2 != NULL){
                 $seguro_alerta2->estatus = 1;
                 $seguro_alerta2->save();
             }

            if($tc_alerta2 != NULL){
                 $tc_alerta2->estatus = 1;
                 $tc_alerta2->save();
             }

            if($verificacion2 != NULL){
                 $verificacion2->estatus = 1;
                 $verificacion2->save();
             }

                if($users->role == 0){
                    die();
                    return view('layouts.app',compact('alert2', 'seguro_alerta','tc_alerta', 'verificacion'));

                }else{
                    return view('admin.layouts.alert',compact( 'alert2', 'seguro_alerta','tc_alerta', 'verificacion'));
                }

    }


}
