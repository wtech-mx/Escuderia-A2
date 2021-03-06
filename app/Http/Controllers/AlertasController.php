<?php

namespace App\Http\Controllers;

use App\Models\Alertas;
use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;

class AlertasController extends Controller
{

    public function index()
    {
          $alert = Alertas::get();

          $user = DB::table('users')
            ->where('role','=', '0')
            ->get();

         // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();
          $alert2 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('fecha_inicio','<=', $current)
            ->get();

          return view('admin.alerts.view-alerts-admin', compact('alert', 'user', 'alert2'));
    }

    public function show()
    {
    }

    public function store(Request $request)
    {
        $alert = new Alertas;
        $alert->id_user = $request->get('id_user');
        $alert->id_empresa = $request->get('id_empresa');
        $alert->titulo = $request->get('titulo');
        $alert->descripcion = $request->get('descripcion');
        $alert->fecha_inicio = $request->get('fecha_inicio');
        $alert->fecha_fin = $request->get('fecha_fin');
        $alert->tiempo = $request->get('tiempo').'00';
        $alert->status = 0;

        $alert->save();

        Session::flash('alert', 'Se ha enviado con exito');
        return back();

    }

    public function edit(Alertas $alertas)
    {
        //
    }

    public function update(Request $request, Alertas $alertas)
    {
        //
    }

    public function destroy(Alertas $alertas)
    {
        //
    }
}
