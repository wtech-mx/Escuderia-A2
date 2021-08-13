<?php

namespace App\Http\Controllers;

use App\Models\Cotizacion;
use App\Models\CotizacionServicio;
use Illuminate\Http\Request;
use DB;
use Session;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cotizacion = Cotizacion::get();

        $user = DB::table('users')
            ->where('role', '=', '0')
            ->get();

        return view('admin.cotizacion.view', compact('cotizacion', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = DB::table('users')
            ->where('role', '=', '0')
            ->where('empresa', '=', '0')
            ->get();

        $empresa = DB::table('users')
            ->where('empresa', '=', '1')
            ->get();

        return view('admin.cotizacion.create', compact('user', 'empresa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cotizacion = new Cotizacion;
        $cotizacion->id_user = $request->get('id_user');
        $cotizacion->id_empresa = $request->get('id_empresa');
        $cotizacion->user = $request->get('user');
        $cotizacion->empresa = $request->get('empresa');
        $cotizacion->telefono = $request->get('telefono');
        $cotizacion->correo = $request->get('correo');
        $cotizacion->total = $request->get('total');
        $cotizacion->save();

        $servicio = $request->servicio;
        $pieza = $request->pieza;
        $cantidad = $request->cantidad;
        $mano_o = $request->mano_o;

        for ($count = 0; $count < count($servicio); $count++) {
            $data = array(
                'servicio' => $servicio[$count],
                'pieza' => $pieza[$count],
                'cantidad' => $cantidad[$count],
                'mano_o' => $mano_o[$count],
                'id_cotizacion' => $cotizacion->id,
            );
            $insert_data[] = $data;
        }

        CotizacionServicio::insert($insert_data);


        Session::flash('auto', 'Se ha guardado sus datos con exito');
        return redirect()->route('index.cotizacion', compact('cotizacion'));
    }

    public function imprimir($id)
    {
        $cotizacions = CotizacionServicio::
        where('id_cotizacion', '=', $id)
        ->get();
        $cotizacion = Cotizacion::findOrFail($id);
        $pdf = \PDF::loadView('pdf-cotizacion', compact('cotizacions', 'cotizacion'));
        return $pdf->download('cotizacion_'. $cotizacion->id .'.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Cotizacion $cotizacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cotizacion $cotizacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cotizacion $cotizacion)
    {
        //
    }
}
