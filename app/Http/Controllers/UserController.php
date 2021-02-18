<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
     public function __construct(){
        $this->middleware('auth');
    }


    public function update(Request $request,$id){

        $validate = $this->validate($request,[
            'name' => 'max:191',
            'telefono' => 'max:191',
            'email' => 'max:191',
            'fecha_nacimiento' => 'max:191',
    		'direccion' => 'max:191',
            'referencia' => 'max:191',
            'genero' => 'max:191',
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->get('name');
        $user->telefono = $request->get('telefono');
        $user->email = $request->get('email');
        $user->fecha_nacimiento = $request->get('fecha_nacimiento');
        $user->direccion = $request->get('direccion');
        $user->referencia = $request->get('referencia');
        $user->genero = $request->get('genero');

        $users = DB::table('users')
        ->get();

        $user->update();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return view('profile.profile', compact('user', 'users'));
    }

    public function edit($id){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $user = User::findOrFail($id);

        $users = DB::table('users')
            ->get();

        return view('profile.profile', compact('user','users'));
    }

}
