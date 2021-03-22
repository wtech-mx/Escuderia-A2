<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;


class OfflineController extends Controller
{
   public function index()
    {
        $users = User::where('id','=',auth()->user()->id)
        ->first();

          if($users->role == 0){
              return view('layouts.offline');
          }else{
              return view('admin.layouts.offline');
          }
    }
}
