<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use DB;
use Session;
use Carbon\Carbon;
use App\Models\Alertas;

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
            ->where('fecha_inicio','<=', $current)
            ->get();

            if($users->role == 0){
                return view('dashboard',compact('users', 'user', 'alert2'));
            }else{
                return view('admin.dashboard',compact('users', 'user', 'alert2'));
            }

    }

       public function alerts()
    {

        $users = User::where('id','=',auth()->user()->id)
        ->first();

        // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();
          $alert2 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('fecha_inicio','<=', $current)
            ->get();

            if($users->role == 0){
                return view('layouts.app',compact('alert2'));
            }else{
                return view('admin.layouts.alert',compact( 'alert2'));
            }

    }


}
