<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Image;

use App\Exports\EmpresaExport;
use Maatwebsite\Excel\Facades\Excel;

class EmpresasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('pagespeed');
    }
    /*|--------------------------------------------------------------------------
|Create Empresa Auto_Admin
|--------------------------------------------------------------------------*/
    public function create_empresa()
    {

        $user = DB::table('users')
            ->where('role', '=', '0')
            ->get();

        return view('admin.garaje.create-garaje-admin', compact('user'));
    }

    public function store_empresa(Request $request)
    {

        $validate = $this->validate($request, [
            'name' => 'required|max:191',
            'email' => 'required|string|email|max:191',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $empresa = new User;
        $empresa->name = $request->get('name');
        $empresa->empresa = 1;
        $empresa->role = 2;
        $empresa->telefono = $request->get('telefono');
        $empresa->direccion = $request->get('direccion');
        $empresa->referencia = $request->get('referencia');
        $empresa->email = $request->get('email');
        $empresa->password = Hash::make($request->password);

        if ($request->hasFile('img')) {
            $urlfoto = $request->file('img');
            $nombre = time() . "." . $urlfoto->guessExtension();
            $ruta = public_path('/img-empresa/' . $nombre);
            $compresion = Image::make($urlfoto->getRealPath())
                ->save($ruta, 10);
            $empresa->img = $compresion->basename;
        }

        $empresa->save();

        Session::flash('empresa', 'Se ha guardado sus datos con exito');
        return redirect()->route('create_admin.automovil');
    }

    /*|--------------------------------------------------------------------------
|Create Empresa Admin
|--------------------------------------------------------------------------*/
    function index_admin()
    {
        if (auth()->user()->role != 1) {
            return view('errors.403');
        } else {
            $empresa = User::where('empresa', '=', 1)->get();

            $user = DB::table('users')
                ->where('role', '=', '0')
                ->get();


            return view('admin.empresas.view-empresas-admin', compact('empresa', 'user'));
        }
    }

    public function create_admin()
    {
        if (auth()->user()->role != 1) {
            return view('errors.403');
        } else {
            $user = DB::table('users')
                ->where('role', '=', '0')
                ->get();

            return view('admin.empresas.add-empresa-admin', compact('user'));
        }
    }

    public function store_admin(Request $request)
    {
        $validate = $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
        ]);

        $empresa = new User;
        $empresa->name = $request->get('name');
        $empresa->empresa = 1;
        $empresa->role = 2;
        $empresa->telefono = $request->get('telefono');
        $empresa->direccion = $request->get('direccion');
        $empresa->referencia = $request->get('referencia');
        $empresa->email = $request->get('email');
        $empresa->password = Hash::make($request->password);

        if ($request->hasFile('img')) {
            $urlfoto = $request->file('img');
            $nombre = time() . "." . $urlfoto->guessExtension();
            $ruta = public_path('/img-empresa/' . $nombre);
            $compresion = Image::make($urlfoto->getRealPath())
                ->save($ruta, 10);
            $empresa->img = $compresion->basename;
        }


        $empresa->save();

        Session::flash('success', 'Se ha actualizado sus datos con exito');
        return redirect()->route('index_admin.empresa');
    }

    public function edit_admin($id)
    {
        if (auth()->user()->role != 1) {
            return view('errors.403');
        } else {
            $empresa = User::findOrFail($id);

            $empresas = DB::table('user')
                ->where('empresa', '=', 1)
                ->get();

            $user = DB::table('users')
                ->where('empresa', '=', 0)
                ->get();

            return view('admin.empresas.edit-empresa-admin', compact('empresa', 'empresas', 'user'));
        }
    }

    public function update_admin(Request $request, $id)
    {
        $empresa = User::findOrFail($id);

        $empresa->name = $request->get('name');
        $empresa->telefono = $request->get('telefono');
        $empresa->direccion = $request->get('direccion');
        $empresa->referencia = $request->get('referencia');
        $empresa->email = $request->get('email');
        $empresa->password = Hash::make($request->password);

        if ($request->hasFile('img')) {
            $urlfoto = $request->file('img');
            $nombre = time() . "." . $urlfoto->guessExtension();
            $ruta = public_path('/img-empresa/' . $nombre);
            $compresion = Image::make($urlfoto->getRealPath())
                ->save($ruta, 10);
            $empresa->img = $compresion->basename;
        }

        $empresa->update();

        Session::flash('success', 'Se ha actualizado sus datos con exito');

        return redirect()->route('index_admin.empresa');
    }

    public function export()
    {
        return Excel::download(new EmpresaExport, 'empresas.xlsx');
    }
}
