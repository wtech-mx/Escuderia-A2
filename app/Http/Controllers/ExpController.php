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

        return view('exp-fisico.view-exp-fisico',compact('carro', 'automovil', 'users'));
    }

}
