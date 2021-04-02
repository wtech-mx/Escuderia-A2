<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

use App\Models\Alertas;
use App\Models\User;
use App\Models\Seguros;
use App\Models\TarjetaCirculacion;
use App\Models\VerificacionSegunda;
use App\Models\Llantas;
use App\Models\Verificacion;
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
            ->where('estatus', '=', 0)
            ->where('start','<=', $current)
            ->get();

          //Trae la alerta Seguro
          $seguro_alerta = Seguros::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('end','<=', $current)
            ->get();

          //Trae la alerta Tc
          $tc_alerta = TarjetaCirculacion::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('end','<=', $current)
            ->get();

          return view('admin.alerts.view-alerts-admin', compact('alert', 'user', 'alert2','seguro_alerta','tc_alerta'));
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
        $alert->estatus = 0;

        $alert->save();

        Session::flash('alert', 'Se ha enviado con exito');

        return back();

    }

/*|--------------------------------------------------------------------------
/|  CALENDARIO Admin
|--------------------------------------------------------------------------*/

        public function index_calendar()
    {

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->get();

          $alert = Alertas::get();

        return view('admin.alerts.view-alerts-admin',compact('user', 'alert'));
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
        $json4 = $data3['tarjeta_circulacion'] = TarjetaCirculacion::all()->makeHidden('end');
        $json5 = $data5['verificacion'] = Verificacion::all()->makeHidden('end');
        $json6 = $data6['mecanica'] = Llantas::all()->makeHidden('end');
        $json7 = $data7['verificacion_segunda'] = VerificacionSegunda::all()->makeHidden('end');

        //los convieerte en array
        $decode2 = json_decode($json2);
        $decode3 = json_decode($json3);
        $decode4 = json_decode($json4);
        $decode5 = json_decode($json5);
        $decode6 = json_decode($json6);
        $decode7 = json_decode($json7);

        //Une los array en uno solo
        $resultado = array_merge ($decode2,$decode3,$decode4,$decode5,$decode6,$decode7);

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

/*|--------------------------------------------------------------------------
/|  CALENDARIO User
|--------------------------------------------------------------------------*/

        public function index_calendar_user()
    {

        $user = DB::table('tarjeta_circulacion')
        ->get();

        return view('alerts.view-alerts',compact('user'));
    }

        public function store_calendar_user(Request $request)
    {
        $datosEvento = request()->except(['_token','_method'],[]);

        Alertas::insert($datosEvento);

        $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();
        $SERVER_API_KEY = 'AAAA134VBmc:APA91bEgYgTRmbbCwA5i6zIL9lMBJWtm01v0_PXtEk5DYLKhpyrlaWNkXR3dy5wOiWN4iiibLt8BDic-HalgFRJ-FW7QtTjBs_jrkGx7vUpSBgZ1ekhFa7287_D0BbV5IVc64HAJSq3z';

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->descripcion,
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

       dd($response);
    }

        public function show_calendar_user()
    {
        //Trae datos de db to jason
        $json2 = $data2['alertas'] = Alertas::where('id_user', '=', auth()->user()->id)
            ->get();

        $json3 = $data3['seguros'] = Seguros::all()->makeHidden('end')
            ->where('id_user', '=', auth()->user()->id);

        $json4 = $data4['tarjeta_circulacion'] = TarjetaCirculacion::all()->makeHidden('end')
            ->where('id_user', '=', auth()->user()->id);

        $json5 = $data5['verificacion'] = Verificacion::all()->makeHidden('end')
            ->where('id_user', '=', auth()->user()->id);

        $json6 = $data6['mecanica'] = Llantas::all()->makeHidden('end')
            ->where('id_user', '=', auth()->user()->id);

        $json7 = $data7['verificacion_segunda'] = VerificacionSegunda::all()->makeHidden('end')
            ->where('id_user', '=', auth()->user()->id);

        //los convieerte en array
        $decode2 = json_decode($json2);
        $decode3 = json_decode($json3);
        $decode4 = json_decode($json4);
        $decode5 = json_decode($json5);
        $decode6 = json_decode($json6);
        $decode7 = json_decode($json7);

        //Une los array en uno solo
        $resultado = array_merge ($decode2,$decode3,$decode4,$decode5,$decode6,$decode7);

        //retorna a la vista sn json
        return response()->json($resultado);

    }

        public function update_calendar_user(Request $request, $id)
        {
            $datosEvento = request()->except(['_token','_method']);
            $color = $datosEvento['color'];
            $title = $datosEvento['title'];
//            $respuesta = Alertas::all()->makeHidden('id_user')
//                ->where('id','=',$id)
//                ->where('id_user', '=', auth()->user()->id)
//                ->update($datosEvento);
//
          switch($color) {
              case($color == "#2ECC71"):
                  $respuesta = Alertas::where('id','=',$id)->update($datosEvento);
                  break;
              case($color == '#8E44AD'):
                  $respuesta = Seguros::where('id', '=', $id)->update($datosEvento);
                  break;
              case($color == '#F1C40F'):
                  $respuesta = TarjetaCirculacion::where('id', '=', $id)->update($datosEvento);
                  break;
              case($color == '#FF0000'):
                      $respuesta = VerificacionSegunda::where('id', '=', $id)->update($datosEvento);

                      $respuesta5 = Verificacion::where('id', '=', $id)->update($datosEvento);
                  break;
              case($color == '#2980B9'):
                  $respuesta = Llantas::where('id', '=', $id)->update($datosEvento);
                  break;
          }

        }

        public function destroy_calendar_user($id)
        {
            Alertas::destroy($id);
            return response()->json($id);
        }

}
