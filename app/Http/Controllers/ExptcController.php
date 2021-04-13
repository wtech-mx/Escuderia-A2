<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\ExpTc;
use App\Models\TarjetaCirculacion;
use Session;
use Image;

class ExptcController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

     function index(){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $auto_user = $user->{'id'};

        $exp_tc = DB::table('exp_tc')
        ->where('id_user','=',$auto_user)
        ->where('current_auto','=',auth()->user()->current_auto)
        ->get();

        $img = TarjetaCirculacion::where('current_auto','=',$user->current_auto)->get();

        return view('exp-fisico.view-tc',compact('exp_tc', 'img'));
    }

    public function create(){

        return view('exp-fisico.view-tc');
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'tc' => 'mimes:jpeg,bpm,jpg,png,pdf|max:900',
        ]);

        $exp_tc = new ExpTc;

        $exp_tc->titulo = $request->get('titulo');
    	if ($request->hasFile('tc')) {
                $urlfoto = $request->file('tc');
                $nombre = time().".".$urlfoto->guessExtension();
                $ruta = public_path('/exp-tc/'.$nombre);
                $compresion = Image::make($urlfoto->getRealPath())
                    ->save($ruta,10);
                $exp_tc->tc = $compresion->basename;
   	}

        $exp_tc->id_user = auth()->user()->id;
    	$exp_tc->current_auto = auth()->user()->current_auto;

        $exp_tc->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-tc', compact('exp_tc'));
    }
/*|--------------------------------------------------------------------------
|Create TC Admin_Admin
|--------------------------------------------------------------------------*/

    public function create_admin($id)
    {
        /* Trae los datos el auto en el que esta */
        $automovil = DB::table('automovil')
        ->where('id','=',$id)
        ->first();

        $exp_tc = DB::table('exp_tc')
        ->where('current_auto','=', $automovil->id)
        ->paginate(6);

        return view('admin.exp-fisico.view-tc-admin',compact('exp_tc','automovil'));
    }

    public function store_admin(Request $request,$id){

        $validate = $this->validate($request,[
            'tc' => 'mimes:jpeg,bpm,jpg,png,pdf|max:900',
        ]);

        $exp = new ExpTc;

        $exp->titulo = $request->get('titulo');
    	if ($request->hasFile('tc')) {
                $urlfoto = $request->file('tc');
                $nombre = time().".".$urlfoto->guessExtension();
                $ruta = public_path('/exp-tc/'.$nombre);
                $compresion = Image::make($urlfoto->getRealPath())
                    ->save($ruta,10);
                $exp->tc = $compresion->basename;
   	}


//    	$exp->fecha_expedicion = $request->get('fecha_expedicion');

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
        $exp = ExpTc::findOrFail($id);
        unlink(public_path('/exp-tc/'.$exp->tc));
        $exp->delete();

        Session::flash('destroy', 'Se Elimino su Factura con exito');
        return redirect()->back();

    }
}
