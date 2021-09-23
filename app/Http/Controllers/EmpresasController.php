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
use App\Models\ModalHasRoles;

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

        $roles = DB::table('roles')
            ->get();

        return view('admin.garaje.create-garaje-admin', compact('user', 'roles'));
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
        $empresa->role = $request->get('role');
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

        $role = new ModalHasRoles;
        $role->role_id = $empresa->role;
        $role->model_type = 'App\Models\Alertas';
        $role->model_id = $empresa->id;
        $role->save();

        $role = new ModalHasRoles;
        $role->role_id = $empresa->role;
        $role->model_type = 'App\Models\Automovil';
        $role->model_id = $empresa->id;
        $role->save();

        $role = new ModalHasRoles;
        $role->role_id = $empresa->role;
        $role->model_type = 'App\Models\Cupon';
        $role->model_id = $empresa->id;
        $role->save();

        $role = new ModalHasRoles;
        $role->role_id = $empresa->role;
        $role->model_type = 'App\Models\Licencia';
        $role->model_id = $empresa->id;
        $role->save();

        $role = new ModalHasRoles;
        $role->role_id = $empresa->role;
        $role->model_type = 'App\Models\Mecanica';
        $role->model_id = $empresa->id;
        $role->save();

        $role = new ModalHasRoles;
        $role->role_id = $empresa->role;
        $role->model_type = 'App\Models\Notas';
        $role->model_id = $empresa->id;
        $role->save();

        $role = new ModalHasRoles;
        $role->role_id = $empresa->role;
        $role->model_type = 'App\Models\Role';
        $role->model_id = $empresa->id;
        $role->save();

        $role = new ModalHasRoles;
        $role->role_id = $empresa->role;
        $role->model_type = 'App\Models\Seguros';
        $role->model_id = $empresa->id;
        $role->save();

        $role = new ModalHasRoles;
        $role->role_id = $empresa->role;
        $role->model_type = 'App\Models\TarjetaCirculacion';
        $role->model_id = $empresa->id;
        $role->save();

        $role = new ModalHasRoles;
        $role->role_id = $empresa->role;
        $role->model_type = 'App\Models\User';
        $role->model_id = $empresa->id;
        $role->save();

        $role = new ModalHasRoles;
        $role->role_id = $empresa->role;
        $role->model_type = 'App\Models\Verificacion';
        $role->model_id = $empresa->id;
        $role->save();

        $role = new ModalHasRoles;
        $role->role_id = $empresa->role;
        $role->model_type = 'App\Models\Pronostico';
        $role->model_id = $empresa->id;
        $role->save();

        Session::flash('empresa', 'Se ha guardado sus datos con exito');
        return redirect()->route('create_admin.automovil');
    }

    /*|--------------------------------------------------------------------------
|Create Empresa Admin
|--------------------------------------------------------------------------*/
    function index_admin()
    {
            $empresa = User::where('empresa', '=', 1)
            ->where('id_empresa', '=', NULL)
            ->get();

            $user = DB::table('users')
                ->where('role', '=', '0')
                ->get();


            return view('admin.empresas.view-empresas-admin', compact('empresa', 'user'));
    }

    public function create_admin()
    {
            $user = DB::table('users')
                ->where('role', '=', '0')
                ->get();

            $roles = DB::table('roles')
                ->get();

            return view('admin.empresas.add-empresa-admin', compact('user', 'roles'));
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
        $empresa->role = $request->get('role');
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

        $role = new ModalHasRoles;
        $role->role_id = $empresa->role;
        $role->model_type = 'App\Models\Alertas';
        $role->model_id = $empresa->id;
        $role->save();

        $role = new ModalHasRoles;
        $role->role_id = $empresa->role;
        $role->model_type = 'App\Models\Automovil';
        $role->model_id = $empresa->id;
        $role->save();

        $role = new ModalHasRoles;
        $role->role_id = $empresa->role;
        $role->model_type = 'App\Models\Cupon';
        $role->model_id = $empresa->id;
        $role->save();

        $role = new ModalHasRoles;
        $role->role_id = $empresa->role;
        $role->model_type = 'App\Models\Licencia';
        $role->model_id = $empresa->id;
        $role->save();

        $role = new ModalHasRoles;
        $role->role_id = $empresa->role;
        $role->model_type = 'App\Models\Mecanica';
        $role->model_id = $empresa->id;
        $role->save();

        $role = new ModalHasRoles;
        $role->role_id = $empresa->role;
        $role->model_type = 'App\Models\Notas';
        $role->model_id = $empresa->id;
        $role->save();

        $role = new ModalHasRoles;
        $role->role_id = $empresa->role;
        $role->model_type = 'App\Models\Role';
        $role->model_id = $empresa->id;
        $role->save();

        $role = new ModalHasRoles;
        $role->role_id = $empresa->role;
        $role->model_type = 'App\Models\Seguros';
        $role->model_id = $empresa->id;
        $role->save();

        $role = new ModalHasRoles;
        $role->role_id = $empresa->role;
        $role->model_type = 'App\Models\TarjetaCirculacion';
        $role->model_id = $empresa->id;
        $role->save();

        $role = new ModalHasRoles;
        $role->role_id = $empresa->role;
        $role->model_type = 'App\Models\User';
        $role->model_id = $empresa->id;
        $role->save();

        $role = new ModalHasRoles;
        $role->role_id = $empresa->role;
        $role->model_type = 'App\Models\Verificacion';
        $role->model_id = $empresa->id;
        $role->save();

        $role = new ModalHasRoles;
        $role->role_id = $empresa->role;
        $role->model_type = 'App\Models\Pronostico';
        $role->model_id = $empresa->id;
        $role->save();

        Session::flash('success', 'Se ha actualizado sus datos con exito');
        return redirect()->route('index_admin.empresa');
    }

    public function edit_admin($id)
    {
            $empresa = User::findOrFail($id);

            $empresas = DB::table('users')
                ->where('empresa', '=', 1)
                ->get();

            $user = DB::table('users')
                ->where('empresa', '=', 0)
                ->get();

            $roles = DB::table('roles')
                ->get();

            return view('admin.empresas.edit-empresa-admin', compact('empresa', 'empresas', 'user', 'roles'));
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

            $file = $request->file('img');
            $file->move(public_path() . '/img-empresa', time() . "." . $file->getClientOriginalExtension());
            $empresa->img = time() . "." . $file->getClientOriginalExtension();

            $filepath = public_path('/img-empresa/' . $empresa->img);

            try {
                \Tinify\setKey(env("TINIFY_API_KEY"));
                $source = \Tinify\fromFile($filepath);
                $source->toFile($filepath);
            } catch (\Tinify\AccountException $e) {
                // Verify your API key and account limit.
                return redirect()->back()->with('error', $e->getMessage());
            } catch (\Tinify\ClientException $e) {
                // Check your source image and request options.
                return redirect()->back()->with('error', $e->getMessage());
            } catch (\Tinify\ServerException $e) {
                // Temporary issue with the Tinify API.
                return redirect()->back()->with('error', $e->getMessage());
            } catch (\Tinify\ConnectionException $e) {
                // A network connection error occurred.
                return redirect()->back()->with('error', $e->getMessage());
            } catch (Exception $e) {
                // Something else went wrong, unrelated to the Tinify API.
                return redirect()->back()->with('error', $e->getMessage());
            }
        }

        $empresa->update();

        $brorrarrole = ModalHasRoles::where('model_id', '=', $id)
        ->delete();

    $role = new ModalHasRoles;
    $role->role_id = $empresa->role;
    $role->model_type = 'App\Models\Alertas';
    $role->model_id = $empresa->id;
    $role->save();

    $role = new ModalHasRoles;
    $role->role_id = $empresa->role;
    $role->model_type = 'App\Models\Automovil';
    $role->model_id = $empresa->id;
    $role->save();

    $role = new ModalHasRoles;
    $role->role_id = $empresa->role;
    $role->model_type = 'App\Models\Cupon';
    $role->model_id = $empresa->id;
    $role->save();

    $role = new ModalHasRoles;
    $role->role_id = $empresa->role;
    $role->model_type = 'App\Models\Licencia';
    $role->model_id = $empresa->id;
    $role->save();

    $role = new ModalHasRoles;
    $role->role_id = $empresa->role;
    $role->model_type = 'App\Models\Mecanica';
    $role->model_id = $empresa->id;
    $role->save();

    $role = new ModalHasRoles;
    $role->role_id = $empresa->role;
    $role->model_type = 'App\Models\Notas';
    $role->model_id = $empresa->id;
    $role->save();

    $role = new ModalHasRoles;
    $role->role_id = $empresa->role;
    $role->model_type = 'App\Models\Role';
    $role->model_id = $empresa->id;
    $role->save();

    $role = new ModalHasRoles;
    $role->role_id = $empresa->role;
    $role->model_type = 'App\Models\Seguros';
    $role->model_id = $empresa->id;
    $role->save();

    $role = new ModalHasRoles;
    $role->role_id = $empresa->role;
    $role->model_type = 'App\Models\TarjetaCirculacion';
    $role->model_id = $empresa->id;
    $role->save();

    $role = new ModalHasRoles;
    $role->role_id = $empresa->role;
    $role->model_type = 'App\Models\User';
    $role->model_id = $empresa->id;
    $role->save();

    $role = new ModalHasRoles;
    $role->role_id = $empresa->role;
    $role->model_type = 'App\Models\Verificacion';
    $role->model_id = $empresa->id;
    $role->save();

    $role = new ModalHasRoles;
    $role->role_id = $empresa->role;
    $role->model_type = 'App\Models\Pronostico';
    $role->model_id = $empresa->id;
    $role->save();

        Session::flash('success', 'Se ha actualizado sus datos con exito');

        return redirect()->route('index_admin.empresa');
    }

    public function export()
    {
        return Excel::download(new EmpresaExport, 'empresas.xlsx');
    }
}
