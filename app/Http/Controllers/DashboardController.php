<?php

namespace App\Http\Controllers;

use App\Models\Alertas;
use App\Models\Llantas;
use App\Models\Pronostico;
use App\Models\Seguros;
use App\Models\TarjetaCirculacion;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Verificacion;
use App\Models\VerificacionSegunda;
use DB;
use Session;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::where('id', '=', auth()->user()->id)
            ->first();

        $user = DB::table('users')
            ->where('role', '=', 0)
            ->get();

            $current = date("m");
            $año = date("Y");
            if (auth()->user()->empresa == 0) {
                //Trae datos de db to jason
                $alertas = Alertas::whereMonth('start', '=', $current)->whereYear('start', '=', $año)->where('check', '=', 0)->get();
                $seguros = Seguros::whereMonth('start', '=', $current)->whereYear('start', '=', $año)->where('check', '=', 0)->get()->makeHidden('end');
                $tarjeta = TarjetaCirculacion::whereMonth('start', '=', $current)->whereYear('start', '=', $año)->where('check', '=', 0)->get()->makeHidden('end');
                $verificacion = Verificacion::whereMonth('start', '=', $current)->whereYear('start', '=', $año)->where('check', '=', 0)->get()->makeHidden('end');
                $llantas = Llantas::whereMonth('start', '=', $current)->whereYear('start', '=', $año)->where('check', '=', 0)->get()->makeHidden('end');
                $verificacion_segunda = VerificacionSegunda::whereMonth('start', '=', $current)->whereYear('start', '=', $año)->where('check', '=', 0)->get()->makeHidden('end');
                $pronostico = Pronostico::whereMonth('start', '=', $current)->whereYear('start', '=', $año)->where('check', '=', 0)->get()->makeHidden('end');

            } elseif (auth()->user()->empresa == 1 && auth()->user()->id_sector == NULL) {

                $alertas = Alertas::where('id_empresa', '=', auth()->user()->id)->whereMonth('start', '=', $current)->whereYear('start', '=', $año)->where('check', '=', 0)->get();
                $seguros = Seguros::where('id_empresa', '=', auth()->user()->id)->whereMonth('start', '=', $current)->whereYear('start', '=', $año)->where('check', '=', 0)->get();
                $tarjeta = TarjetaCirculacion::where('id_empresa', '=', auth()->user()->id)->whereMonth('start', '=', $current)->whereYear('start', '=', $año)->where('check', '=', 0)->get()->makeHidden('end');
                $verificacion = Verificacion::where('id_empresa', '=', auth()->user()->id)->whereMonth('start', '=', $current)->whereYear('start', '=', $año)->where('check', '=', 0)->get()->makeHidden('end');
                $llantas = Llantas::where('id_empresa', '=', auth()->user()->id)->whereMonth('start', '=', $current)->whereYear('start', '=', $año)->where('check', '=', 0)->get()->makeHidden('end');
                $verificacion_segunda = VerificacionSegunda::where('id_empresa', '=', auth()->user()->id)->whereMonth('start', '=', $current)->whereYear('start', '=', $año)->where('check', '=', 0)->get()->makeHidden('end');
                $pronostico = Pronostico::where('id_empresa', '=', auth()->user()->id)->whereMonth('start', '=', $current)->whereYear('start', '=', $año)->where('check', '=', 0)->get()->makeHidden('end');

            } else {

                $alertas = Alertas::where('id_sector', '=', auth()->user()->id_sector)->whereMonth('start', '=', $current)->whereYear('start', '=', $año)->where('check', '=', 0)->get();
                $seguros = Seguros::where('id_sector', '=', auth()->user()->id_sector)->whereMonth('start', '=', $current)->whereYear('start', '=', $año)->where('check', '=', 0)->get();
                $tarjeta = TarjetaCirculacion::where('id_sector', '=', auth()->user()->id_sector)->whereMonth('start', '=', $current)->whereYear('start', '=', $año)->where('check', '=', 0)->get()->makeHidden('end');
                $verificacion = Verificacion::where('id_sector', '=', auth()->user()->id_sector)->whereMonth('start', '=', $current)->whereYear('start', '=', $año)->where('check', '=', 0)->get()->makeHidden('end');
                $llantas = Llantas::where('id_sector', '=', auth()->user()->id_sector)->whereMonth('start', '=', $current)->whereYear('start', '=', $año)->where('check', '=', 0)->get()->makeHidden('end');
                $verificacion_segunda = VerificacionSegunda::where('id_sector', '=', auth()->user()->id_sector)->whereMonth('start', '=', $current)->whereYear('start', '=', $año)->where('check', '=', 0)->get()->makeHidden('end');
                $pronostico = Pronostico::where('id_sector', '=', auth()->user()->id_sector)->whereMonth('start', '=', $current)->whereYear('start', '=', $año)->where('check', '=', 0)->get()->makeHidden('end');
            }

        if ($users->role == 0) {
            return view('dashboard', compact('users', 'user'));
        } else {
            return view('admin.dashboard', compact('users', 'user', 'alertas', 'seguros', 'tarjeta', 'verificacion', 'llantas', 'verificacion_segunda', 'pronostico'));
        }
    }

    public function store(Request $request)
    {
        $users = User::where('id', '=', auth()->user()->id)->first();

        $users->device_token = $request->get('user_id');
        if ($users->device_token == NULL) {
        } else {
            $users->save();
        }

        return view('layouts.app');
    }
}
