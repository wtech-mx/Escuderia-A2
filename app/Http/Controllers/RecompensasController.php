<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;
use App\Models\Automovil;
use App\Models\Seguros;
use App\Models\User;
use App\Models\TarjetaCirculacion;
use Session;
use Carbon\Carbon;
use App\Models\Alertas;
use App\Models\Verificacion;
use App\Models\VerificacionSegunda;
class RecompensasController extends Controller
{
     function index(){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

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

        return view('win-and-share.view-win-share',compact( 'users', 'alert2', 'seguro_alerta', 'tc_alerta'));
    }
}
