<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notas;
use DB;
use Session;
use Redirect;

class NotasContoller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('pagespeed');
    }


    public function index(Request $request)
    {
        if (auth()->user()->role != 1) {
            return view('errors.403');
        } else {
            $nombre = $request->get('nombre');

            $notas = Notas::nombre($nombre)->get();
            $users = User::orderBy('name')->get();

            return view('admin.notas.index', compact('notas', 'users'));
        }
    }

    public function create()
    {
        if (auth()->user()->role != 1) {
            return view('errors.403');
        } else {
            $user = DB::table('users')
                ->orderBy('name')
                ->where('role', '=', '0')
                ->get();

            return view('admin.notas.create', compact('user'));
        }
    }

    public function store(Request $request)
    {

        $validate = $this->validate($request, [
            'nota' => 'required|max:500',
        ]);

        $notas = new  Notas;
        $notas->id_user = $request->get('id_user');
        $notas->nota = $request->get('nota');
        $notas->save();

        Session::flash('store', 'Se ha guardado sus datos con exito');
        return redirect()->back();
    }

    public function edit($id)
    {
        if (auth()->user()->role != 1) {
            return view('errors.403');
        } else {
            $nota = Notas::findOrFail($id);
            $user = DB::table('users')
                ->where('role', '=', '0')
                ->get();

            return view('admin.notas.update', compact('user', 'nota'));
        }
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

    public function destroy(Notas $id)
    {

        $id->delete();
        Session::flash('destroy', 'Se ha guardado sus datos con exito');
        return redirect()->back();

    }

}
