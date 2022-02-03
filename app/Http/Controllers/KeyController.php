<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Key;
use DB;
use Session;

class KeyController extends Controller
{

    public function index(Request $request)
    {
            $key = Key::get();

            return view('admin.key.index', compact('key'));
    }

    public function create()
    {
            $user = DB::table('users')
                ->orderBy('name')
                ->where('role', '=', '0')
                ->get();

            return view('admin.notas.create', compact('user'));

    }

    public function store(Request $request)
    {

        $validate = $this->validate($request, [
            'nota' => 'required|max:500',
        ]);

        $notas = new  Notas;
        $notas->id_user = $request->get('id_user');
        $notas->nota = $request->get('nota');
        $notas->usuario = auth()->user()->id;
        $notas->save();

        Session::flash('store', 'Se ha guardado sus datos con exito');
        return redirect()->back();
    }

    public function edit($id)
    {
            $nota = Notas::findOrFail($id);
            $user = DB::table('users')
                ->where('role', '=', '0')
                ->get();

            return view('admin.notas.update', compact('user', 'nota'));
    }

    function update(Request $request, $id)
    {

        $validate = $this->validate($request, [
            'nota' => 'required|max:500',
        ]);

        $nota = Notas::findOrFail($id);
        $nota->id_user = $request->get('id_user');
        $nota->nota = $request->get('nota');

        $nota->update();

        Session::flash('update', 'Se ha guardado sus datos con exito');
        return redirect()->back();
    }

    public function ChangeEmpresasStatus(Request $request)
    {
        $remision = CotizacionRemision::find($request->id);
        $remision->aprobacion = $request->aprobacion;
        $remision->save();

        return response()->json(['success' => 'Se cambio el estado exitosamente.']);
    }
}
