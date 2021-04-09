<?php

namespace App\Http\Controllers;

use App\Models\Seguros;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Cookie;
use OneSignal;

class SegurosController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('pagespeed');
    }

/*|--------------------------------------------------------------------------
|Create Seguro Usuario
|--------------------------------------------------------------------------*/
    public function index(){

        $auto = DB::table('users')
        ->where('current_auto','=',auth()->user()->current_auto)
        ->first();

        $seguro = Seguros::
        where('current_auto','=',$auto->current_auto)
        ->first();

    if($seguro == NULL){
        $img = '';
    }else{
        switch($seguro){
                case( $seguro->seguro == 'aba' ):
                    $img = 'aba.png';
                break;
                case( $seguro->seguro == 'afirme' ):
                    $img = 'afirme.png';
                break;
                case( $seguro->seguro == 'aig' ):
                    $img = 'aig.png';
                break;
                case( $seguro->seguro == 'ana' ):
                    $img = 'ana.png';
                break;
                case( $seguro->seguro == 'atlas' ):
                    $img = 'atlas.png';
                break;
                case( $seguro->seguro == 'axa' ):
                    $img = 'axa.png';
                break;
                case( $seguro->seguro == 'banorte' ):
                    $img = 'banorte.png';
                break;
                case( $seguro->seguro == 'general' ):
                    $img = 'general.png';
                break;
                case( $seguro->seguro == 'sura' ):
                    $img = 'sura.png';
                break;
                case( $seguro->seguro == 'vexmas' ):
                    $img = 'vexmas.png';
                break;
                case( $seguro->seguro == 'gnp' ):
                   $img = 'gnp.png';
                break;
                case( $seguro->seguro == 'hdi' ):
                    $img = 'hdi.png';
                break;
                case( $seguro->seguro == 'inbursa' ):
                    $img = 'inbursa.png';
                break;
                case( $seguro->seguro == 'latino' ):
                    $img = 'latino.png';
                break;
                case( $seguro->seguro == 'mapfre' ):
                    $img = 'mapfre.png';
                break;
                case( $seguro->seguro == 'qualitas' ):
                    $img = 'qualitas.png';
                break;
                case( $seguro->seguro == 'potosi' ):
                    $img = 'potosi.png';
                break;
                case( $seguro->seguro == 'miituo' ):
                    $img = 'miituo.png';
                break;
                case( $seguro->seguro == 'zurich' ):
                    $img = 'zurich.png';
                break;
            }
    }

        $users = DB::table('users')
        ->get();

        return view('seguros.seguros',compact('seguro', 'img','users'));
    }

    public function update(Request $request,$id){

        $seguro = Seguros::findOrFail($id);

        $seguro->seguro = $request->get('seguro');

        $seguro->fecha_expedicion = $request->get('fecha_expedicion');
        $seguro->start = $request->get('end');
        $seguro->end = $request->get('end');

        $seguro->tipo_cobertura = $request->get('tipo_cobertura');
        $seguro->costo = $request->get('costo');
        $seguro->costo_anual = $request->get('costo_anual');

        //datos para el calednario
        $seguro->title = $request->get('title');
        $seguro->color = $request->get('color');
        $seguro->descripcion = $request->get('descripcion');

        $seguro->device_token = $request->get('device_token');

        $seguro->update();
        // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();
        //Trae la alerta Seguro
          $seguro_alerta = Seguros::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('end','<=', $current)
            ->get();

        $email = $seguro->User->email;
        $subject = 'Bienvenido : '.$email ;

        $details = array(
         'seguro' => $request->get('seguro'),
         'fecha_expedicion' => $request->get('fecha_expedicion'),
         'tipo_cobertura' => $request->get('tipo_cobertura'),
         'costo' => $request->get('costo'),
         'costo_anual' => $request->get('costo_anual'),
         'end' => $request->get('end'),
         'email' => $email,
         'auto' => $seguro->Automovil->placas,
         'nombre' => $seguro->User->name,
         );

        Mail::send('emails.seguroAdmin', $details, function ($message) use ($details,$subject) {
            $message->to($details['email'], $details['seguro'], $details['fecha_expedicion'], $details['tipo_cobertura'], $details['costo'], $details['costo_anual'], $details['end'], $details['auto'], $details['nombre'])
                ->subject($subject)
                ->from('contacto@checkngo.com.mx', 'Detalles de Seguro');
        });

        //Inicio Alerta
            $fecha = $seguro->end.' 00:47 '.'GMT-5';

            $params = [];
            $params['include_player_ids'] = [$seguro->device_token];
            $contents = [
               "en" => $seguro->descripcion
            ];
            $params['contents'] = $contents;
            $params['delayed_option'] = "timezone"; // Will deliver on user's timezone
            $params['send_after'] = $fecha; // Delivery time

            OneSignal::sendNotificationCustom($params);
        //Fin Alerta

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->route('index.seguro', compact('seguro', 'seguro_alerta'));

    }

