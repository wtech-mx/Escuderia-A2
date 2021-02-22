<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Automovil;
use App\Models\Mecanica;
use App\Models\User;
use Session;

class MecanicaController extends Controller
{
/*|--------------------------------------------------------------------------
|Create Servicio Admin
|--------------------------------------------------------------------------*/
    public function create_servicio()
    {
          $user = DB::table('users')
            ->where('role','=', '0')
            ->get();

          $users = Automovil::get();

         $empresa = DB::table('empresa')
            ->get();

         $marca = DB::table('marca')
            ->get();

         $automovil = DB::table('automovil')

            ->get();

        return view('admin.services.mecanica',compact('user', 'empresa', 'marca', 'automovil','users'));
    }

    public function store_servicio(Request $request)
    {
        $mecanica = new Mecanica;
        $mecanica->id_user = $request->get('id_user');
        $mecanica->id_empresa = $request->get('id_empresa');
        $mecanica->llantas_delanteras = $request->get('llantas_delanteras');
        $mecanica->llantas_traseras = $request->get('llantas_traseras');
        $mecanica->current_auto = $request->get('current_auto');
        $mecanica->servicio = $request->get('servicio');
        $mecanica->id_marca = $request->get('id_marca');
        $mecanica->descripcion = $request->get('descripcion');
        $mecanica->garantia = $request->get('garantia');
        $mecanica->vida_llantas = $request->get('vida_llantas');
        $mecanica->km_actual = $request->get('km_actual');

        if ($request->hasFile('video')) {
    		$file=$request->file('video');
    		$file->move(public_path().'/inter-mecanica',time().".".$file->getClientOriginalExtension());
    		$mecanica->video=time().".".$file->getClientOriginalExtension();
    	}

        if ($request->hasFile('video2')) {
    		$file=$request->file('video2');
    		$file->move(public_path().'/ext-mecanica',time().".".$file->getClientOriginalExtension());
    		$mecanica->video2=time().".".$file->getClientOriginalExtension();
    	}

        $mecanica->save();
        return redirect()->back();
    }
}
