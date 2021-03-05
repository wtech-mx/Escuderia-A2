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

            if($users->role == 0){
                return view('dashboard',compact('users', 'user'));
            }else{
                return view('admin.dashboard',compact('users', 'user'));
            }

    }
}
