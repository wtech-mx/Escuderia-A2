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

use App\Exports\SeguroExport;
use Maatwebsite\Excel\Facades\Excel;

class SegurosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('pagespeed');
    }

    /*|--------------------------------------------------------------------------
|Create Seguro Usuario
|--------------------------------------------------------------------------*/
    public function index()
    {
        $automovil = DB::table('automovil')
        ->where('id_user', '=', auth()->user()->id)
        ->get();

        $auto = DB::table('users')
            ->where('current_auto', '=', auth()->user()->current_auto)
            ->first();

        $seguro = Seguros::where('current_auto', '=', $auto->current_auto)
            ->first();

        if ($seguro == NULL) {
            $img = '';
        } else {
            switch ($seguro) {
                case ($seguro->seguro == 'sin seguro'):
                    $img = 'page-not-found.png';
                    break;
                case ($seguro->seguro == 'aba'):
                    $img = 'aba.png';
                    break;
                case ($seguro->seguro == 'afirme'):
                    $img = 'afirme.png';
                    break;
                case ($seguro->seguro == 'aig'):
                    $img = 'aig.png';
                    break;
                case ($seguro->seguro == 'ana'):
                    $img = 'ana.png';
                    break;
                case ($seguro->seguro == 'atlas'):
                    $img = 'atlas.png';
                    break;
                case ($seguro->seguro == 'axa'):
                    $img = 'axa.png';
                    break;
                case ($seguro->seguro == 'banorte'):
                    $img = 'banorte.png';
                    break;
                case ($seguro->seguro == 'general'):
                    $img = 'general.png';
                    break;
                case ($seguro->seguro == 'sura'):
                    $img = 'sura.png';
                    break;
                case ($seguro->seguro == 'vexmas'):
                    $img = 'vexmas.png';
                    break;
                case ($seguro->seguro == 'gnp'):
                    $img = 'gnp.png';
                    break;
                case ($seguro->seguro == 'hdi'):
                    $img = 'hdi.png';
                    break;
                case ($seguro->seguro == 'inbursa'):
                    $img = 'inbursa.png';
                    break;
                case ($seguro->seguro == 'latino'):
                    $img = 'latino.png';
                    break;
                case ($seguro->seguro == 'mapfre'):
                    $img = 'mapfre.png';
                    break;
                case ($seguro->seguro == 'qualitas'):
                    $img = 'qualitas.png';
                    break;
                case ($seguro->seguro == 'potosi'):
                    $img = 'potosi.png';
                    break;
                case ($seguro->seguro == 'miituo'):
                    $img = 'miituo.png';
                    break;
                case ($seguro->seguro == 'zurich'):
                    $img = 'zurich.png';
                    break;
            }
        }

        $users = DB::table('users')
            ->get();

        return view('seguros.seguros', compact('seguro', 'img', 'users', 'automovil'));
    }

    public function update(Request $request, $id)
    {

        $seguro = Seguros::findOrFail($id);

        $seguro->seguro = $request->get('seguro');

        $seguro->fecha_expedicion = $request->get('fecha_expedicion');
        $seguro->start = $request->get('end');
        $seguro->end = $request->get('end');
        $seguro->id_sector = $request->get('id_sector');

        $seguro->tipo_cobertura = $request->get('tipo_cobertura');
        $seguro->costo = $request->get('costo');
        $seguro->costo_anual = $request->get('costo_anual');

        //datos para el calednario
        $seguro->title = $request->get('title');
        $seguro->color = $request->get('color');
        $seguro->descripcion = 'Su Seguro expira el dia: ' . $seguro->end;
        $seguro->image = $request->get('image');

        $seguro->estatus = 0;
        $seguro->estado_last_week = 0;
        $seguro->estado_tomorrow = 0;
        $seguro->check = 0;

        $seguro->update();

        $email = $seguro->User->email;
        $subject = 'Bienvenido : ' . $email;

        $details = array(
            'seguro' => $request->get('seguro'),
            'fecha_expedicion' => $request->get('fecha_expedicion'),
            'tipo_cobertura' => $request->get('tipo_cobertura'),
            'costo' => $request->get('costo'),
            'costo_anual' => $request->get('costo_anual'),
            'end' => $seguro->end,
            'email' => $email,
            'auto' => $seguro->Automovil->placas,
            'nombre' => $seguro->User->name,
        );

        //        Mail::send('emails.seguroAdmin', $details, function ($message) use ($details,$subject) {
        //            $message->to($details['email'], $details['seguro'], $details['fecha_expedicion'], $details['tipo_cobertura'], $details['costo'], $details['costo_anual'], $details['end'], $details['auto'], $details['nombre'])
        //                ->subject($subject)
        //                ->from('contacto@checkngo.com.mx', 'Detalles de Seguro');
        //
        //        });

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->route('index.seguro', compact('seguro'));
    }

    /*|--------------------------------------------------------------------------
|Create Seguro Admin_Admin
|--------------------------------------------------------------------------*/
    function index_admin(Request $request)
    {
            $seguro = $request->get('seguro');

            $seguros = Seguros::where('id_empresa', '=', NULL)
                ->get();

            $seguros2 = Seguros::where('id_user', '=', NULL)
                ->get();

            $user = DB::table('users')
                ->where('role', '=', '0')
                ->get();

            $users = DB::table('users')
                ->get();

            if(auth()->user()->empresa == 1){
                if(auth()->user()->id_sector == NULL){
                    $seguros_empresa = Seguros::
                    where('id_empresa', '=', auth()->user()->id)
                    ->get();
                }else{
                    $seguros_empresa = Seguros::
                    where('id_sector', '=', auth()->user()->id_sector)
                    ->get();
                }
                return view('admin.seguros.view-seguros-admin', compact('seguros', 'seguros2', 'user', 'users', 'seguros_empresa'));
            }



            return view('admin.seguros.view-seguros-admin', compact('seguros', 'seguros2', 'user', 'users'));
    }

    public function edit_admin($id)
    {
            $seguro = Seguros::findOrFail($id);
            $users = DB::table('users')
                ->get();
            if ($seguro == NULL) {
                $img = '';
            } else {
                switch ($seguro) {
                    case ($seguro->seguro == 'sin seguro'):
                        $img = 'page-not-found.png';
                        break;
                    case ($seguro->seguro == 'aba'):
                        $img = 'aba.png';
                        break;
                    case ($seguro->seguro == 'afirme'):
                        $img = 'afirme.png';
                        break;
                    case ($seguro->seguro == 'aig'):
                        $img = 'aig.png';
                        break;
                    case ($seguro->seguro == 'ana'):
                        $img = 'ana.png';
                        break;
                    case ($seguro->seguro == 'atlas'):
                        $img = 'atlas.png';
                        break;
                    case ($seguro->seguro == 'axa'):
                        $img = 'axa.png';
                        break;
                    case ($seguro->seguro == 'banorte'):
                        $img = 'banorte.png';
                        break;
                    case ($seguro->seguro == 'general'):
                        $img = 'general.png';
                        break;
                    case ($seguro->seguro == 'sura'):
                        $img = 'sura.png';
                        break;
                    case ($seguro->seguro == 'vexmas'):
                        $img = 'vexmas.png';
                        break;
                    case ($seguro->seguro == 'gnp'):
                        $img = 'gnp.png';
                        break;
                    case ($seguro->seguro == 'hdi'):
                        $img = 'hdi.png';
                        break;
                    case ($seguro->seguro == 'inbursa'):
                        $img = 'inbursa.png';
                        break;
                    case ($seguro->seguro == 'latino'):
                        $img = 'latino.png';
                        break;
                    case ($seguro->seguro == 'mapfre'):
                        $img = 'mapfre.png';
                        break;
                    case ($seguro->seguro == 'qualitas'):
                        $img = 'qualitas.png';
                        break;
                    case ($seguro->seguro == 'potosi'):
                        $img = 'potosi.png';
                        break;
                    case ($seguro->seguro == 'miituo'):
                        $img = 'miituo.png';
                        break;
                    case ($seguro->seguro == 'zurich'):
                        $img = 'zurich.png';
                        break;
                }
            }
            return view('admin.seguros.create-seguros-admin', compact('seguro', 'img', 'users'));
    }

    public function update_admin(Request $request, $id)
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
        $seguro->descripcion = 'Su Seguro expira el dia: ' . $seguro->end;
        $seguro->image = $request->get('image');

        $seguro->estatus = 0;
        $seguro->estado_last_week = 0;
        $seguro->estado_tomorrow = 0;
        $seguro->check = 0;

        $seguro->update();

        Session::flash('success2', 'Se ha actualizado sus datos con exito');
        return redirect()->back();
    }

    public function export()
    {
        return Excel::download(new SeguroExport, 'seguros-usuarios.xlsx');
    }

    public function export_empresa()
    {
        return Excel::download(new SeguroExportEmpresa, 'seguros-empresas.xlsx');
    }
}
