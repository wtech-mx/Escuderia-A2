<?php

namespace App\Http\Controllers;

use App\Models\ImgTc;
use App\Models\ExpTc;
use App\Models\TarjetaCirculacion;
use Illuminate\Http\Request;
use Session;
use Image;
use Carbon\Carbon;
use App\Models\Alertas;

class ImgTcController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('pagespeed');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $validate = $this->validate($request,[
            'img' => 'required|mimes:jpeg,bpm,jpg,png|max:900',
        ]);

        $img_tc = new ExpTc;

        if ($request->hasFile('tc')) {

    	    $file=$request->file("tc");
            list($width) = getimagesize($file);

    	    $nombre = "pdf_".time().".".$file->guessExtension();
    	    $ruta = public_path("/exp-tc/".$nombre);

    	    if($width>1920){
                if($file->guessExtension()=="pdf"){
                    copy($file, $ruta);
                    $img_tc->img = $nombre;
                }else {
                    $urlfoto = $request->file('tc');
                    $nombre = time() . "." . $urlfoto->guessExtension();
                    $ruta = public_path('/exp-tc/' . $nombre);
                    $compresion = Image::make($urlfoto->getRealPath())
                        ->save($ruta, 10);
                    $img_tc->tc = $compresion->basename;
                }
            }else{
                if($file->guessExtension()=="pdf"){
                    copy($file, $ruta);
                    $img_tc->img = $nombre;
                }else {
                    $urlfoto = $request->file('tc');
                    $nombre = time() . "." . $urlfoto->guessExtension();
                    $ruta = public_path('/exp-tc/' . $nombre);

                    switch ($width) {
                        case($width <= 750):
                            $compresion = Image::make($urlfoto->getRealPath())
                                ->save($ruta);
                            $img_tc->tc = $compresion->basename;
                            break;
                        case($width >= 751):
                            $compresion = Image::make($urlfoto->getRealPath())
                                ->rotate(270)
                                ->save($ruta);
                            $img_tc->tc = $compresion->basename;
                            break;
                    }
                }
            }
   	    }

    	$img_tc->id_tc = $request->get('id_tc');
    	$id_tc = $img_tc->id_tc;

    	$img_tc->save();

    	$tarjeta_circulacion = TarjetaCirculacion::find($id_tc);
    	$tarjeta_circulacion->id_tc = $img_tc->id;
    	$tarjeta_circulacion->update();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.tc', compact('img_tc'));
    }

    public function store_admin(Request $request){

        $validate = $this->validate($request,[
            'tc' => 'required|mimes:jpeg,bpm,jpg,png|max:900',
        ]);

        $img_tc = new ExpTc;

        if ($request->hasFile('tc')) {

    	    $file=$request->file("tc");
            list($width) = getimagesize($file);

    	    $nombre = "pdf_".time().".".$file->guessExtension();
    	    $ruta = public_path("/exp-tc/".$nombre);

    	    if($width>1920){
                if($file->guessExtension()=="pdf"){
                    copy($file, $ruta);
                    $img_tc->tc = $nombre;
                }else {
                    $urlfoto = $request->file('tc');
                    $nombre = time() . "." . $urlfoto->guessExtension();
                    $ruta = public_path('/exp-tc/' . $nombre);
                    $compresion = Image::make($urlfoto->getRealPath())
                        ->save($ruta, 10);
                    $img_tc->tc = $compresion->basename;
                }
            }else{
                if($file->guessExtension()=="pdf"){
                    copy($file, $ruta);
                    $img_tc->tc = $nombre;
                }else {
                    $urlfoto = $request->file('tc');
                    $nombre = time() . "." . $urlfoto->guessExtension();
                    $ruta = public_path('/exp-tc/' . $nombre);

                    switch ($width) {
                        case($width <= 750):
                            $compresion = Image::make($urlfoto->getRealPath())
                                ->save($ruta);
                            $img_tc->tc = $compresion->basename;
                            break;
                        case($width >= 751):
                            $compresion = Image::make($urlfoto->getRealPath())
                                ->rotate(270)
                                ->save($ruta);
                            $img_tc->tc = $compresion->basename;
                            break;
                    }
                }
            }
   	    }

    	$img_tc->id_user = $request->get('id_user');
    	$img_tc->current_auto = $request->get('current_auto');

    	$img_tc->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('indextc_admin.tarjeta-circulacion', compact('img_tc'));
    }
}
