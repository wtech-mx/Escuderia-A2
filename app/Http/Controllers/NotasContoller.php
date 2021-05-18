<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notas;
use Session;

class NotasContoller extends Controller
{
    public function index()
    {
        if (auth()->user()->role != 1) {
            return view('errors.403');
        } else {
            $notas = Notas::get();

            return view('admin.notas.index', compact('notas'));
        }
    }

    public function create()
    {
        if (auth()->user()->role != 1) {
            return view('errors.403');
        } else {
            $user = DB::table('users')
                ->where('role', '=', '0')
                ->get();

            return view('admin.notas.create', compact('user'));
        }
    }

    public function store(Request $request)
    {

        $validate = $this->validate($request, [
            'nota' => 'required|max:191',
        ]);

        $notas = new  Notas;
        $notas->id_user = $request->get('id_user');
        $notas->nota = $request->get('nota');
        $notas->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->back();
    }
}
