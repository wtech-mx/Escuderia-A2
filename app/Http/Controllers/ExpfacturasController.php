<?php

namespace App\Http\Controllers;

use App\Models\Automovil;
use Illuminate\Http\Request;
use DB;
use App\Models\ExpFactura;
use App\Models\ExpCarta;
use App\Models\ExpDomicilio;
use App\Models\ExpIne;
use App\Models\ExpPlacas;
use App\Models\ExpPoliza;
use App\Models\ExpReemplacamiento;
use App\Models\ExpRfc;
use App\Models\ExpTc;
use App\Models\ExpTenencias;
use App\Models\ExpCertificado;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

use Session;
use Image;
use Illuminate\Support\Str;

class ExpfacturasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('pagespeed');
    }

    function index()
    {
        $user = DB::table('users')
            ->where('id', '=', auth()->user()->id)
            ->first();

        $auto_user = $user->{'id'};

        $exp_factura = DB::table('exp_facturas')
            ->where('id_user', '=', $auto_user)
            ->where('current_auto', '=', auth()->user()->current_auto)
            ->get();

        return view('exp-fisico.view-factura', compact('exp_factura'));
    }

    public function create()
    {
        $user = DB::table('users')
            ->where('role', '=', '0')
            ->get();

        return view('exp-fisico.view-factura', compact('user'));
    }

    public function store(Request $request)
    {
        $exp_factura = new ExpFactura;

        $exp_factura->titulo = $request->get('titulo');

        if ($request->hasFile('factura')) {

            $file = $request->file('factura');
            $file->move(public_path() . '/exp-factura', time() . "." . $file->getClientOriginalExtension());
            $exp_factura->factura = time() . "." . $file->getClientOriginalExtension();

            $filepath = public_path('/exp-factura/' . $exp_factura->factura);

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

        $exp_factura->id_user = auth()->user()->id;
        $exp_factura->current_auto = auth()->user()->current_auto;

        $exp_factura->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-factura', compact('exp_factura'));
    }

    function destroy($id)
    {
        $exp_factura = ExpFactura::findOrFail($id);
        unlink(public_path('/exp-factura/' . $exp_factura->factura));
        $exp_factura->delete();

        Session::flash('destroy', 'Se Elimino su Factura con exito');
        return redirect()->back();
    }

    /*|--------------------------------------------------------------------------
        |Create Doc Admin_Admin
        |--------------------------------------------------------------------------*/
    function index_admin()
    {
            $automovil = Automovil::where('id_empresa', '=', NULL)
                ->get();

            $automovil2 = Automovil::where('id_user', '=', NULL)
                ->get();

            $automovil_empresa = Automovil::where('id_empresa', '=', auth()->user()->id)
                ->get();

            return view('admin.exp-fisico.view-exp-fisico-admin', compact('automovil', 'automovil2', 'automovil_empresa'));
    }

    public function create_admin($id)
    {
        /* Trae los datos el auto en el que esta */
        $automovil = DB::table('automovil')
            ->where('id', '=', $id)
            ->first();

        $exp_auto = $automovil->id;

        $exp_factura = DB::table('exp_facturas')
            ->where('current_auto', '=', $exp_auto)
            ->get();

        $user = DB::table('users')
            ->where('role', '=', '0')
            ->get();

        return view('admin.exp-fisico.view-factura-admin', compact('exp_factura', 'automovil', 'user'));
    }

    public function store_admin(Request $request, $id)
    {

        $exp = new ExpFactura;
        $exp->titulo = $request->get('titulo');

        if ($request->hasFile('factura')) {

            $file = $request->file('factura');
            $file->move(public_path() . '/exp-factura', time() . "." . $file->getClientOriginalExtension());
            $exp->factura = time() . "." . $file->getClientOriginalExtension();

            $filepath = public_path('/exp-factura/' . $exp->factura);

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

        $automovil = DB::table('automovil')
            ->where('id', '=', $id)
            ->first();
        $exp->current_auto = $automovil->id;
        $exp->id_user = $automovil->id_user;
        $exp->id_empresa = $automovil->id_empresa;

        $exp->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->back();
    }
}
