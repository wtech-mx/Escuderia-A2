<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Empresa;

class EmpresasController extends Controller
{
     public function create(){
         $user = DB::table('users')
            ->where('role','=', '0')
            ->get();

        return view('admin.garaje.create-garaje-admin',compact('user'));
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'nombre' => 'required|max:191',
            'email' => 'required|string|email|max:191',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $empresa = new Empresa;
        $empresa->nombre = $request->get('nombre');
        $empresa->telefono = $request->get('telefono');
        $empresa->direccion = $request->get('direccion');
        $empresa->referencia = $request->get('referencia');
        $empresa->submarca = $request->get('submarca');
        $empresa->email = $request->get('email');
        $empresa->password = Hash::make($request->password);
dd($empresa);
        $empresa->save();

       return redirect()->route('create_admin.automovil');
    }
}
