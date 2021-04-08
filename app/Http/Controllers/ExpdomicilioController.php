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
                $urlfoto = $request->file('domicilio');
                $nombre = time().".".$urlfoto->guessExtension();
                $ruta = public_path('/exp-domicilio/'.$nombre);
                $compresion = Image::make($urlfoto->getRealPath())
                    ->save($ruta,10);
                $exp_domicilio->domicilio = $compresion->basename;
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
        ->get();

        return view('admin.exp-fisico.view-cd-admin',compact('exp_domicilio','automovil'));
    }

    public function store_admin(Request $request,$id){

        $validate = $this->validate($request,[
            'domicilio' => 'mimes:jpeg,bpm,jpg,png,pdf|max:900',
        ]);

        $exp = new ExpDomicilio;
        $exp->titulo = $request->get('titulo');
    	if ($request->hasFile('domicilio')) {
                $urlfoto = $request->file('domicilio');
                $nombre = time().".".$urlfoto->guessExtension();
                $ruta = public_path('/exp-domicilio/'.$nombre);
                $compresion = Image::make($urlfoto->getRealPath())
                    ->save($ruta,10);
                $exp->domicilio = $compresion->basename;
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

}
