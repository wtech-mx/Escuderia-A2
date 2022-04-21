<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Key;
use DB;
use Session;

class KeyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
            $key = Key::get();

            $user = DB::table('users')
            ->where('empresa', '=', '1')
            ->where('id_sector', '=', NULL)
            ->get();

            return view('admin.key.index', compact('key', 'user'));
    }

    public function store(Request $request)
    {
        $validate = $this->validate($request, [
            'id_empresa' => 'required',
        ]);

        $key = new  Key;
        $key->id_empresa = $request->get('id_empresa');
        $key->codigo = $request->get('codigo');
        $key->estatus = $request->get('estatus');
        $key->caducidad = $request->get('caducidad');
        $key->save();

        $user_key = user::findOrFail($key->id_empresa);
        $user_key->id_key = $key->id;
        $user_key->act_key =  $key->estatus;
        $user_key->update();

        Session::flash('store', 'Se ha guardado sus datos con exito');
        return redirect()->back();
    }

    public function edit($id)
    {
            $key_update = Key::findOrFail($id);
            $user = DB::table('users')
            ->where('empresa', '=', '1')
            ->where('id_sector', '=', NULL)
            ->get();

            return view('admin.key.edit', compact('user', 'key_update'));
    }

    function update(Request $request, $id)
    {

        $validate = $this->validate($request, [
            'id_empresa' => 'required',
        ]);

        $key = Key::findOrFail($id);
        $key->id_empresa = $request->get('id_empresa');
        $key->codigo = $request->get('codigo');
        $key->caducidad = $request->get('caducidad');
        $key->update();

        Session::flash('update', 'Se ha guardado sus datos con exito');
        return redirect()->route('index.key');
    }

    public function ChangeLlave(Request $request)
    {
        $key = Key::find($request->id);
        $key->estatus = $request->estatus;
        $key->save();

        $user_key = user::findOrFail($key->id_empresa);
        $user_key->act_key =  $key->estatus;
        $user_key->update();

        return response()->json(['success' => 'Se cambio el estado exitosamente.']);
    }
}
