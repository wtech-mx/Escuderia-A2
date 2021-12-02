<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Models\Automovil;
use App\Models\Seguros;
use App\Models\User;
use App\Models\TarjetaCirculacion;
use Session;
use Image;
use App\Models\Verificacion;
use App\Models\VerificacionSegunda;

use App\Exports\AutomovilExport;
use App\Exports\AutomovilExportEmpresa;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Sectores;

class AutomovilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('pagespeed');
    }

    /*|--------------------------------------------------------------------------
|Garaje Edit/Create/Index - User
|--------------------------------------------------------------------------*/
    function index()
    {


        $automovil = DB::table('automovil')
            ->where('id_user', '=', auth()->user()->id)
            ->get();

        $carro = DB::table('automovil')
            ->where('id', '=', auth()->user()->current_auto)
            ->get();

        $users = DB::table('users')
            ->get();

        $marca = DB::table('marca')
            ->get();

        return view('garaje.view-garaje', compact('carro', 'automovil', 'marca'));
    }

    public function create()
    {
        $marca = DB::table('marca')
            ->get();

        $user = DB::table('users')
            ->where('role', '=', '0')
            ->get();

        $users = DB::table('users')
            ->get();

        return view('garaje.create-garaje', compact('marca', 'users'));
    }

    public function store(Request $request)
    {

        $validate = $this->validate($request, [
            'submarca' => 'required|max:191',
            'tipo' => 'required|max:191',
            'kilometraje' => 'required|max:191',
            'subtipo' => 'required|max:191',
            'año' => 'required|max:191',
            'numero_serie' => 'required|max:191',
            'color' => 'required|max:191',
            'placas' => 'required|max:191',
        ]);

        $automovil = new Automovil;
        $automovil->id_marca = $request->get('id_marca');
        $automovil->submarca = strtoupper($request->get('submarca'));
        $automovil->tipo = strtoupper($request->get('tipo'));
        $automovil->kilometraje = $request->get('kilometraje');
        $automovil->subtipo = strtoupper($request->get('subtipo'));
        $automovil->tanque = $request->get('tanque');
        $automovil->año = $request->get('año');
        $automovil->numero_serie = strtoupper($request->get('numero_serie'));
        $automovil->color = $request->get('color');
        $placa = strtoupper($request->get('placas'));
        $automovil->placas = $placa;

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $file->move(public_path() . '/img-auto', time() . "." . $file->getClientOriginalExtension());
            $automovil->img = time() . "." . $file->getClientOriginalExtension();

            $filepath = public_path('/img-auto/' . $automovil->img);

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

        $automovil->id_user = auth()->user()->id;
        $automovil->save();

        $user = DB::table('users')
            ->where('id', '=', auth()->user()->id)
            ->first();

        $seguro = new  Seguros;
        $seguro->seguro = 'sin seguro';
        $seguro->tipo_cobertura = 'Amplia';
        $seguro->costo = '0';
        $seguro->costo_anual = '0';
        $seguro->id_user = $user->id;
        $seguro->estatus = 0;
        $seguro->estado_last_week = 0;
        $seguro->estado_tomorrow = 0;
        $seguro->current_auto = $automovil->id;
        $seguro->save();

        $tarjeta_circulacion = new  TarjetaCirculacion;
        $tarjeta_circulacion->id_user = $user->id;
        $tarjeta_circulacion->current_auto = $automovil->id;
        $tarjeta_circulacion->estatus = 0;
        $tarjeta_circulacion->estado_last_week = 0;
        $tarjeta_circulacion->estado_tomorrow = 0;
        $tarjeta_circulacion->save();

        $id = auth()->user()->id;
        $user = User::findOrFail($id);
        $user->current_auto = $automovil->id;
        $user->update();

        $verificacion = new  Verificacion;
        $verificacion->id_user = $id;
        $verificacion->current_auto = $automovil->id;
        $verificacion->estatus = 0;
        $verificacion->estado_last_week = 0;
        $verificacion->estado_tomorrow = 0;
        $verificacion->check = 0;
        $verificacion->save();

        $verificacion_segunda = new VerificacionSegunda;
        $verificacion_segunda->id_verificacion = $verificacion->id;
        $verificacion_segunda->id_user = $verificacion->id_user;
        $verificacion_segunda->estatus = 0;
        $verificacion_segunda->estado_last_week = 0;
        $verificacion_segunda->estado_tomorrow = 0;
        $verificacion_segunda->check = 0;
        $verificacion_segunda->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.automovil', compact('automovil'));
    }

    public function  edit($id)
    {

        $automovil = Automovil::findOrFail($id);

        $marca = DB::table('marca')
            ->get();

        $users = DB::table('users')
            ->get();

        return view('garaje.edit-garaje', compact('automovil', 'marca', 'users'));
    }

    function update(Request $request, $id)
    {

        $validate = $this->validate($request, [
            'submarca' => 'required|max:191',
            'tipo' => 'required|max:191',
            'kilometraje' => 'required|max:191',
            'subtipo' => 'required|max:191',
            'año' => 'required|max:191',
            'numero_serie' => 'required|max:191',
            'color' => 'required|max:191',
            'placas' => 'required|max:191',
        ]);

        $automovil = Automovil::findOrFail($id);
        $automovil->id_marca = $request->get('id_marca');
        $automovil->submarca = strtoupper($request->get('submarca'));
        $automovil->tipo = strtoupper($request->get('tipo'));
        $automovil->tanque = $request->get('tanque');
        $automovil->kilometraje = $request->get('kilometraje');
        $automovil->subtipo = strtoupper($request->get('subtipo'));
        $automovil->año = $request->get('año');
        $automovil->numero_serie = strtoupper($request->get('numero_serie'));
        $automovil->color = $request->get('color');
        $placa = strtoupper($request->get('placas'));
        $automovil->placas = $placa;

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $file->move(public_path() . '/img-auto', time() . "." . $file->getClientOriginalExtension());
            $automovil->img = time() . "." . $file->getClientOriginalExtension();

            $filepath = public_path('/img-auto/' . $automovil->img);

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


        $automovil->update();

        $marca = DB::table('marca')
            ->get();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.automovil', compact('automovil', 'marca'));
    }

    public function current_auto(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->current_auto = $request->get('current_auto');

        $user->update();
        Session::flash('succes', 'Se selecciono su pagina de edicion');
        return redirect()->back();
    }

    /*|--------------------------------------------------------------------------
|Garaje edit - Admin
|--------------------------------------------------------------------------*/

    function index_admin()
    {

        $automovil = Automovil::where('id_empresa', '=', NULL)
            ->get();

        $automovil2 = Automovil::where('id_user', '=', NULL)
            ->get();

        $sector = Sectores::where('id_empresa', '=', auth()->user()->id)
            ->get();

        if(auth()->user()->empresa == 1){
            if(auth()->user()->id_sector == NULL){
            $automovil_empresa = Automovil::where('id_empresa', '=', auth()->user()->id)
                ->get();
            }else{
            $automovil_empresa = Automovil::where('id_sector', '=', auth()->user()->id_sector)
                ->get();
            }
            return view('admin.garaje.view-garaje-admin', compact('automovil', 'automovil2', 'automovil_empresa', 'sector'));
        }

        return view('admin.garaje.view-garaje-admin', compact('automovil', 'automovil2', 'sector'));
    }

    public function create_admin()
    {
        $marca = DB::table('marca')
            ->get();

        $user = DB::table('users')
            ->where('empresa', '=', 0)
            ->where('role', '=', '0')
            ->get();

        $user_chofer = DB::table('users')
            ->where('empresa', '=', 1)
            ->where('id_sector', '=', auth()->user()->id_sector)
            ->where('chofer', '=', 1)
            ->get();

        $empresa = DB::table('users')
            ->where('empresa', '=', 1)
            ->get();

        $sector = Sectores::where('id_empresa', '=', auth()->user()->id)
            ->get();

        return view('admin.garaje.create-garaje-admin', compact('marca', 'user', 'empresa', 'user', 'sector', 'user_chofer'));
    }

    public function store_admin(Request $request)
    {

        $validate = $this->validate($request, [
            'submarca' => 'required|max:191',
            'tipo' => 'required|max:191',
            'kilometraje' => 'required|max:191',
            'subtipo' => 'required|max:191',
            'año' => 'required|max:191',
            'numero_serie' => 'required|max:191',
            'color' => 'required|max:191',
            'placas' => 'required|max:191',
        ]);

        $automovil = new Automovil;
        $automovil->id_user = $request->get('id_user');
        $automovil->id_empresa = $request->get('id_empresa');
        $automovil->id_marca = $request->get('id_marca');
        $automovil->id_sector = $request->get('id_sector');
        $automovil->chofer = $request->get('chofer');
        $automovil->estatus = $request->get('estatus');
        $automovil->submarca = strtoupper($request->get('submarca'));
        $automovil->tipo = strtoupper($request->get('tipo'));
        $automovil->kilometraje = $request->get('kilometraje');
        $automovil->tanque = $request->get('tanque');
        $automovil->subtipo = strtoupper($request->get('subtipo'));
        $automovil->año = $request->get('año');
        $automovil->numero_serie = strtoupper($request->get('numero_serie'));
        $automovil->color = $request->get('color');
        $placa = strtoupper($request->get('placas'));
        $automovil->placas = $placa;

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $file->move(public_path() . '/img-auto', time() . "." . $file->getClientOriginalExtension());
            $automovil->img = time() . "." . $file->getClientOriginalExtension();

            $filepath = public_path('/img-auto/' . $automovil->img);

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

        $automovil->save();

        $seguro = new  Seguros;
        $seguro->seguro = 'sin seguro';
        $seguro->tipo_cobertura = 'Amplia';
        $seguro->costo = '0';
        $seguro->estatus = 0;
        $seguro->estado_last_week = 0;
        $seguro->estado_tomorrow = 0;
        $seguro->check = 0;
        $seguro->costo_anual = '0';
        $seguro->id_user = $automovil->id_user;
        $seguro->id_empresa = $automovil->id_empresa;
        $seguro->id_sector = $automovil->id_sector;
        $seguro->current_auto = $automovil->id;
        $seguro->save();

        $tarjeta_circulacion = new  TarjetaCirculacion;
        $tarjeta_circulacion->id_user = $automovil->id_user;
        $tarjeta_circulacion->id_empresa = $automovil->id_empresa;
        $tarjeta_circulacion->id_sector = $automovil->id_sector;
        $tarjeta_circulacion->current_auto = $automovil->id;
        $tarjeta_circulacion->estatus = 0;
        $tarjeta_circulacion->estado_last_week = 0;
        $tarjeta_circulacion->estado_tomorrow = 0;
        $tarjeta_circulacion->check = 0;
        $tarjeta_circulacion->save();

        $verificacion = new  Verificacion;
        $verificacion->id_user = $automovil->id_user;
        $verificacion->id_empresa = $automovil->id_empresa;
        $verificacion->id_sector = $automovil->id_sector;
        $verificacion->current_auto = $automovil->id;
        $verificacion->estatus = 0;
        $verificacion->estado_last_week = 0;
        $verificacion->estado_tomorrow = 0;
        $verificacion->check = 0;
        $verificacion->save();

        $verificacion_segunda = new VerificacionSegunda;
        $verificacion_segunda->id_verificacion = $verificacion->id;
        $verificacion_segunda->id_user = $verificacion->id_user;
        $verificacion_segunda->id_empresa = $automovil->id_empresa;
        $verificacion_segunda->id_sector = $automovil->id_sector;
        $verificacion_segunda->estatus = 0;
        $verificacion_segunda->estado_last_week = 0;
        $verificacion_segunda->estado_tomorrow = 0;
        $verificacion_segunda->check = 0;
        $verificacion_segunda->save();

        if ($automovil->id_user == NULL) {
            $id = $automovil->id_empresa;
            $user = User::findOrFail($id);
            $user->current_auto = $automovil->id;
            $user->update();
        } else {
            $id = $automovil->id_user;
            $user = User::findOrFail($id);
            $user->current_auto = $automovil->id;
            $user->update();
        }

        Session::flash('auto', 'Se ha guardado sus datos con exito');

        return redirect()->route('index_admin.automovil', compact('automovil'));
    }

    public function  edit_admin($id)
    {
        $automovil = Automovil::findOrFail($id);

        $marca = DB::table('marca')
            ->get();

        $empresa = DB::table('users')
            ->where('empresa', '=', 1)
            ->get();

        $user = DB::table('users')
            ->where('role', '=', '0')
            ->where('empresa', '=', 0)
            ->get();

        $sector = Sectores::where('id_empresa', '=', auth()->user()->id)
            ->get();

        return view('admin.garaje.edit-garaje-admin', compact('automovil', 'marca', 'user', 'empresa', 'sector'));
    }

    function update_admin(Request $request, $id)
    {

        $validate = $this->validate($request, [
            'submarca' => 'required|max:191',
            'tipo' => 'required|max:191',
            'kilometraje' => 'required|max:191',
            'subtipo' => 'required|max:191',
            'año' => 'required|max:191',
            'numero_serie' => 'required|max:191',
            'color' => 'required|max:191',
            'placas' => 'required|max:191',
        ]);

        $automovil = Automovil::findOrFail($id);
        $automovil->id_user = $request->get('id_user');
        $automovil->id_empresa = $request->get('id_empresa');
        $automovil->id_marca = $request->get('id_marca');
        $automovil->id_sector = $request->get('id_sector');
        $automovil->submarca = strtoupper($request->get('submarca'));
        $automovil->tipo = strtoupper($request->get('tipo'));
        $automovil->kilometraje = $request->get('kilometraje');
        $automovil->tanque = $request->get('tanque');
        $automovil->subtipo = strtoupper($request->get('subtipo'));
        $automovil->año = $request->get('año');
        $automovil->numero_serie = strtoupper($request->get('numero_serie'));
        $automovil->color = $request->get('color');
        $placa = strtoupper($request->get('placas'));
        $automovil->placas = $placa;

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $file->move(public_path() . '/img-auto', time() . "." . $file->getClientOriginalExtension());
            $automovil->img = time() . "." . $file->getClientOriginalExtension();

            $filepath = public_path('/img-auto/' . $automovil->img);

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

        $automovil->update();

        $marca = DB::table('marca')
            ->get();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index_admin.automovil', compact('automovil', 'marca'));
    }

    public function export()
    {
        return Excel::download(new AutomovilExport, 'autos-usuarios.xlsx');
    }

    public function export_empresa()
    {
        return Excel::download(new AutomovilExportEmpresa, 'autos-empresa.xlsx');
    }
}
