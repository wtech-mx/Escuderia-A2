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
            ->where('status', '=', 0)
            ->where('start','<=', $current)
            ->get();

                        if($users->role == 0){
                            return view('dashboard',compact('users', 'user', 'alert2'));
                        }else{
                            return view('admin.dashboard',compact('users', 'user', 'alert2'));
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

            if($alert3 == NULL){
                if($users->role == 0){
                    die();
                    return view('layouts.app',compact('alert2'));
                }else{
                    return view('admin.layouts.alert',compact( 'alert2'));
                }
             }else {
                $alert3->status = 1;
                if($users->role == 0){
                    $alert3->save();
                    return view('layouts.app',compact('alert2'));
                }else{
                    $alert3->save();
                    return view('admin.layouts.alert',compact( 'alert2'));
                }

            }

    }


}