/*|--------------------------------------------------------------------------
|Create Seguro Admin_Admin
|--------------------------------------------------------------------------*/
     function index_admin(Request $request){

        $seguro = $request->get('seguro');

        $seguros = Seguros::orderBy('id','DESC')
            ->where('id_empresa', '=', NULL)
            ->seguro($seguro)
            ->paginate(6);

        $seguros2 = Seguros::orderBy('id','DESC')
            ->where('id_user', '=', NULL)
            ->seguro($seguro)
            ->paginate(6);

          $user = DB::table('users')
            ->where('role','=', '0')
            ->get();

          $users = DB::table('users')
          ->get();

        return view('admin.seguros.view-seguros-admin',compact('seguros','seguros2', 'user', 'users'));
    }

    public function edit_admin($id){

       $seguro = Seguros::findOrFail($id);
        $users = DB::table('users')
        ->get();

        if($seguro == NULL){
            $img = '';
        }else{
            switch($seguro){
                    case( $seguro->seguro == 'aba' ):
                        $img = 'aba.png';
                    break;
                    case( $seguro->seguro == 'afirme' ):
                        $img = 'afirme.png';
                    break;
                    case( $seguro->seguro == 'aig' ):
                        $img = 'aig.png';
                    break;
                    case( $seguro->seguro == 'ana' ):
                        $img = 'ana.png';
                    break;
                    case( $seguro->seguro == 'atlas' ):
                        $img = 'atlas.png';
                    break;
                    case( $seguro->seguro == 'axa' ):
                        $img = 'axa.png';
                    break;
                    case( $seguro->seguro == 'banorte' ):
                        $img = 'banorte.png';
                    break;
                    case( $seguro->seguro == 'general' ):
                        $img = 'general.png';
                    break;
                    case( $seguro->seguro == 'sura' ):
                        $img = 'sura.png';
                    break;
                    case( $seguro->seguro == 'vexmas' ):
                        $img = 'vexmas.png';
                    break;
                    case( $seguro->seguro == 'gnp' ):
                       $img = 'gnp.png';
                    break;
                    case( $seguro->seguro == 'hdi' ):
                        $img = 'hdi.png';
                    break;
                    case( $seguro->seguro == 'inbursa' ):
                        $img = 'inbursa.png';
                    break;
                    case( $seguro->seguro == 'latino' ):
                        $img = 'latino.png';
                    break;
                    case( $seguro->seguro == 'mapfre' ):
                        $img = 'mapfre.png';
                    break;
                    case( $seguro->seguro == 'qualitas' ):
                        $img = 'qualitas.png';
                    break;
                    case( $seguro->seguro == 'potosi' ):
                        $img = 'potosi.png';
                    break;
                    case( $seguro->seguro == 'miituo' ):
                        $img = 'miituo.png';
                    break;
                    case( $seguro->seguro == 'zurich' ):
                        $img = 'zurich.png';
                    break;
                }
        }

        return view('admin.seguros.create-seguros-admin',compact('seguro','img', 'users'));
    }

    public function update_admin(Request $request,$id)
    {

        $seguro = Seguros::findOrFail($id);

        $seguro->seguro = $request->get('seguro');
        $seguro->fecha_expedicion = $request->get('fecha_expedicion');
        $seguro->start = $request->get('end');
        $seguro->end = $request->get('end');
        $seguro->tipo_cobertura = $request->get('tipo_cobertura');
        $seguro->costo = $request->get('costo');
        $seguro->costo_anual = $request->get('costo_anual');

        //datos para el calednario
        $seguro->title = $request->get('title');
        $seguro->color = $request->get('color');
        $seguro->descripcion = $request->get('descripcion');
        $seguro->device_token = $seguro->User->device_token;

        $seguro->update();

        $email = $seguro->User->email;
        $subject = 'Bienvenido : '.$email ;

        $details = array(
         'seguro' => $request->get('seguro'),
         'fecha_expedicion' => $request->get('fecha_expedicion'),
         'tipo_cobertura' => $request->get('tipo_cobertura'),
         'costo' => $request->get('costo'),
         'costo_anual' => $request->get('costo_anual'),
         'end' => $request->get('end'),
         'email' => $email,
         'auto' => $seguro->Automovil->placas,
         'nombre' => $seguro->User->name,
         );

        Mail::send('emails.seguroAdmin', $details, function ($message) use ($details,$subject) {
            $message->to($details['email'], $details['seguro'], $details['fecha_expedicion'], $details['tipo_cobertura'], $details['costo'], $details['costo_anual'], $details['end'], $details['auto'], $details['nombre'])
                ->subject($subject)
                ->from('contacto@checkngo.com.mx', 'Detalles de Seguro');
        });

            // obtener la hora actual  - 2015-12-19 10:10:54
            $current = Carbon::now()->toDateString();

        Session::flash('success2', 'Se ha actualizado sus datos con exito');
        return redirect()->back();

    }
}
