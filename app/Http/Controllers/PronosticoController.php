<?php

namespace App\Http\Controllers;

use App\Models\Pronostico;
use App\Models\Automovil;

use Illuminate\Http\Request;
use DB;
use Session;

class PronosticoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            ->get();

        return view('admin.pronostico', compact('user'));
    }

    public function create_tc()
    {
        $user = DB::table('users')
            ->where('role', '=', '0')
            ->get();

        return view('admin.pronostico_tc', compact('user'));
    }

    /* Trae los automoviles con el user seleccionado  */
    public function GetSubCatAgainstMainCatEdit($id)
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

        $alert = new Pronostico;
        $alert->id_user = $request->get('id_user');
        $alert->id_empresa = $request->get('id_empresa');
        $alert->servicio = $request->get('servicio');
        $alert->current_auto = $request->get('current_auto');
        $alert->title = 'Pronostico ' . $alert->servicio;
        $alert->descripcion = 'Pronostico para el automovil '. $request->get('current_auto') . ': ' . $request->get('descripcion');
        $alert->start = $request->get('end');
        $alert->end = $request->get('end');
        $alert->color = '#1eb0ea';
        $alert->image = $request->get('image');
        $alert->estatus = 0;
        $alert->check = 0;

        $alert->save();

        Session::flash('succes', 'Se ha guardado con exito');

        return redirect()->back();
    }

    public function store_tc(Request $request)
    {


        $alert = new Pronostico;
        $alert->id_user = $request->get('id_user');
        $alert->id_empresa = $request->get('id_empresa');
        $alert->current_auto = $request->get('current_auto');
        $alert->title = $request->get('current_auto');
        $alert->descripcion = 'Pronostico'. $request->get('current_auto') . ': ' . $request->get('descripcion');
        $alert->start = $request->get('end');
        $alert->end = $request->get('end');
        $alert->color = '#e57a16';
        $alert->image = $request->get('image');
        $alert->estatus = 0;
        $alert->check = 0;

        $alert->save();

        Session::flash('success', 'Se ha guardado con exito');

        return redirect()->route('index.dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pronostico  $pronostico
     * @return \Illuminate\Http\Response
     */
    public function show(Pronostico $pronostico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pronostico  $pronostico
     * @return \Illuminate\Http\Response
     */
    public function edit(Pronostico $pronostico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pronostico  $pronostico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pronostico $pronostico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pronostico  $pronostico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pronostico $pronostico)
    {
        //
    }
}
