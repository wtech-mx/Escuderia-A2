<?php

namespace App\Http\Controllers;

use App\Models\TarjetaCirculacion;

use Illuminate\Http\Request;
use Session;
use DB;
use OneSignal;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

use App\Exports\TcExport;
use App\Exports\TcExportEmpresa;
use Maatwebsite\Excel\Facades\Excel;

class TarjetaCirculacionController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('pagespeed');
    }

/*|--------------------------------------------------------------------------
|Create TarjetaCirculacion Usuario
|--------------------------------------------------------------------------*/
    public function index(){

        $auto = DB::table('users')
        ->where('current_auto','=',auth()->user()->current_auto)
        ->first();

        $tarjeta_circulacion = TarjetaCirculacion::where('current_auto','=',$auto->current_auto)->first();

        $users = DB::table('users')
        ->get();

        return view('tarjeta-circulacion.tarjeta_circulacion',compact('tarjeta_circulacion', 'users'));
    }

    public function update(Request $request,$id){

        $tarjeta_circulacion = TarjetaCirculacion::findOrFail($id);

        $tarjeta_circulacion->nombre = $request->get('nombre');
        $tarjeta_circulacion->tipo_placa = $request->get('tipo_placa');
        $tarjeta_circulacion->lugar_expedicion = $request->get('lugar_expedicion');

        $tarjeta_circulacion->fecha_emision = $request->get('fecha_emision');
        $tarjeta_circulacion->start = $request->get('end');
        $tarjeta_circulacion->end = $request->get('end');

        $tarjeta_circulacion->num_placa = $request->get('num_placa');
        $tarjeta_circulacion->current_auto = auth()->user()->current_auto;

        //datos para el calednario
        $tarjeta_circulacion->title = $request->get('title');
        $tarjeta_circulacion->color = $request->get('color');
        $tarjeta_circulacion->descripcion = 'Su Tarjeta de Circulación expira el dia: '.$tarjeta_circulacion->end;
        $tarjeta_circulacion->image = $request->get('image');

        $tarjeta_circulacion->estatus = 0;
        $tarjeta_circulacion->estado_last_week = 0;
        $tarjeta_circulacion->estado_tomorrow = 0;
        $tarjeta_circulacion->check = 0;
        $tarjeta_circulacion->update();

        $email = $tarjeta_circulacion->User->email;
        $subject = 'Bienvenido: '.$email ;

        $details = array(
         'email' => $email,
         'nombre' => $request->get('nombre'),
         'tipo_placa' => $request->get('tipo_placa'),
         'lugar_expedicion' => $request->get('lugar_expedicion'),
         'fecha_emision' => $request->get('fecha_emision'),
         'end' => 'Su Tarjeta de Circulación expira el dia: '.$tarjeta_circulacion->end,
         'auto' => $tarjeta_circulacion->Automovil->placas,
         'nombreU' => $tarjeta_circulacion->User->name,
         );

        Mail::send('emails.tcAdmin', $details, function ($message) use ($details,$subject) {
            $message->to($details['email'], $details['nombre'], $details['tipo_placa'], $details['lugar_expedicion'], $details['fecha_emision'], $details['end'], $details['auto'], $details['nombreU'])
                ->subject($subject)
                ->from('contacto@checkngo.com.mx', 'Detalle de TarjetaCirculacion');
        });

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->route('index.tc', compact('tarjeta_circulacion'));

    }

/*|--------------------------------------------------------------------------
|Create TarjetaCirculacion Admin
|--------------------------------------------------------------------------*/
    public function indextc_admin(Request $request){
        if (auth()->user()->role != 1) {
            return view('errors.403');
        } else {
        $nombre = $request->get('nombre');

        $tarjeta_circulacion = TarjetaCirculacion::orderBy('id','DESC')
            ->nombre($nombre)
            ->where('id_empresa','=', NULL)
            ->paginate(5);

        $tarjeta_circulacion2 = TarjetaCirculacion::orderBy('id','DESC')
            ->where('id_user','=', NULL)
            ->paginate(5);

        $user = DB::table('users')
        ->get();

        return view('admin.tarjeta-circulacion.view-tc-admin',compact('tarjeta_circulacion', 'user', 'tarjeta_circulacion2'));
        }
    }

    public function  edit_admin($id){
        if (auth()->user()->role != 1) {
            return view('errors.403');
        } else {
        $tarjeta_circulacion = TarjetaCirculacion::findOrFail($id);
        $users = DB::table('users')
        ->get();

        return view('admin.tarjeta-circulacion.tarjeta_circulacion',compact('tarjeta_circulacion', 'users'));
        }
    }

    function update_admin(Request $request, $id){

        $validate = $this->validate($request, [
            'nombre' => 'required|max:191',
            'tipo_placa' => 'required|max:191',
            'lugar_expedicion' => 'required|max:191',
        ]);

        $tarjeta_circulacion = TarjetaCirculacion::findOrFail($id);
        $tarjeta_circulacion->nombre = $request->get('nombre');
        $tarjeta_circulacion->tipo_placa = $request->get('tipo_placa');
        $tarjeta_circulacion->lugar_expedicion = $request->get('lugar_expedicion');

        $tarjeta_circulacion->fecha_emision = $request->get('fecha_emision');
        $tarjeta_circulacion->start = $request->get('end');
        $tarjeta_circulacion->end = $request->get('end');

        $tarjeta_circulacion->num_placa = $request->get('num_placa');
        $tarjeta_circulacion->current_auto = $request->get('current_auto');

        //datos para el calednario
        $tarjeta_circulacion->title = $request->get('title');
        $tarjeta_circulacion->color = $request->get('color');
        $tarjeta_circulacion->descripcion = 'Su Tarjeta de Circulación expira el dia: '.$tarjeta_circulacion->end;
        $tarjeta_circulacion->image = $request->get('image');

        $tarjeta_circulacion->estatus = 0;
        $tarjeta_circulacion->estado_last_week = 0;
        $tarjeta_circulacion->estado_tomorrow = 0;
        $tarjeta_circulacion->check = 0;
        $tarjeta_circulacion->update();

        $email = $tarjeta_circulacion->User->email;
        $subject = 'Bienvenido: '.$email ;

        $details = array(
         'email' => $email,
         'nombre' => $request->get('nombre'),
         'tipo_placa' => $request->get('tipo_placa'),
         'lugar_expedicion' => $request->get('lugar_expedicion'),
         'fecha_emision' => $request->get('fecha_emision'),
         'end' => $request->get('end'),
         'auto' => $tarjeta_circulacion->Automovil->placas,
         'nombreU' => $tarjeta_circulacion->User->name,
         );

        Mail::send('emails.tcAdmin', $details, function ($message) use ($details,$subject) {
            $message->to($details['email'], $details['nombre'], $details['tipo_placa'], $details['lugar_expedicion'], $details['fecha_emision'], $details['end'], $details['auto'], $details['nombreU'])
                ->subject($subject)
                ->from('contacto@checkngo.com.mx', 'Detalle de TarjetaCirculacion');
        });

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('indextc_admin.tarjeta-circulacion', compact('tarjeta_circulacion'));
    }

    public function export(){
        return Excel::download(new TcExport, 'tc-usuarios.xlsx');
    }

    public function export_empresa(){
        return Excel::download(new TcExportEmpresa, 'tc-empresas.xlsx');
    }
}
