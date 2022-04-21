<?php

namespace App\Http\Controllers;

use App\Models\Cotizacion;
use App\Models\CotizacionServicio;
use App\Models\CotizacionRemision;
use App\Models\TotalRemision;
use App\Models\CotizacionDiagnostico;
use App\Models\Taller;
use Illuminate\Http\Request;
use DB;
use Session;

class CotizacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cotizacion = Cotizacion::get();
        $cotizacion_servicio = CotizacionServicio::get();

        $user = DB::table('users')
            ->where('role', '=', '0')
            ->get();

        return view('admin.cotizacion.view', compact('cotizacion', 'user', 'cotizacion_servicio'));
    }

    public function index_user($id)
    {
        $cotizacion = CotizacionServicio::where('id_taller', '=', $id)
            ->first();

        $taller  = Taller::where('id_cotizacion', '=', $cotizacion->id_cotizacion)
            ->where('vendedor', '!=', NULL)
            ->get();

        return view('admin.cotizacion.cotizacion_user', compact('taller'));
    }

    public function videos($id)
    {
        $cotizacion = Cotizacion::where('id', '=', $id)
        ->first();

        return view('admin.cotizacion.videos', compact('cotizacion'));
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

        $auto = DB::table('automovil')
            ->get();

        return view('admin.cotizacion.create', compact('user', 'auto'));
    }

    /* Trae los automoviles con el user seleccionado  */
    public function GetAutoAgainstMainCatEdit($id)
    {
        echo json_encode(DB::table('automovil')->where('id_user', $id)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validate($request, [
            'video_motor' => 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts',
            'video_cajuela' => 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts',
            'video_exterior' => 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts',
            'video_interior' => 'mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts',
        ]);

        $cotizacion = new Cotizacion;
        $cotizacion->id_user = $request->get('id_userco');
        $cotizacion->current_auto = $request->get('current_autoco');
        $cotizacion->km = $request->get('km');
        $cotizacion->descripcion = $request->get('descripcion');
        $cotizacion->fecha = $request->get('fecha');
        $cotizacion->tarjeta = $request->get('tarjeta');
        $cotizacion->verificacion = $request->get('verificacion');
        $cotizacion->poliza = $request->get('poliza');
        $cotizacion->manuales = $request->get('manuales');
        $cotizacion->estatus = "pendiente";

        if ($request->hasFile('video_motor')) {
            $file = $request->file('video_motor');
            $file->move(public_path() . '/videos', "M" . time() . "." . $file->getClientOriginalExtension());
            $cotizacion->video_motor = "M" . time() . "." . $file->getClientOriginalExtension();
        }

        if ($request->hasFile('video_cajuela')) {
            $file = $request->file('video_cajuela');
            $file->move(public_path() . '/videos', "C" . time() . "." . $file->getClientOriginalExtension());
            $cotizacion->video_cajuela = "C" . time() . "." . $file->getClientOriginalExtension();
        }

        if ($request->hasFile('video_exterior')) {
            $file = $request->file('video_exterior');
            $file->move(public_path() . '/videos', "E" . time() . "." . $file->getClientOriginalExtension());
            $cotizacion->video_exterior = "E" . time() . "." . $file->getClientOriginalExtension();
        }

        if ($request->hasFile('video_interior')) {
            $file = $request->file('video_interior');
            $file->move(public_path() . '/videos', "I" . time() . "." . $file->getClientOriginalExtension());
            $cotizacion->video_interior = "I" . time() . "." . $file->getClientOriginalExtension();
        }

        $cotizacion->save();

        $cotizacion_taller = new Taller;
        $cotizacion_taller->id_cotizacion = $cotizacion->id;
        $cotizacion_taller->save();

        $cotizacion_servicio = new CotizacionServicio;
        $cotizacion_servicio->id_cotizacion = $cotizacion->id;
        $cotizacion_servicio->id_taller = $cotizacion_taller->id;
        $cotizacion_servicio->save();

        $cotizacion_diagnostico = new CotizacionDiagnostico;
        $cotizacion_diagnostico->id_cotizacion_servicio = $cotizacion_servicio->id;
        $cotizacion_diagnostico->save();

        $cotizacion_remision = new CotizacionRemision;
        $cotizacion_remision->id_cotizacion = $cotizacion->id;
        $cotizacion_remision->save();

        $total_remision = new TotalRemision;
        $total_remision->id_cotizacion = $cotizacion->id;
        $total_remision->save();

        Session::flash('auto', 'Se ha guardado sus datos con exito');
        return redirect()->route('index.cotizacion', compact('cotizacion'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cotizacion  $cotizacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cotizacion = Cotizacion::findOrFail($id);
        return view('admin.cotizacion.view_servicio', compact('cotizacion'));
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
