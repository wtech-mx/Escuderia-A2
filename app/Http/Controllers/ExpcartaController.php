<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\ExpCarta;
use Session;
use Carbon\Carbon;
use App\Models\Alertas;
use Image;

class ExpcartaController extends Controller
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

        $exp_carta = DB::table('exp_carta')
        ->where('id_user','=',$auto_user)
        ->where('current_auto','=',auth()->user()->current_auto)
        ->get();

        return view('exp-fisico.view-cr',compact('exp_carta'));
    }

    public function create(){
        $users = DB::table('users')
        ->get();
                          // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();
          $alert2 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('start','<=', $current)
              ->where('estatus', '=', 0)
            ->get();

        return view('exp-fisico.view-cr', 'alert2', 'user');
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'carta' => 'mimes:jpeg,bpm,jpg,png,pdf|max:900',
        ]);

        $exp_carta = new ExpCarta;

        $exp_carta->titulo = $request->get('titulo');

    	if ($request->hasFile('carta')) {

                $urlfoto = $request->file('carta');
                $nombre = time().".".$urlfoto->guessExtension();
                $ruta = public_path('/exp-carta/'.$nombre);
                $compresion = Image::make($urlfoto->getRealPath())
                    ->save($ruta,10);
                $exp_carta->carta = $compresion->basename;
   	}


        $exp_carta->id_user = auth()->user()->id;
    	$exp_carta->current_auto = auth()->user()->current_auto;

        $exp_carta->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-cr', compact('exp_carta'));
        //return view('garaje.view-garaje',compact('automovil'));
    }

   public function create_admin($id)
    {
        /* Trae los datos el auto en el que esta */
        $automovil = DB::table('automovil')
        ->where('id','=',$id)
        ->first();

        $exp_auto = $automovil->id;

        $exp_carta = DB::table('exp_carta')
        ->where('current_auto','=', $exp_auto)
        ->get();

        return view('admin.exp-fisico.view-cr-admin',compact('exp_carta','automovil'));
    }

    public function store_admin(Request $request,$id){

        $validate = $this->validate($request,[
            'carta' => 'mimes:jpeg,bpm,jpg,png,pdf|max:900',
        ]);

        $exp = new ExpCarta;
        $exp->titulo = $request->get('titulo');
    	if ($request->hasFile('carta')) {
                $urlfoto = $request->file('carta');
                $nombre = time().".".$urlfoto->guessExtension();
                $ruta = public_path('/exp-carta/'.$nombre);
                $compresion = Image::make($urlfoto->getRealPath())
                    ->save($ruta,10);
                $exp->carta = $compresion->basename;
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
