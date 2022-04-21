<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CotizacionRemision;
use App\Models\CotizacionServicio;
use App\Models\TotalRemision;
use Validator;
use Arr;
use DB;
use Session;

class CotizacionRemisionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function edit($id)
    {
        $cotizacion = CotizacionServicio::where('id_cotizacion', '=', $id)
        ->first();

        $remision = CotizacionRemision::where('id_cotizacion', '=', $id)
            ->where('reparacion', '!=', NULL)
            ->get();

        $total_remision = TotalRemision::where('id_cotizacion', '=', $id)
            ->first();
        return view('admin.cotizacion.remision', compact('remision', 'cotizacion', 'total_remision'));
    }

    public function update(Request $request)
    {
        $rules = array(
            'reparacion.*',
            'mano.*',
            'importe.*',
            'id_cotizacion.*',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json([
                'error' => $error->errors()->all()
            ]);
        }

        $mano = $request->mano;
        $reparacion = $request->reparacion;
        $importe = $request->importe;
        $id_cotizacion = $request->id_cotizacion;

        for ($count = 0; $count < count($mano); $count++) {
            $data = array(
                'mano' => $mano[$count],
                'reparacion' => $reparacion[$count],
                'mano' => $mano[$count],
                'importe' => $importe[$count],
                'id_cotizacion' => $id_cotizacion[$count],
            );
            $insert_data[] = $data;
        }

        CotizacionRemision::insert($insert_data);

        $remision = TotalRemision::where('id_cotizacion', '=', $id_cotizacion)
        ->first();
        $remision->total_cotizacion = $request->get('total_cotizacion');
        $remision->fecha_cotizacion = $request->get('fecha_cotizacion');
        $remision->save();

        Session::flash('auto', 'Se ha guardado sus datos con exito');
        return redirect()->back();
    }

    public function updateremision(Request $request, $id)
    {

        $remision = TotalRemision::where('id_cotizacion', '=', $id)
        ->first();
        $remision->fecha_remision = $request->get('fecha_remision');
        $remision->total_remision = $request->get('total_remision');
        $remision->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->back();
    }

    public function ChangeUserEstatus(Request $request)
    {
        $remision = CotizacionRemision::find($request->id);
        $remision->aprobacion = $request->aprobacion;
        $remision->save();

        return response()->json(['success' => 'Se cambio el estado exitosamente.']);
    }

    public function reparacion(Request $request)
    {
        $key = CotizacionRemision::find($request->id);
        $key->reparacion = $request->reparacion;
        $key->save();

        return response()->json(['success' => 'Se cambio el estado exitosamente.']);
    }

    public function mano(Request $request)
    {
        $key = CotizacionRemision::find($request->id);
        $key->mano = $request->mano;
        $key->save();

        return response()->json(['success' => 'Se cambio el estado exitosamente.']);
    }

    public function importe(Request $request)
    {
        $key = CotizacionRemision::find($request->id);
        $key->importe = $request->importe;
        $key->save();

        return response()->json(['success' => 'Se cambio el estado exitosamente.']);
    }

    public function fecha_cotizacion(Request $request)
    {
        $key = TotalRemision::find($request->id);
        $key->fecha_cotizacion = $request->fecha_cotizacion;
        $key->save();

        return response()->json(['success' => 'Se cambio el estado exitosamente.']);
    }

    public function total_cotizacion(Request $request)
    {
        $key = TotalRemision::find($request->id);
        $key->total_cotizacion = $request->total_cotizacion;
        $key->save();

        return response()->json(['success' => 'Se cambio el estado exitosamente.']);
    }

    public function pdf_cotizacion($id)
    {
        $cotizacion = CotizacionServicio::where('id_cotizacion', '=', $id)
        ->first();

        $remision  = CotizacionRemision::where('reparacion', '!=', NULL)
        ->where('id_cotizacion', '=', $cotizacion->id_cotizacion)
        ->get();

        $total_remision = TotalRemision::where('id_cotizacion', '=', $id)
        ->first();

        $pdf = \PDF::loadView('admin.cotizacion.pdf', compact('cotizacion', 'remision', 'total_remision'));
        return $pdf->download('cotizacion '.$cotizacion->id_cotizacion.'.pdf');
    }

    public function pdf_remision($id)
    {
        $cotizacion = CotizacionServicio::where('id_cotizacion', '=', $id)
        ->first();

        $remision  = CotizacionRemision::where('reparacion', '!=', NULL)
        ->where('id_cotizacion', '=', $cotizacion->id_cotizacion)
        ->where('aprobacion', '=', 1)
        ->get();

        $total_remision = TotalRemision::where('id_cotizacion', '=', $id)
        ->first();

        $pdf = \PDF::loadView('admin.cotizacion.pdf_remision', compact('cotizacion', 'remision', 'total_remision'));
        return $pdf->download('remision '.$cotizacion->id_cotizacion.'.pdf');
    }
}
