<?php

namespace App\Http\Controllers;

use App\Models\TallerServicios;
use Illuminate\Http\Request;
use Session;

class TallerServiciosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $servicios = TallerServicios::get();

        return view('admin.taller_servicios.index', compact('servicios'));
    }

    public function store(Request $request)
    {
        $validate = $this->validate($request, [
            'servicio' => 'required|string|max:191',
            'precio' => 'required',
        ]);

        $user = new TallerServicios;
        $user->servicio = $request->get('servicio');
        $user->precio = $request->get('precio');
        $user->save();

        Session::flash('success', 'Se ha actualizado sus datos con exito');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $validate = $this->validate($request, [
            'servicio' => 'required|string|max:191',
            'precio' => 'required',
        ]);

        $user = TallerServicios::findOrFail($id);
        $user->servicio = $request->get('servicio');
        $user->precio = $request->get('precio');
        $user->update();

        Session::flash('success', 'Se ha actualizado sus datos con exito');
        return redirect()->back();
    }
}
