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

    public function __construct(){
        $this->middleware('auth');
    }

     function index(){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $users = DB::table('users')
        ->get();

        return view('win-and-share.view-win-share',compact( 'users'));
    }
}
