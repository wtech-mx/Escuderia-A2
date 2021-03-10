<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use DB;
use Session;
use Carbon\Carbon;
use App\Models\Alertas;
use App\Models\Seguros;

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
            ->where('status', '=', 0)
            ->where('start','<=', $current)
            ->get();

          //Trae la alerta Seguro
          $seguro_alerta = Seguros::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('end','<=', $current)
            ->get();

                        if($users->role == 0){
                            return view('dashboard',compact('users', 'user', 'alert2', 'seguro_alerta'));
                        }else{
                            return view('admin.dashboard',compact('users', 'user', 'alert2', 'seguro_alerta'));
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
            ->where('status', '=', 0)
            ->where('start','<=', $current)
            ->get();
          //Trae la alerta al controlador
          $alert3 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('start','<=', $current)
            ->where('status', '=', 0)
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



            if($alert3 == NULL || $seguro_alerta2 == NULL){
                if($users->role == 0){
                    dd($seguro_alerta);
                    return view('layouts.app',compact('alert2', 'seguro_alerta'));
                }else{
                    return view('admin.layouts.alert',compact( 'alert2', 'seguro_alerta'));
                }
             }else {
                $alert3->status = 1;
                $seguro_alerta2->estatus = 1;
                if($users->role == 0){
                    $alert3->save();
                    $seguro_alerta2->save();
                    return view('layouts.app',compact('alert2', 'seguro_alerta'));
                }else{
                    $alert3->save();
                    return view('admin.layouts.alert',compact( 'alert2', 'seguro_alerta'));
                }

            }

    }

}
