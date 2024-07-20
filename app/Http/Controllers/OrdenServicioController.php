<?php

namespace App\Http\Controllers;

use App\Models\OrdenComentarios;
use App\Models\OrdenEncuesta;
use App\Models\OrdenImg;
use App\Models\OrdenServicio;
use App\Models\OrdenServicioServ;
use App\Models\Talleres;
use App\Models\TallerOrden;
use App\Models\TallerServicios;
use App\Models\Automovil;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\PlantillaEnReparacion;
use App\Mail\PlantillaPendienteAutorizacion;
use App\Mail\PlantillaSolicitud;
use App\Mail\PlantillaIngreso;

class OrdenServicioController extends Controller
{
    public function index(){

        $cotizacion = OrdenServicio::orderby('id','desc')->get();

        $cliente = User::where('role', '=', '0')
        ->where('empresa', '=', 0)
        ->get();

        $servicios = TallerServicios::get();
        $comentarios = OrdenComentarios::get();
        $encuestas = OrdenEncuesta::get();

        return view('admin.taller_cotizacion.index', compact('cotizacion', 'cliente', 'servicios', 'comentarios', 'encuestas'));
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
        $taller->fecha_creacion = now();

        if ($request->hasFile("img")) {
            $ruta_recursos = public_path() . '/cotizacion/usuario'.$taller->id_user;
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
        $comentario->estatus = 'Generar la solicitud';
        $comentario->comentario = $request->get('comentario');
        $comentario->fecha = date("Y-m-d");
        $comentario->save();

        // G U A R D A R  I M G  G A L E R I A
        if ($request->hasFile('img_galeria')) {
            $ruta_recursos = public_path() . '/cotizacion/usuario' . $taller->id_user;

            foreach ($request->file('img_galeria') as $file) {
                $fileName = uniqid() . '_' . $file->getClientOriginalName();
                $file->move($ruta_recursos, $fileName);

                $tallerImagen = new OrdenImg;
                $tallerImagen->id_cotizacion = $taller->id;
                $tallerImagen->estatus = 'Generar la solicitud';
                $tallerImagen->imagen = $fileName;
                $tallerImagen->fecha = date("Y-m-d");
                $tallerImagen->save();
            }
        }

        $auto = Automovil::find($taller->current_auto);

        $datos = [
            'submarca' =>  $auto->submarca,
            'tipo' =>  $auto->tipo,
            'año' =>  $auto->año,
            'numero_serie' =>  $auto->numero_serie,
            'color' =>  $auto->color,
            'placas' =>  $auto->placas,
            'km_actual' =>  $taller->km_actual,
            'ubicacion' => $taller->ubicacion,
            'estatus' => $taller->estatus,
            'comentario' => $comentario->comentario ,
            'fecha' => $comentario->fecha,
        ];


        Mail::to('adrianwebtech@gmail.com','aldiazm.11@gmail.com')->send(new PlantillaSolicitud($datos));

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
        $fotos = OrdenImg::where('id_cotizacion', $id)->get();
        $comentarios = OrdenComentarios::where('id_cotizacion', $id)->get();

        return view('admin.taller_cotizacion.view_admin', compact('cotizacion', 'cotizacion_serivicios', 'taller', 'fotos', 'comentarios'));
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


        if (Talleres::where('telefono', $request->telefono)->exists()) {
            $taller = Talleres::where('telefono', $request->telefono)->first();
            $payer = $taller->id;
        } else {
            $taller = new Talleres;
            $taller->nombre_taller = $request->get('nombre_taller');
            $taller->encargado = $request->get('encargado');
            $taller->telefono = $request->get('telefono');
            $taller->correo = $request->get('correo');
            $taller->estado = $request->get('estado');
            $taller->delegacion = $request->get('delegacion');
            $taller->direccion = $request->get('direccion');
            $taller->save();
            $payer = Talleres::where('id', '=', $taller->id)->first();
        }

        $tallerOrden = new TallerOrden;
        $tallerOrden->id_cotizacion = $id;
        $tallerOrden->id_taller = $payer->id;
        $tallerOrden->nombre_taller = $request->get('nombre_taller');
        $tallerOrden->encargado = $request->get('encargado');
        $tallerOrden->telefono = $request->get('telefono');
        $tallerOrden->correo = $request->get('correo');
        $tallerOrden->direccion = $request->get('direccion');
        $tallerOrden->fecha = date('Y-m-d');
        $tallerOrden->save();

        $cotizacion = OrdenServicio::findOrFail($id);
        $cotizacion->estatus = 'Pendiente de ingreso a taller';
        $cotizacion->fecha_asignacion_taller = now();
        $cotizacion->update();

        $encuesta = new OrdenEncuesta;
        $encuesta->id_cotizacion = $cotizacion->id;
        $encuesta->id_taller = $payer->id;
        $encuesta->save();

        // G U A R D A R  C O M E N T A R I O
        if($request->get('comentario') != NULL){
            $comentario = new OrdenComentarios;
            $comentario->id_cotizacion = $cotizacion->id;
            $comentario->estatus = 'Pendiente de asignar taller';
            $comentario->comentario = $request->get('comentario');
            $comentario->fecha = date("Y-m-d");
            $comentario->save();
        }


        $auto = Automovil::find($request->get('auto_id'));
        $userEmpresa = User::find($request->get('userbussines'));

        $datos = [
            'submarca' =>  $auto->submarca,
            'tipo' =>  $auto->tipo,
            'año' =>  $auto->año,
            'numero_serie' =>  $auto->numero_serie,
            'color' =>  $auto->color,
            'placas' =>  $auto->placas,
            'nombre_taller' => $tallerOrden->nombre_taller,
            'encargado' => $tallerOrden->encargado,
            'telefono' => $tallerOrden->telefono,
            'direccion' => $tallerOrden->direccion,
            'correo' => $tallerOrden->correo,
            'fecha' => $tallerOrden->fecha,
            'estatus' => $cotizacion->estatus,
            'comentario' => $comentario->comentario ,
            'fecha' => $comentario->fecha,
        ];

        Mail::to($request->get('correo'),'aldiazm.11@gmail.com',$userEmpresa->email)->send(new PlantillaPendienteAutorizacion($datos));

        Session::flash('success', 'Se ha actualizado sus datos con exito');
        return redirect()->back();
    }

    public function ingreso(Request $request, $id)
    {

        if($request->get('fecha_ingreso') != NULL){
            $cotizacion = OrdenServicio::findOrFail($id);
            $cotizacion->fecha_ingreso_taller = $request->get('fecha_ingreso') . ' ' . $request->get('hora_ingreso');
            $cotizacion->estatus = 'En espera de cotizacion';
            $cotizacion->km_taller = $request->get('km_taller');
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
        }else if($request->get('fecha_cot') != NULL){
            $cotizacion = OrdenServicio::findOrFail($id);
            $cotizacion->fecha_cotizacion = $request->get('fecha_cot') . ' ' . $request->get('hora_cot');
            $cotizacion->estatus = 'Pendiente de autorización';
            $cotizacion->update();

            // G U A R D A R  C O M E N T A R I O
            if($request->get('comentario_cot') != NULL){
                $comentario = new OrdenComentarios;
                $comentario->id_cotizacion = $cotizacion->id;
                $comentario->estatus = 'En espera de cotizacion';
                $comentario->comentario = $request->get('comentario_cot');
                $comentario->fecha = date("Y-m-d");
                $comentario->save();
            }
        }else if($request->get('fecha_rep') != NULL){
            $cotizacion = OrdenServicio::findOrFail($id);
            $cotizacion->fecha_reparado = $request->get('fecha_rep') . ' ' . $request->get('hora_rep');
            $cotizacion->estatus = 'Por entregar usuario';
            $cotizacion->update();

            // G U A R D A R  C O M E N T A R I O
            if($request->get('comentario_rep') != NULL){
                $comentario = new OrdenComentarios;
                $comentario->id_cotizacion = $cotizacion->id;
                $comentario->estatus = 'En reparacion';
                $comentario->comentario = $request->get('comentario_rep');
                $comentario->fecha = date("Y-m-d");
                $comentario->save();
            }

            // G U A R D A R  I M G  G A L E R I A
            if ($request->hasFile('galeria_rep')) {
                $ruta_recursos = public_path() . '/cotizacion/usuario' . $cotizacion->id_user;

                foreach ($request->file('galeria_rep') as $file) {
                    $fileName = uniqid() . '_' . $file->getClientOriginalName();
                    $file->move($ruta_recursos, $fileName);

                    $tallerImagen = new OrdenImg;
                    $tallerImagen->id_cotizacion = $cotizacion->id;
                    $tallerImagen->estatus = 'En reparacion';
                    $tallerImagen->imagen = $fileName;
                    $tallerImagen->fecha = date("Y-m-d");
                    $tallerImagen->save();
                }
            }
        }else if($request->get('fecha_entrega') != NULL){
            $cotizacion = OrdenServicio::findOrFail($id);
            $cotizacion->fecha_entregado = $request->get('fecha_entrega') . ' ' . $request->get('hora_entrega');
            $cotizacion->estatus = 'Por cargar factura';
            $cotizacion->km_entrega = $request->get('km_entrega');
            $cotizacion->update();

            // G U A R D A R  C O M E N T A R I O
            if($request->get('comentario_entrega') != NULL){
                $comentario = new OrdenComentarios;
                $comentario->id_cotizacion = $cotizacion->id;
                $comentario->estatus = 'Por entregar usuario';
                $comentario->comentario = $request->get('comentario_entrega');
                $comentario->fecha = date("Y-m-d");
                $comentario->save();
            }

            // G U A R D A R  I M G  G A L E R I A
            if ($request->hasFile('galeria_entrega')) {
                $ruta_recursos = public_path() . '/cotizacion/usuario' . $cotizacion->id_user;

                foreach ($request->file('galeria_entrega') as $file) {
                    $fileName = uniqid() . '_' . $file->getClientOriginalName();
                    $file->move($ruta_recursos, $fileName);

                    $tallerImagen = new OrdenImg;
                    $tallerImagen->id_cotizacion = $cotizacion->id;
                    $tallerImagen->estatus = 'Encuesta';
                    $tallerImagen->imagen = $fileName;
                    $tallerImagen->fecha = date("Y-m-d");
                    $tallerImagen->save();
                }
            }

            if ($request->hasFile('galeria_entrega_ine')) {
                $ruta_recursos = public_path() . '/cotizacion/usuario' . $cotizacion->id_user;

                foreach ($request->file('galeria_entrega_ine') as $file) {
                    $fileName = uniqid() . '_' . $file->getClientOriginalName();
                    $file->move($ruta_recursos, $fileName);

                    $tallerImagen = new OrdenImg;
                    $tallerImagen->id_cotizacion = $cotizacion->id;
                    $tallerImagen->estatus = 'INE';
                    $tallerImagen->imagen = $fileName;
                    $tallerImagen->fecha = date("Y-m-d");
                    $tallerImagen->save();
                }
            }
        }else if($request->file('factura') != NULL){
            $cotizacion = OrdenServicio::findOrFail($id);
            $cotizacion->fecha_factura = date("Y-m-d H:i:s");
            $cotizacion->estatus = 'Por pagar';
            $cotizacion->update();

            // G U A R D A R  C O M E N T A R I O
            if($request->get('comentario_factura') != NULL){
                $comentario = new OrdenComentarios;
                $comentario->id_cotizacion = $cotizacion->id;
                $comentario->estatus = 'Por cargar factura';
                $comentario->comentario = $request->get('comentario_factura');
                $comentario->fecha = date("Y-m-d");
                $comentario->save();
            }

            // G U A R D A R  I M G  G A L E R I A
            if ($request->hasFile('factura')) {
                $ruta_recursos = public_path() . '/cotizacion/usuario' . $cotizacion->id_user;

                foreach ($request->file('factura') as $file) {
                    $fileName = uniqid() . '_' . $file->getClientOriginalName();
                    $file->move($ruta_recursos, $fileName);

                    $tallerImagen = new OrdenImg;
                    $tallerImagen->id_cotizacion = $cotizacion->id;
                    $tallerImagen->estatus = 'Por cargar factura';
                    $tallerImagen->imagen = $fileName;
                    $tallerImagen->fecha = date("Y-m-d");
                    $tallerImagen->save();
                }
            }
        }else if($request->file('por_pagar') != NULL){
            $cotizacion = OrdenServicio::findOrFail($id);
            $cotizacion->fecha_pagado = $request->get('fecha_por_pagar') . ' ' . $request->get('hora_por_pagar');;
            $cotizacion->estatus = 'Pagado';
            $cotizacion->update();

            // G U A R D A R  C O M E N T A R I O
            if($request->get('comentario_por_pagar') != NULL){
                $comentario = new OrdenComentarios;
                $comentario->id_cotizacion = $cotizacion->id;
                $comentario->estatus = 'Por pagar';
                $comentario->comentario = $request->get('comentario_por_pagar');
                $comentario->fecha = date("Y-m-d");
                $comentario->save();
            }

            // G U A R D A R  I M G  G A L E R I A
            if ($request->hasFile('por_pagar')) {
                $ruta_recursos = public_path() . '/cotizacion/usuario' . $cotizacion->id_user;

                foreach ($request->file('por_pagar') as $file) {
                    $fileName = uniqid() . '_' . $file->getClientOriginalName();
                    $file->move($ruta_recursos, $fileName);

                    $tallerImagen = new OrdenImg;
                    $tallerImagen->id_cotizacion = $cotizacion->id;
                    $tallerImagen->estatus = 'Por pagar';
                    $tallerImagen->imagen = $fileName;
                    $tallerImagen->fecha = date("Y-m-d");
                    $tallerImagen->save();
                }
            }
        }

        $auto = Automovil::find($request->get('auto_id'));
        $userEmpresa = User::find($request->get('userbussines'));

        $datos = [
            'submarca' =>  $auto->submarca,
            'tipo' =>  $auto->tipo,
            'año' =>  $auto->año,
            'numero_serie' =>  $auto->numero_serie,
            'color' =>  $auto->color,
            'placas' =>  $auto->placas,
            'comentario_admin' => $request->get('comentario'),
            'hora_ingreso' => $request->get('hora_ingreso'),
            'fecha_cot' => $request->get('fecha_cot'),
            'km_taller' => $request->get('km_taller'),

        ];

        Mail::to('aldiazm.11@gmail.com',$userEmpresa->email)->send(new PlantillaIngreso($datos));


        Session::flash('success', 'Se ha actualizado sus datos con exito');
        return redirect()->back();
    }

    public function edit_cot_taller(Request $request, $id)
    {
        $cotizacion = OrdenServicio::findOrFail($id);
        $cotizacion->estatus = 'En reparacion';
        $cotizacion->total = $request->get('total_cot');
        $cotizacion->total_iva = $request->get('total_iva_cot');
        $cotizacion->fecha_autorizada = now();

        if ($request->hasFile("cotizaion_cot")) {
            $ruta_recursos = public_path() . '/cotizacion/usuario' . $cotizacion->id_user;
            $file = $request->file('cotizaion_cot');
            $path = $ruta_recursos;
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($path, $fileName);
            $cotizacion->cotizacion_taller = $fileName;
        }
        $cotizacion->update();

        // G U A R D A R  S E R V I C I O S
        $id_servicio = $request->get('servicios_cot');
        $subtotal = $request->get('precio_cot');

        $insert_data = [];
        for ($count = 0; $count < count($id_servicio); $count++) {
            $data = array(
                'id_cotizacion' => $cotizacion->id,
                'id_servicio' => $id_servicio[$count],
                'subtotal' => $subtotal[$count],
            );
            $insert_data[] = $data;
        }

        OrdenServicioServ::insert($insert_data);

        // G U A R D A R  C O M E N T A R I O
        if($request->get('comentario') != NULL){
            $comentario = new OrdenComentarios;
            $comentario->id_cotizacion = $cotizacion->id;
            $comentario->estatus = 'Pendiente de autorización';
            $comentario->comentario = $request->get('comentario');
            $comentario->fecha = date("Y-m-d");
            $comentario->save();
        }

        // G U A R D A R  I M G  G A L E R I A
        if ($request->hasFile('galeria_cot')) {
            $ruta_recursos = public_path() . '/cotizacion/usuario' . $cotizacion->id_user;

            foreach ($request->file('galeria_cot') as $file) {
                $fileName = uniqid() . '_' . $file->getClientOriginalName();
                $file->move($ruta_recursos, $fileName);

                $tallerImagen = new OrdenImg;
                $tallerImagen->id_cotizacion = $cotizacion->id;
                $tallerImagen->estatus = 'Pendiente de autorización';
                $tallerImagen->imagen = $fileName;
                $tallerImagen->fecha = date("Y-m-d");
                $tallerImagen->save();
            }
        }

        Session::flash('success', 'Se ha actualizado sus datos con exito');
        return redirect()->back();
    }

    public function encuesta($id){
        $encuesta = OrdenEncuesta::where('id', $id)->first();

        return view('admin.taller_cotizacion.encuesta', compact('encuesta'));
    }

    public function update_encuesta(Request $request, $id)
    {
        $encuesta = OrdenEncuesta::findOrFail($id);
        $encuesta->pregunta_1 = $request->get('pregunta_1');
        $encuesta->pregunta_2 = $request->get('pregunta_2');
        $encuesta->pregunta_3 = $request->get('pregunta_3');
        $encuesta->pregunta_4 = $request->get('pregunta_4');
        $encuesta->pregunta_5 = $request->get('pregunta_5');
        $encuesta->pregunta_6 = $request->get('pregunta_6');
        $encuesta->fecha = date('Y-m-d');
        $encuesta->update();

        Session::flash('success', 'Se ha registrado sus datos con exito');
        return redirect()->back();
    }


}
