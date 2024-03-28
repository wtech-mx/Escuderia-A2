<?php

namespace App\Http\Controllers;

use App\Models\TallerCotizacion;
use App\Models\TallerCotServicios;
use App\Models\TallerOrden;
use App\Models\TallerServicios;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Session;

class TallerCotizacionController extends Controller
{
    public function index(){
        $cotizacion = TallerCotizacion::get();
        $cliente = User::where('role', '=', '0')
        ->where('empresa', '=', 0)
        ->get();
        $servicios = TallerServicios::get();

        return view('admin.taller_cotizacion.index', compact('cotizacion', 'cliente', 'servicios'));
    }

    /* Trae los automoviles con el user seleccionado  */
    public function GetAutoAgainstMainCatEdit($id)
    {
        echo json_encode(DB::table('automovil')->where('id_user', $id)->get());
    }

    public function store(Request $request)
    {
        $validate = $this->validate($request, [
            'id_user' => 'required',
            'current_auto_cot' => 'required',
        ]);

        $taller = new TallerCotizacion;
        $taller->id_user = $request->get('id_user');
        $taller->current_auto = $request->get('current_auto_cot');
        $taller->importe_sin = $request->get('importe_sin');
        $taller->importe_con = $request->get('importe_con');
        $taller->comentarios = $request->get('comentarios');
        $taller->estatus = 'Cotizacion';
        $taller->fecha_creacion = date('Y-m-d');

        if ($request->hasFile("foto1")) {
            $ruta_recursos = public_path() . '/cotizacion/usuario'.$request->get('id_user');
            $file = $request->file('foto1');
            $path = $ruta_recursos;
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $taller->foto1 = $fileName;
        }

        if ($request->hasFile("foto2")) {
            $ruta_recursos = public_path() . '/cotizacion/usuario'.$request->get('id_user');
            $file = $request->file('foto2');
            $path = $ruta_recursos;
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $taller->foto2 = $fileName;
        }

        if ($request->hasFile("foto3")) {
            $ruta_recursos = public_path() . '/cotizacion/usuario'.$request->get('id_user');
            $file = $request->file('foto3');
            $path = $ruta_recursos;
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $taller->foto3 = $fileName;
        }

        if ($request->hasFile("foto4")) {
            $ruta_recursos = public_path() . '/cotizacion/usuario'.$request->get('id_user');
            $file = $request->file('foto4');
            $path = $ruta_recursos;
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $taller->foto4 = $fileName;
        }
        $taller->save();

        // G U A R D A R  S E R V I C I O S
        $id_servicio = $request->get('servicios_cot');

        for ($count = 0; $count < count($id_servicio); $count++) {
            $servicios = 0;
            $servicios = TallerServicios::where('id', '=', $id_servicio)->first();
            $data = array(
                'id_cotizacion' => $taller->id,
                'id_servicio' => $id_servicio[$count],
                'subtotal' => $servicios->precio,
            );
            $insert_data[] = $data;
        }

        TallerCotServicios::insert($insert_data);

        Session::flash('success', 'Se ha actualizado sus datos con exito');
        return redirect()->back();
    }

    public function view($id){
        $cotizacion = TallerCotizacion::where('id', $id)->first();
        $cotizacion_serivicios = TallerCotServicios::where('id_cotizacion', $id)->get();

        return view('admin.taller_cotizacion.view', compact('cotizacion', 'cotizacion_serivicios'));
    }

    public function update_estatus(Request $request, $id)
    {
        $cotizacion = TallerCotizacion::findOrFail($id);
        $cotizacion->estatus = $request->get('estatus');
        if($request->get('estatus') == 'Autorizada Cotizacion'){
            $cotizacion->fecha_atorizacion = date('Y-m-d');
        }else if($request->get('estatus') == 'En reparacion'){
            $cotizacion->fecha_reparacion = date('Y-m-d');
        }else if($request->get('estatus') == 'Por entregar usuario'){
            $cotizacion->fecha_entregar = date('Y-m-d');
        }else if($request->get('estatus') == 'Por cargar factura'){
            $cotizacion->fecha_factura = date('Y-m-d');
        }else if($request->get('estatus') == 'Por pagar'){
            $cotizacion->fecha_pagado = date('Y-m-d');
        }else if($request->get('estatus') == 'Pagado'){
            $cotizacion->fecha_pagado = date('Y-m-d');
        }
        $cotizacion->update();

        Session::flash('success', 'Se ha actualizado sus datos con exito');
        return redirect()->back();
    }

    public function store_taller(Request $request, $id)
    {
        $cotizacion = new TallerOrden;
        $cotizacion->id_cotizacion = $id;
        $cotizacion->nombre_taller = $request->get('nombre_taller');
        $cotizacion->encargado = $request->get('encargado');
        $cotizacion->telefono = $request->get('telefono');
        $cotizacion->correo = $request->get('correo');
        $cotizacion->direccion = $request->get('direccion');
        $cotizacion->fecha = date('Y-m-d');
        $cotizacion->save();

        Session::flash('success', 'Se ha actualizado sus datos con exito');
        return redirect()->back();
    }
}
