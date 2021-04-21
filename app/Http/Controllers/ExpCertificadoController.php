<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpCertificado;
use Session;
use DB;
use Image;

class ExpCertificadoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('pagespeed');
    }

    function index(){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $exp_certificado = DB::table('exp_certificado')
        ->where('id_user','=',$user->id)
        ->where('current_auto','=',auth()->user()->current_auto)
        ->get();

        return view('exp-fisico.view-certificado',compact('exp_certificado'));
    }

    public function create(){

        return view('exp-fisico.view-certificado');
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'certificado' => 'mimes:jpeg,bpm,jpg,png,pdf|max:900',
        ]);

        $exp_certificados = new ExpCertificado;

        $exp_certificados->titulo = $request->get('titulo');

        if ($request->hasFile('certificado')) {

    	    $file=$request->file("certificado");
            list($width) = getimagesize($file);

    	    $nombre = "pdf_".time().".".$file->guessExtension();
    	    $ruta = public_path("/exp-certificado/".$nombre);

    	    if($width>1920){
                if($file->guessExtension()=="pdf"){
                    copy($file, $ruta);
                    $exp_certificados->certificado = $nombre;

                }else {
                    $urlfoto = $request->file('certificado');
                    $nombre = time() . "." . $urlfoto->guessExtension();
                    $ruta = public_path('/exp-certificado/' . $nombre);
                    $compresion = Image::make($urlfoto->getRealPath())
                        ->save($ruta, 80);
                    $exp_certificados->certificado = $compresion->basename;
                }
            }else{
                if($file->guessExtension()=="pdf"){
                    copy($file, $ruta);
                    $exp_certificados->certificado = $nombre;
                }else {
                    $urlfoto = $request->file('certificado');
                    $nombre = time() . "." . $urlfoto->guessExtension();
                    $ruta = public_path('/exp-certificado/' . $nombre);

                    switch ($width) {
                        case($width <= 750):
                            $compresion = Image::make($urlfoto->getRealPath())
                                ->save($ruta);
                            $exp_certificados->certificado = $compresion->basename;
                            break;
                        case($width >= 751):
                            $compresion = Image::make($urlfoto->getRealPath())
                                ->rotate(270)
                                ->save($ruta);
                            $exp_certificados->certificado = $compresion->basename;
                            break;
                    }
                }
            }
   	    }

        $exp_certificados->id_user = auth()->user()->id;
    	$exp_certificados->current_auto = auth()->user()->current_auto;

        $exp_certificados->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-certificado', compact('exp_certificados'));
    }

    function destroy($id){
        $exp_certificados = ExpCertificado::findOrFail($id);
        unlink(public_path('/exp-certificado/'.$exp_certificados->certificado));
        $exp_certificados->delete();

        Session::flash('destroy', 'Se Elimino su Factura con exito');
        return redirect()->back();

    }
/*|--------------------------------------------------------------------------
|Exp Certificado Admin
|--------------------------------------------------------------------------*/

    public function create_admin($id)
    {
        /* Trae los datos el auto en el que esta */
        $automovil = DB::table('automovil')
        ->where('id','=',$id)
        ->first();

        $exp_certificados = DB::table('exp_certificado')
        ->where('current_auto','=', $automovil->id)
        ->paginate(6);

        return view('admin.exp-fisico.view-certificado-admin',compact('exp_certificados','automovil'));
    }

    public function store_admin(Request $request,$id){

        $validate = $this->validate($request,[
            'certificado' => 'mimes:jpeg,bpm,jpg,png,pdf|max:900',
        ]);

        $exp = new ExpCertificado;
        $exp->titulo = $request->get('titulo');

    	if ($request->hasFile('certificado')) {

    	    $file=$request->file("certificado");
            list($width) = getimagesize($file);

    	    $nombre = "pdf_".time().".".$file->guessExtension();
    	    $ruta = public_path("/exp-certificado/".$nombre);

    	    if($width>1920){
                if($file->guessExtension()=="pdf"){
                    copy($file, $ruta);
                    $exp->certificado = $nombre;

                }else {
                    $urlfoto = $request->file('certificado');
                    $nombre = time() . "." . $urlfoto->guessExtension();
                    $ruta = public_path('/exp-certificado/' . $nombre);
                    $compresion = Image::make($urlfoto->getRealPath())
                        ->save($ruta, 80);
                    $exp->certificado = $compresion->basename;
                }
            }else{
    	        if($file->guessExtension()=="pdf"){
                    copy($file, $ruta);
                    $exp->certificado = $nombre;
                }else {
                    $urlfoto = $request->file('certificado');
                    $nombre = time() . "." . $urlfoto->guessExtension();
                    $ruta = public_path('/exp-certificado/' . $nombre);

                    switch ($width) {
                        case($width <= 750):
                            $compresion = Image::make($urlfoto->getRealPath())
                                ->save($ruta);
                            $exp->certificado = $compresion->basename;
                            break;
                        case($width >= 751):
                            $compresion = Image::make($urlfoto->getRealPath())
                                ->rotate(270)
                                ->save($ruta);
                            $exp->certificado = $compresion->basename;
                            break;
                    }
                }
            }
   	    }

    	/* Compara el auto que se selecciono con la db */
        $automovil = DB::table('automovil')
        ->where('id','=',$id)
        ->first();

        $exp->current_auto = $automovil->id;
        $exp->id_user = $automovil->id_user;

        $exp->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->back();
    }
}
