<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\ExpPoliza;
use App\Models\TarjetaCirculacion;
use Session;
use Image;

class ExpolizaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {

        $user = DB::table('users')
            ->where('id', '=', auth()->user()->id)
            ->first();

        $auto_user = $user->{'id'};

        $exp_poliza = DB::table('exp_poliza')
            ->where('id_user', '=', $auto_user)
            ->where('current_auto', '=', auth()->user()->current_auto)
            ->get();

        $img = TarjetaCirculacion::where('current_auto', '=', $user->current_auto)->first();

        return view('exp-fisico.view-poliza', compact('exp_poliza', 'img'));
    }

    public function create()
    {

        return view('exp-fisico.view-poliza');
    }

    public function store(Request $request)
    {

        $validate = $this->validate($request, [
            'poliza' => 'mimes:jpeg,bpm,jpg,png,pdf|max:900',
        ]);

        $exp_poliza = new ExpPoliza;

        $exp_poliza->titulo = $request->get('titulo');
        if ($request->hasFile('poliza')) {

            $file = $request->file("poliza");
            list($width) = getimagesize($file);

            $nombre = "pdf_" . time() . "." . $file->guessExtension();
            $ruta = public_path("/exp-poliza/" . $nombre);

            if ($width > 1920) {
                if ($file->guessExtension() == "pdf") {
                    copy($file, $ruta);
                    $exp_poliza->poliza = $nombre;
                } else {
                    $urlfoto = $request->file('poliza');
                    $nombre = time() . "." . $urlfoto->guessExtension();
                    $ruta = public_path('/exp-poliza/' . $nombre);
                    $compresion = Image::make($urlfoto->getRealPath())
                        ->save($ruta, 80);
                    $exp_poliza->poliza = $compresion->basename;
                }
            } else {
                if ($file->guessExtension() == "pdf") {
                    copy($file, $ruta);
                    $exp_poliza->poliza = $nombre;
                } else {
                    $urlfoto = $request->file('poliza');
                    $nombre = time() . "." . $urlfoto->guessExtension();
                    $ruta = public_path('/exp-poliza/' . $nombre);

                    switch ($width) {
                        case ($width <= 750):
                            $compresion = Image::make($urlfoto->getRealPath())
                                ->save($ruta);
                            $exp_poliza->poliza = $compresion->basename;
                            break;
                        case ($width >= 751):
                            $compresion = Image::make($urlfoto->getRealPath())
                                ->rotate(270)
                                ->save($ruta);
                            $exp_poliza->poliza = $compresion->basename;
                            break;
                    }
                }
            }
        }

        $exp_poliza->id_user = auth()->user()->id;
        $exp_poliza->current_auto = auth()->user()->current_auto;

        $exp_poliza->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-poliza', compact('exp_poliza'));
    }

    public function create_admin($id)
    {
        /* Trae los datos el auto en el que esta */
        $automovil = DB::table('automovil')
            ->where('id', '=', $id)
            ->first();

        $exp_auto = $automovil->id;

        $exp_poliza = DB::table('exp_poliza')
            ->where('current_auto', '=', $exp_auto)
            ->paginate(6);

        return view('admin.exp-fisico.view-poliza-admin', compact('exp_poliza', 'automovil'));
    }

    public function store_admin(Request $request, $id)
    {

        $exp = new ExpPoliza;
        $exp->titulo = $request->get('titulo');

        if ($request->hasFile('poliza')) {

            $file = $request->file("poliza");
            list($width) = getimagesize($file);

            $nombre = "pdf_" . time() . "." . $file->guessExtension();
            $ruta = public_path("/exp-poliza/" . $nombre);

            if ($width > 1920) {
                if ($file->guessExtension() == "pdf") {
                    copy($file, $ruta);
                    $exp->poliza = $nombre;
                } else {
                    $urlfoto = $request->file('poliza');
                    $nombre = time() . "." . $urlfoto->guessExtension();
                    $ruta = public_path('/exp-poliza/' . $nombre);
                    $compresion = Image::make($urlfoto->getRealPath())
                        ->save($ruta, 80);
                    $exp->poliza = $compresion->basename;
                }
            } else {
                if ($file->guessExtension() == "pdf") {
                    copy($file, $ruta);
                    $exp->poliza = $nombre;
                } else {
                    $urlfoto = $request->file('poliza');
                    $nombre = time() . "." . $urlfoto->guessExtension();
                    $ruta = public_path('/exp-poliza/' . $nombre);

                    switch ($width) {
                        case ($width <= 750):
                            $compresion = Image::make($urlfoto->getRealPath())
                                ->save($ruta);
                            $exp->poliza = $compresion->basename;
                            break;
                        case ($width >= 751):
                            $compresion = Image::make($urlfoto->getRealPath())
                                ->rotate(270)
                                ->save($ruta);
                            $exp->poliza = $compresion->basename;
                            break;
                    }
                }
            }
        }
        $exp->current_auto = $request->get('current_auto');

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

    public function store_admin_s(Request $request)
    {

        $validate = $this->validate($request, [
            'poliza' => 'mimes:jpeg,bpm,jpg,png,pdf|max:900',
        ]);

        $exp = new ExpPoliza;

        if ($request->hasFile('poliza')) {

            $file = $request->file("poliza");
            list($width, $height) = getimagesize($file);

            $nombre = "pdf_" . time() . "." . $file->guessExtension();
            $ruta = public_path("/exp-poliza/" . $nombre);

            if ($width > 1920) {
                if ($file->guessExtension() == "pdf") {
                    copy($file, $ruta);
                    $exp->poliza = $nombre;
                } else {
                    $urlfoto = $request->file('poliza');
                    $nombre = time() . "." . $urlfoto->guessExtension();
                    $ruta = public_path('/exp-poliza/' . $nombre);
                    $compresion = Image::make($urlfoto->getRealPath())
                        ->save($ruta, 80);
                    $exp->poliza = $compresion->basename;
                }
            } else {
                if ($file->guessExtension() == "pdf") {
                    copy($file, $ruta);
                    $exp->poliza = $nombre;
                } else {
                    $urlfoto = $request->file('poliza');
                    $nombre = time() . "." . $urlfoto->guessExtension();
                    $ruta = public_path('/exp-poliza/' . $nombre);

                    switch ($width) {
                        case ($width <= 750):
                            $compresion = Image::make($urlfoto->getRealPath())
                                ->save($ruta);
                            $exp->poliza = $compresion->basename;
                            break;
                        case ($width >= 751):
                            $compresion = Image::make($urlfoto->getRealPath())
                                ->rotate(270)
                                ->save($ruta);
                            $exp->poliza = $compresion->basename;
                            break;
                    }
                }
            }
        }
        $exp->current_auto = $request->get('current_auto');

        $exp->id_user = $request->get('id_user');

        $exp->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->back();
    }

    function destroy($id)
    {
        $exp = ExpPoliza::findOrFail($id);
        unlink(public_path('/exp-poliza/' . $exp->poliza));
        $exp->delete();

        Session::flash('destroy', 'Se Elimino su Factura con exito');
        return redirect()->back();
    }
}
