<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;
use App\Models\Alertas;
use App\Models\Seguros;
use App\Models\TarjetaCirculacion;

class ExpController extends Controller
{
     function index(){
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

        return view('exp-fisico.view-exp-fisico',compact('alert2','seguro_alerta','tc_alerta'));
    }

}
