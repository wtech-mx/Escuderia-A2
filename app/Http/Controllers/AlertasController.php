<?php

namespace App\Http\Controllers;

use App\Models\Alertas;
use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;
use App\Models\evento;

class AlertasController extends Controller
{

    public function index(Request $request)
    {
          $titulo = $request->get('titulo');
          $alert = Alertas::orderBy('id','DESC')
              ->titulo($titulo)
              ->paginate(6);

          $user = DB::table('users')
            ->where('role','=', '0')
            ->get();

         // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();
          $alert2 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('start','<=', $current)
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
        $alert->start = $request->get('start');
        $alert->end = $request->get('start');
        $alert->color = '#'.$request->get('color');
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

/*|--------------------------------------------------------------------------
/|                  CALENDARIO
|--------------------------------------------------------------------------*/

        public function index_eventos()
    {

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->get();

        // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();
          $alert2 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('start','<=', $current)
            ->where('status', '=', 0)
            ->get();

          $alert = Alertas::get();

        return view('admin.alerts.view-alerts-admin',compact('alert2','user', 'alert'));
    }

        public function store_eventos(Request $request)
    {
        $datosEvento = request()->except(['_token','_method']);
        evento::insert($datosEvento);
        print_r($datosEvento);
    }

        public function show_eventos()
    {

        //Trae datos de db to jason
        $json = $data['eventos'] = evento::all();
        $json2 = $data2['alertas'] = Alertas::all();

        //los convieerte en array
        $decode = json_decode($json);
        $decode2 = json_decode($json2);

        //Une los array en uno solo
        $resultado = array_merge ($decode, $decode2);

        //retorna a la vista sn json
        return response()->json($resultado);

    }

        public function update_eventos(Request $request, $id)
    {
        $datosEvento = request()->except(['_token','_method']);
        $respuesta = evento::where('id','=',$id)->update($datosEvento);

    }

        public function destroy_eventos($id)
    {
        $eventos = evento::findOrFail($id);
        evento::destroy($id);
        return response()->json($id);
    }
}
