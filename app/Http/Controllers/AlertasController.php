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
          $user = DB::table('users')
            ->where('role','=', 0)
            ->get();

          return view('admin.dashboard', compact('user'));
    }

    public function show()
    {
          $alert = Alertas::get();

          $user = DB::table('users')
            ->where('role','=', '0')
            ->get();

            // obtener la hora actual  - 2015-12-19 10:10:54
            $current = Carbon::now();
            $current = new Carbon();

            // get hoy - 2015-12-19 00:00:00
            $today = Carbon::today();

            // get ayer - 2015-12-18 00:00:00
            $yesterday = Carbon::yesterday();

            // get mañana - 2015-12-20 00:00:00
            $tomorrow = Carbon::tomorrow();



          return view('admin.alerts.view-alerts-admin', compact('alert', 'user'));
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
