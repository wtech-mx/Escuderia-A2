<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CotizacionServicio;
use App\Models\CotizacionDiagnostico;
use DB;
use Session;

class CotizacionDiagnosticoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cotizacion = CotizacionServicio::findOrFail($id);

        $cotizacion_diagnostico = CotizacionDiagnostico::
        where('id_cotizacion_servicio', '=', $cotizacion->id)
        ->get();

        $user = DB::table('users')
            ->where('role', '=', '0')
            ->where('empresa', '=', '0')
            ->get();

        $auto = DB::table('automovil')
            ->get();

        return view('admin.cotizacion.diagnostico', compact('user', 'auto', 'cotizacion', 'cotizacion_diagnostico'));
    }

    public function update(Request $request, $id)
    {
        $cotizacion = CotizacionServicio::findOrFail($id);
        $cotizacion->carroceria = $request->get('carroceria');
        $cotizacion->suspencion_d = $request->get('suspencion_d');
        $cotizacion->suspencion_t = $request->get('suspencion_t');
        $cotizacion->frenos_d = $request->get('frenos_d');
        $cotizacion->frenos_t = $request->get('frenos_t');
        $cotizacion->llantas_d = $request->get('llantas_d');
        $cotizacion->llantas_t = $request->get('llantas_t');
        $cotizacion->mangueras = $request->get('mangueras');
        $cotizacion->luces_d = $request->get('luces_d');
        $cotizacion->luces_t = $request->get('luces_t');
        $cotizacion->aceite = $request->get('aceite');
        $cotizacion->afinacion_b = $request->get('afinacion_b');
        $cotizacion->afinacion_f = $request->get('afinacion_f');
        $cotizacion->otros = $request->get('otros');
        $cotizacion->observaciones = $request->get('observaciones');
        $cotizacion->update();

        $coti= CotizacionDiagnostico::
        where('id_cotizacion_servicio', '=', $cotizacion->id)
        ->first();

        $cotizacion_diagnostico = CotizacionDiagnostico::findOrFail($coti->id);
        $cotizacion_diagnostico->liquido_f = $request->get('liquido_f');
        $cotizacion_diagnostico->anticongelante = $request->get('anticongelante');
        $cotizacion_diagnostico->aceite_d = $request->get('aceite_d');
        $cotizacion_diagnostico->aceite_t = $request->get('aceite_t');
        $cotizacion_diagnostico->limpia_p = $request->get('limpia_p');
        $cotizacion_diagnostico->observaciones = $request->get('observaciones2');
        $cotizacion_diagnostico->update();

        Session::flash('auto', 'Se ha guardado sus datos con exito');
        return redirect()->route('index.cotizacion', compact('cotizacion'));
    }
}
