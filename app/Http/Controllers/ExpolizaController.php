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
      function index(){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $auto_user = $user->{'id'};

        $exp_poliza = DB::table('exp_poliza')
        ->where('id_user','=',$auto_user)
        ->where('current_auto','=',auth()->user()->current_auto)
        ->get();

        $img = TarjetaCirculacion::where('current_auto','=',$user->current_auto)->first();

        return view('exp-fisico.view-poliza',compact('exp_poliza', 'img'));
    }

    public function create(){

        return view('exp-fisico.view-poliza');
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'poliza' => 'mimes:jpeg,bpm,jpg,png,pdf|max:900',
        ]);

        $exp_poliza = new ExpPoliza;

        $exp_poliza->titulo = $request->get('titulo');
    	if ($request->hasFile('poliza')) {
                $urlfoto = $request->file('poliza');
                $nombre = time().".".$urlfoto->guessExtension();
                $ruta = public_path('/exp-poliza/'.$nombre);
                $compresion = Image::make($urlfoto->getRealPath())
                    ->save($ruta,10);
   	}
         $exp_poliza->poliza = $compresion->basename;

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
        ->where('id','=',$id)
        ->first();

        $exp_auto = $automovil->id;

        $exp_poliza = DB::table('exp_poliza')
        ->where('current_auto','=', $exp_auto)
        ->get();

        return view('admin.exp-fisico.view-poliza-admin',compact('exp_poliza','automovil'));
    }

    public function store_admin(Request $request, $id){

        $validate = $this->validate($request,[
            'poliza' => 'mimes:jpeg,bpm,jpg,png,pdf|max:900',
        ]);

        $exp = new ExpPoliza;

        $exp->titulo = $request->get('titulo');
    	if ($request->hasFile('poliza')) {
                $urlfoto = $request->file('poliza');
                $nombre = time().".".$urlfoto->guessExtension();
                $ruta = public_path('/exp-poliza/'.$nombre);
                $compresion = Image::make($urlfoto->getRealPath())
                    ->save($ruta,10);
   	}
         $exp_poliza->poliza = $compresion->basename;

    	$exp->current_auto = $request->get('current_auto');

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
