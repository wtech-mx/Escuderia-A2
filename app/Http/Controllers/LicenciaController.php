<?php

namespace App\Http\Controllers;

use App\Models\Licencia;
use Illuminate\Http\Request;
use Session;
use DB;

class LicenciaController extends Controller
{

    /*|--------------------------------------------------------------------------
|Create Licencia Usuario
|--------------------------------------------------------------------------*/
    public function index()
    {

        $licencia = Licencia::where('id_user', '=', auth()->user()->id)->get();

        return view('licencia.index', compact('licencia'));
    }

    public function update(Request $request, $id)
    {

        $licencia = Licencia::findOrFail($id);

        $licencia->id_user = $request->get('id_user');
        $licencia->tipo = $request->get('tipo');
        $licencia->expedicion = $request->get('expedicion');
        $licencia->antiguedad = $request->get('antiguedad');
        $licencia->vigencia = $request->get('vigencia');
        $licencia->permanente = $request->get('permanente');
        $licencia->nacionalidad = $request->get('nacionalidad');
        $licencia->sangre = $request->get('sangre');
        $licencia->rfc = $request->get('rfc');
        $licencia->numero = $request->get('numero');
        $licencia->entidad = $request->get('entidad');
        $licencia->update();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->back();
    }

    /*|--------------------------------------------------------------------------
|Create Licencia Usuario
|--------------------------------------------------------------------------*/
    public function index_admin()
    {
            $licencia = Licencia::where('id_empresa', '=', 0)->get();
            $licencia_empresa = Licencia::where('id_user', '=', 0)->get();

            return view('admin.licencia.index', compact('licencia', 'licencia_empresa'));
    }

    public function edit_admin($id)
    {
            $licencia = Licencia::findOrFail($id);

            $users = DB::table('users')
                ->get();

            return view('admin.licencia.edit', compact('licencia', 'users'));
    }

    public function update_admin(Request $request, $id)
    {

        $licencia = Licencia::findOrFail($id);

        $licencia->id_user = $request->get('id_user');
        $licencia->tipo = $request->get('tipo');
        $licencia->expedicion = $request->get('expedicion');
        $licencia->antiguedad = $request->get('antiguedad');
        $licencia->vigencia = $request->get('vigencia');
        $licencia->permanente = $request->get('permanente');
        $licencia->nacionalidad = $request->get('nacionalidad');
        $licencia->sangre = $request->get('sangre');
        $licencia->rfc = $request->get('rfc');
        $licencia->numero = $request->get('numero');
        $licencia->entidad = $request->get('entidad');

        $licencia->update();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->back();
    }
}
