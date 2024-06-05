<?php

namespace App\Http\Controllers;

use App\Models\OrdenComentarios;
use App\Models\OrdenImg;
use App\Models\OrdenServicio;
use App\Models\OrdenServicioServ;
use App\Models\TallerOrden;
use App\Models\TallerServicios;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Session;

class OrdenServicioController extends Controller
{
    public function index(){
        $cotizacion = OrdenServicio::get();
        $cliente = User::where('role', '=', '0')
        ->where('empresa', '=', 0)
        ->get();
        $servicios = TallerServicios::get();
        $comentarios = OrdenComentarios::get();

        return view('admin.taller_cotizacion.index', compact('cotizacion', 'cliente', 'servicios', 'comentarios'));
    }

    public function store(Request $request)
    {

        $taller = new OrdenServicio;
        $taller->id_user = auth()->user()->id;
        $taller->current_auto = $request->get('current_auto');
        $taller->km_actual = $request->get('km_actual');
        $taller->ubicacion = $request->get('ubicacion');
        $taller->titulo_img = $request->get('titulo_img');
        $taller->estatus = 'Pendiente de asignar taller';
        $taller->fecha_creacion = date("Y-m-d");

        if ($request->hasFile("img")) {
            $ruta_recursos = public_path() . '/cotizacion/usuario'.$request->get('id_user');
            $file = $request->file('img');
            $path = $ruta_recursos;
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $taller->img = $fileName;
        }

        $taller->save();

        // G U A R D A R  C O M E N T A R I O
        $comentario = new OrdenComentarios;
        $comentario->id_cotizacion = $taller->id;
        $comentario->estatus = 'Pendiente de asignar taller';
        $comentario->comentario = $request->get('comentario');
        $comentario->fecha = date("Y-m-d");
        $comentario->save();

        // G U A R D A R  I M G  G A L E R I A
        if ($request->hasFile('img_galeria')) {
            $ruta_recursos = public_path() . '/cotizacion/usuario' . $request->get('id_user');

            foreach ($request->file('img_galeria') as $file) {
                $fileName = uniqid() . '_' . $file->getClientOriginalName();
                $file->move($ruta_recursos, $fileName);

                $tallerImagen = new OrdenImg;
                $tallerImagen->id_cotizacion = $taller->id;
                $tallerImagen->estatus = 'Pendiente de asignar taller';
                $tallerImagen->imagen = $fileName;
                $tallerImagen->fecha = date("Y-m-d");
                $tallerImagen->save();
            }
        }


        Session::flash('success', 'Se ha guardado su orden con exito');
        return redirect()->back();
    }

    public function view($id){
        $cotizacion = OrdenServicio::where('id', $id)->first();
        $cotizacion_serivicios = OrdenServicioServ::where('id_cotizacion', $id)->get();

        return view('admin.taller_cotizacion.view', compact('cotizacion', 'cotizacion_serivicios'));
    }

    public function view_admin($id){
        $cotizacion = OrdenServicio::where('id', $id)->first();
        $cotizacion_serivicios = OrdenServicioServ::where('id_cotizacion', $id)->get();
        $taller = TallerOrden::where('id_cotizacion', $id)->first();

        return view('admin.taller_cotizacion.view_admin', compact('cotizacion', 'cotizacion_serivicios', 'taller'));
    }

    public function update_estatus(Request $request, $id)
    {
        $cotizacion = OrdenServicio::findOrFail($id);
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
            $cotizacion->fecha_por_pagar = date('Y-m-d');
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

        $cotizacion = OrdenServicio::findOrFail($id);
        $cotizacion->estatus = 'Pendiente de ingreso a taller';
        $cotizacion->fecha_asignacion_taller = date('Y-m-d');
        $cotizacion->update();

        // G U A R D A R  C O M E N T A R I O
        if($request->get('comentario') != NULL){
            $comentario = new OrdenComentarios;
            $comentario->id_cotizacion = $cotizacion->id;
            $comentario->estatus = 'Pendiente de ingreso a taller';
            $comentario->comentario = $request->get('comentario');
            $comentario->fecha = date("Y-m-d");
            $comentario->save();
        }

        Session::flash('success', 'Se ha actualizado sus datos con exito');
        return redirect()->back();
    }
}
