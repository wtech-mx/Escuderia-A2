<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\ExpReemplacamiento;
use Session;
use Carbon\Carbon;
use App\Models\Alertas;
use App\Models\Seguros;
use App\Models\TarjetaCirculacion;
use Image;

class ExpreemplacaminetoController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

     function index(){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $auto_user = $user->{'id'};

        $exp_reemplacamiento = DB::table('exp_reemplacamiento')
        ->where('id_user','=',$auto_user)
        ->where('current_auto','=',auth()->user()->current_auto)
        ->get();

        return view('exp-fisico.view-reemplacamiento',compact('exp_reemplacamiento'));
    }

    public function create(){

                          // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();
          $alert2 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('start','<=', $current)
              ->where('estatus', '=', 0)
            ->get();
          //Trae la alerta Seguro
          $seguro_alerta = Seguros::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('end','<=', $current)
            ->get();
          //Trae la alerta Tc
          $tc_alerta = TarjetaCirculacion::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('end','<=', $current)
            ->get();

        return view('exp-fisico.view-reemplacamiento', compact('alert2', 'seguro_alerta','tc_alerta'));
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'reemplacamiento' => 'mimes:jpeg,bpm,jpg,png,pdf|max:900',
        ]);

        $exp_reemplacamiento = new ExpReemplacamiento;

        $exp_reemplacamiento->titulo = $request->get('titulo');

        if ($request->hasFile('reemplacamiento')) {

    	    $file=$request->file("reemplacamiento");
            list($width, $height) = getimagesize($file);

    	    $nombre = "pdf_".time().".".$file->guessExtension();
    	    $ruta = public_path("/exp-reemplacamiento/".$nombre);

    	    if($width>1920 || $height>1080){
                if($file->guessExtension()=="pdf"){
                    copy($file, $ruta);
                    $exp_reemplacamiento->reemplacamiento = $nombre;

                }else {
                    $urlfoto = $request->file('reemplacamiento');
                    $nombre = time() . "." . $urlfoto->guessExtension();
                    $ruta = public_path('/exp-reemplacamiento/' . $nombre);
                    $compresion = Image::make($urlfoto->getRealPath())
                        ->save($ruta, 80);
                    $exp_reemplacamiento->reemplacamiento = $compresion->basename;
                }
            }else{
                    $urlfoto = $request->file('reemplacamiento');
                    $nombre = time() . "." . $urlfoto->guessExtension();
                    $ruta = public_path('/exp-reemplacamiento/' . $nombre);

                  switch($width ){
                      case($width<=576):
                        $compresion = Image::make($urlfoto->getRealPath())
                            ->save($ruta);
                        $exp_reemplacamiento->reemplacamiento = $compresion->basename;
                      break;
                      case($width>=577):
                          $compresion = Image::make($urlfoto->getRealPath())
                                ->rotate(270)
                                ->save($ruta);
                            $exp_reemplacamiento->reemplacamiento = $compresion->basename;
                      break;
                   }
            }
   	    }

        $exp_reemplacamiento->id_user = auth()->user()->id;
    	$exp_reemplacamiento->current_auto = auth()->user()->current_auto;

        $exp_reemplacamiento->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-reemplacamiento', compact('exp_reemplacamiento'));
    }

        public function create_admin($id)
    {
        /* Trae los datos el auto en el que esta */
        $automovil = DB::table('automovil')
        ->where('id','=',$id)
        ->first();

        $exp_auto = $automovil->id;

        $exp_reemplacamiento = DB::table('exp_reemplacamiento')
        ->where('current_auto','=', $exp_auto)
        ->paginate(6);

                          // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();
          $alert2 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('start','<=', $current)
              ->where('estatus', '=', 0)
            ->get();
          //Trae la alerta Seguro
          $seguro_alerta = Seguros::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('end','<=', $current)
            ->get();
          //Trae la alerta Tc
          $tc_alerta = TarjetaCirculacion::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('end','<=', $current)
            ->get();

        return view('admin.exp-fisico.view-reemplacamiento-admin',compact('exp_reemplacamiento','automovil', 'alert2','seguro_alerta','tc_alerta'));
    }

    public function store_admin(Request $request,$id){

        $validate = $this->validate($request,[
            'reemplacamiento' => 'mimes:jpeg,bpm,jpg,png,pdf|max:900',
        ]);

        $exp = new ExpReemplacamiento;

        $exp->titulo = $request->get('titulo');

        if ($request->hasFile('reemplacamiento')) {

    	    $file=$request->file("reemplacamiento");
            list($width, $height) = getimagesize($file);

    	    $nombre = "pdf_".time().".".$file->guessExtension();
    	    $ruta = public_path("/exp-reemplacamiento/".$nombre);

    	    if($width>1920 || $height>1080){
                if($file->guessExtension()=="pdf"){
                    copy($file, $ruta);
                    $exp->reemplacamiento = $nombre;

                }else {
                    $urlfoto = $request->file('reemplacamiento');
                    $nombre = time() . "." . $urlfoto->guessExtension();
                    $ruta = public_path('/exp-reemplacamiento/' . $nombre);
                    $compresion = Image::make($urlfoto->getRealPath())
                        ->save($ruta, 80);
                    $exp->reemplacamiento = $compresion->basename;
                }
            }else{
                    $urlfoto = $request->file('reemplacamiento');
                    $nombre = time() . "." . $urlfoto->guessExtension();
                    $ruta = public_path('/exp-reemplacamiento/' . $nombre);

                  switch($width ){
                      case($width<=576):
                        $compresion = Image::make($urlfoto->getRealPath())
                            ->save($ruta);
                        $exp->reemplacamiento = $compresion->basename;
                      break;
                      case($width>=577):
                          $compresion = Image::make($urlfoto->getRealPath())
                                ->rotate(270)
                                ->save($ruta);
                            $exp->reemplacamiento = $compresion->basename;
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

     function destroy($id){
        $exp = ExpReemplacamiento::findOrFail($id);
        unlink(public_path('/exp-reemplacamiento/'.$exp->reemplacamiento));
        $exp->delete();

        Session::flash('destroy', 'Se Elimino su Factura con exito');
        return redirect()->back();

    }
}
