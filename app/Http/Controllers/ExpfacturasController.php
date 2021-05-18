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

        $validate = $this->validate($request, [
            'factura' => 'mimes:jpeg,bpm,jpg,png,pdf|max:900',
        ]);

        $exp_factura = new ExpFactura;

        $exp_factura->titulo = $request->get('titulo');

        if ($request->hasFile('factura')) {

            $file = $request->file("factura");
            list($width) = getimagesize($file);

            $nombre = "pdf_" . time() . "." . $file->guessExtension();
            $ruta = public_path("/exp-factura/" . $nombre);

            if ($width > 1920) {
                if ($file->guessExtension() == "pdf") {
                    copy($file, $ruta);
                    $exp_factura->factura = $nombre;
                } else {
                    $urlfoto = $request->file('factura');
                    $nombre = time() . "." . $urlfoto->guessExtension();
                    $ruta = public_path('/exp-factura/' . $nombre);
                    $compresion = Image::make($urlfoto->getRealPath())
                        ->save($ruta, 80);
                    $exp_factura->factura = $compresion->basename;
                }
            } else {
                if ($file->guessExtension() == "pdf") {
                    copy($file, $ruta);
                    $exp_factura->factura = $nombre;
                } else {
                    $urlfoto = $request->file('factura');
                    $nombre = time() . "." . $urlfoto->guessExtension();
                    $ruta = public_path('/exp-factura/' . $nombre);

                    switch ($width) {
                        case ($width <= 750):
                            $compresion = Image::make($urlfoto->getRealPath())
                                ->save($ruta);
                            $exp_factura->factura = $compresion->basename;
                            break;
                        case ($width >= 751):
                            $compresion = Image::make($urlfoto->getRealPath())
                                ->rotate(270)
                                ->save($ruta);
                            $exp_factura->factura = $compresion->basename;
                            break;
                    }
                }
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
    function index_admin(Request $request)
    {
        if (auth()->user()->role != 1) {
            return view('errors.403');
        } else {
            /* Trae Autos de Usuarios */
            $placas = $request->get('placas');

            $automovil = Automovil::where('id_empresa', '=', NULL)
                ->placas($placas)
                ->paginate(5);

            $automovil2 = Automovil::where('id_user', '=', NULL)
                ->paginate(5);

            return view('admin.exp-fisico.view-exp-fisico-admin', compact('automovil', 'automovil2'));
        }
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
            ->paginate(6);

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

            $file = $request->file("factura");
            list($width) = getimagesize($file);

            $nombre = "pdf_" . time() . "." . $file->guessExtension();
            $ruta = public_path("/exp-factura/" . $nombre);

            if ($width > 1920) {
                if ($file->guessExtension() == "pdf") {
                    copy($file, $ruta);
                    $exp->factura = $nombre;
                } else {
                    $urlfoto = $request->file('factura');
                    $nombre = time() . "." . $urlfoto->guessExtension();
                    $ruta = public_path('/exp-factura/' . $nombre);
                    $compresion = Image::make($urlfoto->getRealPath())
                        ->save($ruta, 80);
                    $exp->factura = $compresion->basename;
                }
            } else {
                if ($file->guessExtension() == "pdf") {
                    copy($file, $ruta);
                    $exp->factura = $nombre;
                } else {
                    $urlfoto = $request->file('factura');
                    $nombre = time() . "." . $urlfoto->guessExtension();
                    $ruta = public_path('/exp-factura/' . $nombre);

                    switch ($width) {
                        case ($width <= 750):
                            $compresion = Image::make($urlfoto->getRealPath())
                                ->save($ruta);
                            $exp->factura = $compresion->basename;
                            break;
                        case ($width >= 751):
                            $compresion = Image::make($urlfoto->getRealPath())
                                ->rotate(270)
                                ->save($ruta);
                            $exp->factura = $compresion->basename;
                            break;
                    }
                }
            }
        }

        /* Compara el auto que se selecciono con la db */
        $automovil = DB::table('automovil')
            ->where('id', '=', $id)
            ->first();
        $exp->current_auto = $automovil->id;
        $exp->id_user = $automovil->id_user;

        $exp->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->back();
    }
}
