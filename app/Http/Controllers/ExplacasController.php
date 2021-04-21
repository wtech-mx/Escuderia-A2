<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\ExpPlacas;
use Session;
use Image;
class ExplacasController extends Controller
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

        $exp_placas = DB::table('exp_placas')
        ->where('id_user','=',$auto_user)
        ->where('current_auto','=',auth()->user()->current_auto)
        ->get();

        return view('exp-fisico.view-bp',compact('exp_placas'));
    }

    public function create(){

        return view('exp-fisico.view-bp');
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'placa' => 'mimes:jpeg,bpm,jpg,png,pdf|max:900',
        ]);

        $exp_placas = new ExpPlacas;

        $exp_placas->titulo = $request->get('titulo');

        if ($request->hasFile('placa')) {

    	    $file=$request->file("placa");
            list($width, $height) = getimagesize($file);

    	    $nombre = "pdf_".time().".".$file->guessExtension();
    	    $ruta = public_path("/exp-placa/".$nombre);

    	    if($width>1920 || $height>1080){
                if($file->guessExtension()=="pdf"){
                    copy($file, $ruta);
                    $exp_placas->placa = $nombre;

                }else {
                    $urlfoto = $request->file('placa');
                    $nombre = time() . "." . $urlfoto->guessExtension();
                    $ruta = public_path('/exp-placa/' . $nombre);
                    $compresion = Image::make($urlfoto->getRealPath())
                        ->save($ruta, 80);
                    $exp_placas->placa = $compresion->basename;
                }
            }else{
                    $urlfoto = $request->file('placa');
                    $nombre = time() . "." . $urlfoto->guessExtension();
                    $ruta = public_path('/exp-placa/' . $nombre);

                  switch($width ){
                      case($width<=576):
                        $compresion = Image::make($urlfoto->getRealPath())
                            ->save($ruta);
                        $exp_placas->placa = $compresion->basename;
                      break;
                      case($width>=577):
                          $compresion = Image::make($urlfoto->getRealPath())
                                ->rotate(270)
                                ->save($ruta);
                            $exp_placas->placa = $compresion->basename;
                      break;
                   }
            }
   	    }

        $exp_placas->id_user = auth()->user()->id;
    	$exp_placas->current_auto = auth()->user()->current_auto;

        $exp_placas->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-bp', compact('exp_placas'));
    }

     function destroy($id){
        $exp_placas = ExpPlacas::findOrFail($id);
        unlink(public_path('/exp-placa/'.$exp_placas->placa));
        $exp_placas->delete();

        Session::flash('destroy', 'Se Elimino su Factura con exito');
        return redirect()->back();

    }
/*|--------------------------------------------------------------------------
|Exp Placas Admin
|--------------------------------------------------------------------------*/

    public function create_admin($id)
    {
        /* Trae los datos el auto en el que esta */
        $automovil = DB::table('automovil')
        ->where('id','=',$id)
        ->first();

        $exp_auto = $automovil->id;

        $exp_placas = DB::table('exp_placas')
        ->where('current_auto','=', $exp_auto)
        ->paginate(6);

        return view('admin.exp-fisico.view-bp-admin',compact('exp_placas','automovil'));
    }

    public function store_admin(Request $request,$id){

        $validate = $this->validate($request,[
            'placa' => 'mimes:jpeg,bpm,jpg,png,pdf|max:900',
        ]);

        $exp = new ExpPlacas;

        $exp->titulo = $request->get('titulo');

        if ($request->hasFile('placa')) {

    	    $file=$request->file("placa");
            list($width, $height) = getimagesize($file);

    	    $nombre = "pdf_".time().".".$file->guessExtension();
    	    $ruta = public_path("/exp-placa/".$nombre);

    	    if($width>1920 || $height>1080){
                if($file->guessExtension()=="pdf"){
                    copy($file, $ruta);
                    $exp->placa = $nombre;

                }else {
                    $urlfoto = $request->file('placa');
                    $nombre = time() . "." . $urlfoto->guessExtension();
                    $ruta = public_path('/exp-placa/' . $nombre);
                    $compresion = Image::make($urlfoto->getRealPath())
                        ->save($ruta, 80);
                    $exp->placa = $compresion->basename;
                }
            }else{
                    $urlfoto = $request->file('placa');
                    $nombre = time() . "." . $urlfoto->guessExtension();
                    $ruta = public_path('/exp-placa/' . $nombre);

                  switch($width ){
                      case($width<=576):
                        $compresion = Image::make($urlfoto->getRealPath())
                            ->save($ruta);
                        $exp->placa = $compresion->basename;
                      break;
                      case($width>=577):
                          $compresion = Image::make($urlfoto->getRealPath())
                                ->rotate(270)
                                ->save($ruta);
                            $exp->placa = $compresion->basename;
                      break;
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
