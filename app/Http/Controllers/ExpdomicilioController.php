<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\ExpDomicilio;
use Session;
use Image;

class ExpdomicilioController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('pagespeed');
    }

     function index(){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $auto_user = $user->{'id'};

        $exp_domicilio = DB::table('exp_domicilio')
        ->where('id_user','=',$auto_user)
        ->where('current_auto','=',auth()->user()->current_auto)
        ->get();

        return view('exp-fisico.view-cd',compact('exp_domicilio'));
    }

    public function create(){

        return view('exp-fisico.view-cd');
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'domicilio' => 'mimes:jpeg,bpm,jpg,png,pdf|max:900',
        ]);

        $exp_domicilio = new ExpDomicilio;

        $exp_domicilio->titulo = $request->get('titulo');

        if ($request->hasFile('domicilio')) {

    	    $file=$request->file("domicilio");
            list($width, $height) = getimagesize($file);

    	    $nombre = "pdf_".time().".".$file->guessExtension();
    	    $ruta = public_path("/exp-domicilio/".$nombre);

    	    if($width>1920 || $height>1080){
                if($file->guessExtension()=="pdf"){
                    copy($file, $ruta);
                    $exp_domicilio->domicilio = $nombre;

                }else {
                    $urlfoto = $request->file('domicilio');
                    $nombre = time() . "." . $urlfoto->guessExtension();
                    $ruta = public_path('/exp-domicilio/' . $nombre);
                    $compresion = Image::make($urlfoto->getRealPath())
                        ->save($ruta, 80);
                    $exp_domicilio->domicilio = $compresion->basename;
                }
            }else{
                    $urlfoto = $request->file('domicilio');
                    $nombre = time() . "." . $urlfoto->guessExtension();
                    $ruta = public_path('/exp-domicilio/' . $nombre);

                  switch($width ){
                      case($width<=576):
                        $compresion = Image::make($urlfoto->getRealPath())
                            ->save($ruta);
                        $exp_domicilio->domicilio = $compresion->basename;
                      break;
                      case($width>=577):
                          $compresion = Image::make($urlfoto->getRealPath())
                                ->rotate(270)
                                ->save($ruta);
                            $exp_domicilio->domicilio = $compresion->basename;
                      break;
                   }
            }
   	    }

        $exp_domicilio->id_user = auth()->user()->id;
    	$exp_domicilio->current_auto = auth()->user()->current_auto;
//dd($exp_domicilio);
        $exp_domicilio->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-cd', compact('exp_domicilio'));
    }

        public function create_admin($id)
    {
        /* Trae los datos el auto en el que esta */
        $automovil = DB::table('automovil')
        ->where('id','=',$id)
        ->first();

        $exp_auto = $automovil->id;

        $exp_domicilio = DB::table('exp_domicilio')
        ->where('current_auto','=', $exp_auto)
        ->paginate(6);

        return view('admin.exp-fisico.view-cd-admin',compact('exp_domicilio','automovil'));
    }

    public function store_admin(Request $request,$id){

        $validate = $this->validate($request,[
            'domicilio' => 'mimes:jpeg,bpm,jpg,png,pdf|max:900',
        ]);

        $exp = new ExpDomicilio;
        $exp->titulo = $request->get('titulo');

        if ($request->hasFile('domicilio')) {

    	    $file=$request->file("domicilio");
            list($width, $height) = getimagesize($file);

    	    $nombre = "pdf_".time().".".$file->guessExtension();
    	    $ruta = public_path("/exp-domicilio/".$nombre);

    	    if($width>1920){
                if($file->guessExtension()=="pdf"){
                    copy($file, $ruta);
                    $exp->domicilio = $nombre;

                }else {
                    $urlfoto = $request->file('domicilio');
                    $nombre = time() . "." . $urlfoto->guessExtension();
                    $ruta = public_path('/exp-domicilio/' . $nombre);
                    $compresion = Image::make($urlfoto->getRealPath())
                        ->save($ruta, 80);
                    $exp->domicilio = $compresion->basename;
                }
            }else{
    	        if($file->guessExtension()=="pdf"){
                    copy($file, $ruta);
                    $exp->domicilio = $nombre;
                }else {
                    $urlfoto = $request->file('domicilio');
                    $nombre = time() . "." . $urlfoto->guessExtension();
                    $ruta = public_path('/exp-domicilio/' . $nombre);

                    switch ($width) {
                        case($width <= 576):
                            $compresion = Image::make($urlfoto->getRealPath())
                                ->save($ruta);
                            $exp->domicilio = $compresion->basename;
                            break;
                        case($width >= 577):
                            $compresion = Image::make($urlfoto->getRealPath())
                                ->rotate(270)
                                ->save($ruta);
                            $exp->domicilio = $compresion->basename;
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

    function destroy($id){
        $exp = ExpDomicilio::findOrFail($id);
        unlink(public_path('/exp-domicilio/'.$exp->domicilio));
        $exp->delete();

        Session::flash('destroy', 'Se Elimino su Factura con exito');
        return redirect()->back();

    }
}
