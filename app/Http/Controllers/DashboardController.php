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

          if($users->role == 0){
              return view('dashboard',compact('users','user'));
          }else{
              return view('admin.dashboard',compact('users','user'));
          }
    }

       public function alerts()
    {
        //Traer nombre y foto
        $users = User::where('id','=',auth()->user()->id)
        ->first();

                if($users->role == 0){
                    die();
                    return view('layouts.app');

                }else{
                    return view('admin.layouts.alert');
                }

    }

    public function saveToken(Request $request)
    {
        auth()->user()->update(['device_token'=>$request->token]);

        return response()->json(['token saved successfully.']);
    }

}
