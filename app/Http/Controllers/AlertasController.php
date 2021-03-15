<?php

namespace App\Http\Controllers;

use App\Models\Alertas;
use App\Models\Seguros;
use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;


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

/*|--------------------------------------------------------------------------
/|  CALENDARIO
|--------------------------------------------------------------------------*/

        public function index_calendar()
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

        public function store_calendar(Request $request)
    {
        $datosEvento = request()->except(['_token','_method'],[]);

        Alertas::insert($datosEvento);
    }

        public function show_calendar()
    {
        //Trae datos de db to jason
        $json2 = $data2['alertas'] = Alertas::all();
        $json3 = $data3['seguros'] = Seguros::all()->makeHidden('end');

        //los convieerte en array
        $decode2 = json_decode($json2);
        $decode3 = json_decode($json3);

        //Une los array en uno solo
        $resultado = array_merge ($decode2,$decode3);

        //retorna a la vista sn json
        return response()->json($resultado);

    }

        public function update_calendar(Request $request, $id)
    {
        $datosEvento = request()->except(['_token','_method']);
        $respuesta = Alertas::where('id','=',$id)->update($datosEvento);
    }

        public function destroy_calendar($id)
    {
        Alertas::destroy($id);
        return response()->json($id);
    }
}
