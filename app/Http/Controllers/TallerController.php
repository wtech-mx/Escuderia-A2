<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CotizacionServicio;
use App\Models\Taller;
use Validator;
use DB;
use Session;

class TallerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function edit($id)
    {
        $cotizacion = CotizacionServicio::where('id_taller', '=', $id)
            ->first();

        $taller  = Taller::where('id_cotizacion', '=', $cotizacion->id_cotizacion)
            ->where('vendedor', '!=', NULL)
            ->get();

        return view('admin.cotizacion.taller', compact('cotizacion', 'taller'));
    }

    public function update(Request $request)
    {
        $rules = array(
            'vendedor.*',
            'refaccion.*',
            'mano_obra.*',
            'importe_unitario.*',
            'importe_total.*',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json([
                'error' => $error->errors()->all()
            ]);
        }

        $vendedor = $request->vendedor;
        $refaccion = $request->refaccion;
        $mano_obra = $request->mano_obra;
        $importe_unitario = $request->importe_unitario;
        $importe_total = $request->importe_total;
        $id_cotizacion = $request->id_cotizacion;

        for ($count = 0; $count < count($vendedor); $count++) {
            $data = array(
                'vendedor' => $vendedor[$count],
                'refaccion' => $refaccion[$count],
                'mano_obra' => $mano_obra[$count],
                'importe_unitario' => $importe_unitario[$count],
                'importe_total' => $importe_total[$count],
                'id_cotizacion' => $id_cotizacion[$count],
            );
            $insert_data[] = $data;
        }

        Taller::insert($insert_data);

        Session::flash('auto', 'Se ha guardado sus datos con exito');
        return redirect()->back();
    }

    public function pdf($id)
    {
        $cotizacion = CotizacionServicio::where('id_taller', '=', $id)
        ->first();

        $taller  = Taller::where('vendedor', '!=', NULL)
        ->where('id_cotizacion', '=', $cotizacion->id_cotizacion)
        ->get();

        $importe_unitario  = Taller::where('vendedor', '!=', NULL)
        ->where('id_cotizacion', '=', $cotizacion->id_cotizacion)
        ->sum('importe_unitario');

        $importe_total  = Taller::where('vendedor', '!=', NULL)
        ->where('id_cotizacion', '=', $cotizacion->id_cotizacion)
        ->sum('importe_total');

        $pdf = \PDF::loadView('admin.cotizacion.pdf', compact('cotizacion', 'taller', 'importe_unitario', 'importe_total'));
        return $pdf->download('pdf.pdf');
    }

    public function up(Request $request)
    {
        $key = Taller::find($request->id);
        $key->vendedor = $request->vendedor;
        $key->save();

        return response()->json(['success' => 'Se cambio el estado exitosamente.']);
    }

    public function refaccion(Request $request)
    {
        $key = Taller::find($request->id);
        $key->refaccion = $request->refaccion;
        $key->save();

        return response()->json(['success' => 'Se cambio el estado exitosamente.']);
    }

    public function mano_obra(Request $request)
    {
        $key = Taller::find($request->id);
        $key->mano_obra = $request->mano_obra;
        $key->save();

        return response()->json(['success' => 'Se cambio el estado exitosamente.']);
    }

    public function importe_unitario(Request $request)
    {
        $key = Taller::find($request->id);
        $key->importe_unitario = $request->importe_unitario;
        $key->save();

        return response()->json(['success' => 'Se cambio el estado exitosamente.']);
    }

    public function importe_total(Request $request)
    {
        $key = Taller::find($request->id);
        $key->importe_total = $request->importe_total;
        $key->save();

        return response()->json(['success' => 'Se cambio el estado exitosamente.']);
    }

    public function ChangeUserStatus(Request $request)
    {
        $remision = Taller::find($request->id);
        $remision->estado = $request->estado;
        $remision->save();

        return response()->json(['success' => 'Se cambio el estado exitosamente.']);
    }
}
