<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cotizacion;
use App\Models\Taller;
use Validator;
use DB;
use Session;

class TallerController extends Controller
{
    public function edit($id)
    {
        $taller = Taller::findOrFail($id);

        return view('admin.cotizacion.taller', compact('taller'));
    }

    public function update(Request $request, $id)
    {
        $rules = array(
            'nombre.*',
            'garantia.*',
            'marca.*',
            'proveedor.*',
            'mano_o.*',
            'costo.*',
            'costo_total.*',
            'cantidad.*',
        );
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json([
                'error' => $error->errors()->all()
            ]);
        }

        $nombre = $request->nombre;
        $marca = $request->marca;
        $garantia = $request->garantia;
        $proveedor = $request->proveedor;
        $mano_o = $request->mano_o;
        $costo = $request->costo;
        $costo_total = $request->costo_total;
        $cantidad = $request->cantidad;

        for ($count = 0; $count < count($nombre); $count++) {
            $data = array(
                'nombre' => $nombre[$count],
                'marca' => $marca[$count],
                'garantia' => $garantia[$count],
                'proveedor' => $proveedor[$count],
                'mano_o' => $mano_o[$count],
                'costo' => $costo[$count],
                'costo_total' => $costo_total[$count],
                'cantidad' => $cantidad[$count],
                'id_servicio' => $id,
            );
            $insert_data[] = $data;
        }

        Taller::insert($insert_data);

        Session::flash('auto', 'Se ha guardado sus datos con exito');
        return redirect()->route('index.cotizacion');
    }
}
