<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\ExpIne;
use Session;
use Image;

class ExpineController extends Controller
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

        $exp_ine = DB::table('exp_ine')
        ->where('id_user','=',$auto_user)
        ->where('current_auto','=',auth()->user()->current_auto)
        ->get();

        return view('exp-fisico.view-ine',compact('exp_ine'));
    }

    public function create(){

        return view('exp-fisico.view-ine');
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'ine' => 'mimes:jpeg,bpm,jpg,png,pdf|max:900',
        ]);

        $exp_ine = new ExpIne;

        $exp_ine->titulo = $request->get('titulo');
    	if ($request->hasFile('ine')) {
                $urlfoto = $request->file('ine');
                $nombre = time().".".$urlfoto->guessExtension();
                $ruta = public_path('/exp-ine/'.$nombre);
                $compresion = Image::make($urlfoto->getRealPath())
                    ->save($ruta,10);
                $exp_ine->ine = $compresion->basename;
   	}


        $exp_ine->id_user = auth()->user()->id;
    	$exp_ine->current_auto = auth()->user()->current_auto;

        $exp_ine->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-ine', compact('exp_ine'));
    }

        public function create_admin($id)
    {
        /* Trae los datos el auto en el que esta */
        $automovil = DB::table('automovil')
        ->where('id','=',$id)
        ->first();

        $exp_auto = $automovil->id;

        $exp_ine = DB::table('exp_ine')
        ->where('current_auto','=', $exp_auto)
        ->paginate(6);

        return view('admin.exp-fisico.view-ine-admin',compact('exp_ine','automovil'));
    }

    public function store_admin(Request $request,$id){

        $validate = $this->validate($request,[
            'ine' => 'mimes:jpeg,bpm,jpg,png,pdf|max:900',
        ]);

        $exp = new ExpIne;

        $exp->titulo = $request->get('titulo');
    	if ($request->hasFile('ine')) {
                $urlfoto = $request->file('ine');
                $nombre = time().".".$urlfoto->guessExtension();
                $ruta = public_path('/exp-ine/'.$nombre);
                $compresion = Image::make($urlfoto->getRealPath())
                    ->save($ruta,10);
                $exp->ine = $compresion->basename;
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
        $exp = ExpIne::findOrFail($id);
        unlink(public_path('/exp-ine/'.$exp->ine));
        $exp->delete();

        Session::flash('destroy', 'Se Elimino su Factura con exito');
        return redirect()->back();

    }
}
