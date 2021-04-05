<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Models\Automovil;
use App\Models\Seguros;
use App\Models\User;
use App\Models\TarjetaCirculacion;
use Session;
use Image;
use App\Models\Verificacion;
use App\Models\VerificacionSegunda;

class AutomovilController extends Controller
{
/*|--------------------------------------------------------------------------
|Garaje Edit/Create/Index - User
|--------------------------------------------------------------------------*/
    function index(){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $auto_user = $user->{'id'};

        $automovil = DB::table('automovil')
        ->where('id_user','=',$auto_user)
        ->get();

        $carro = DB::table('automovil')
        ->where('id','=',auth()->user()->current_auto)
        ->get();

        $users = DB::table('users')
        ->get();

        return view('garaje.view-garaje',compact('carro', 'automovil', 'users'));
    }

    public function create(){
         $marca = DB::table('marca')
            ->get();

         $user = DB::table('users')
            ->where('role','=', '0')
            ->get();

        $users = DB::table('users')
        ->get();

        return view('garaje.create-garaje',compact('marca', 'users'));
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'submarca' => 'required|max:191',
            'tipo' => 'required|max:191',
            'kilometraje' => 'required|max:191',
            'subtipo' => 'required|max:191',
            'año' => 'required|max:191',
            'numero_serie' => 'required|max:191',
            'color' => 'required|max:191',
            'placas' => 'required|max:191',
        ]);

        $automovil = new Automovil;
        $automovil->id_marca = $request->get('id_marca');
        $automovil->submarca = strtoupper($request->get('submarca'));
        $automovil->tipo = strtoupper($request->get('tipo'));
        $automovil->kilometraje = $request->get('kilometraje');
        $automovil->subtipo = strtoupper($request->get('subtipo'));
        $automovil->año = $request->get('año');
        $automovil->numero_serie = strtoupper($request->get('numero_serie'));
        $automovil->color = $request->get('color');
        $placa = strtoupper($request->get('placas'));
        $automovil->placas = $placa;

    	if ($request->hasFile('img')) {
                $urlfoto = $request->file('img');
                $nombre = time().".".$urlfoto->guessExtension();
                $ruta = public_path('/img-auto/'.$nombre);
                $compresion = Image::make($urlfoto->getRealPath())
                    ->save($ruta,10);
   	    }
         $automovil->img = $compresion->basename;

        $automovil->id_user = auth()->user()->id;
        $automovil->save();

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $seguro = new  Seguros;
        $seguro->seguro = 'gnp';
        $seguro->tipo_cobertura = 'Amplia';
        $seguro->costo = '100';
        $seguro->costo_anual = '100';
        $seguro->id_user = $user->id;
        $seguro->estatus = 0;
        $seguro->current_auto = $automovil->id;
        $seguro->save();

        $tarjeta_circulacion = new  TarjetaCirculacion;
        $tarjeta_circulacion->id_user = $user->id;
        $tarjeta_circulacion->current_auto = $automovil->id;
        $tarjeta_circulacion->estatus = 0;
        $tarjeta_circulacion->save();

        $id = auth()->user()->id;
        $user = User::findOrFail($id);
        $user->current_auto = $automovil->id;
        $user->update();

        $verificacion = new  Verificacion;
        $verificacion->id_user = $id;
        $verificacion->current_auto = $automovil->id;
        $verificacion->estatus = 0;
        $verificacion->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.automovil', compact('automovil'));
    }

    public function  edit($id){

        $automovil = Automovil::findOrFail($id);

        $marca = DB::table('marca')
            ->get();

                $users = DB::table('users')
        ->get();

        return view('garaje.edit-garaje',compact('automovil', 'marca', 'users'));
    }

    function update(Request $request, $id){

        $validate = $this->validate($request, [
            'submarca' => 'required|max:191',
            'tipo' => 'required|max:191',
            'kilometraje' => 'required|max:191',
            'subtipo' => 'required|max:191',
            'año' => 'required|max:191',
            'numero_serie' => 'required|max:191',
            'color' => 'required|max:191',
            'placas' => 'required|max:191',
        ]);

        $automovil = Automovil::findOrFail($id);
        $automovil->id_marca = $request->get('id_marca');
        $automovil->submarca = strtoupper($request->get('submarca'));
        $automovil->tipo = strtoupper($request->get('tipo'));
        $automovil->kilometraje = $request->get('kilometraje');
        $automovil->subtipo = strtoupper($request->get('subtipo'));
        $automovil->año = $request->get('año');
        $automovil->numero_serie = strtoupper($request->get('numero_serie'));
        $automovil->color = $request->get('color');
        $placa = strtoupper($request->get('placas'));
        $automovil->placas = $placa;

    	if ($request->hasFile('img')) {
                $urlfoto = $request->file('img');
                $nombre = time().".".$urlfoto->guessExtension();
                $ruta = public_path('/img-auto/'.$nombre);
                $compresion = Image::make($urlfoto->getRealPath())
                    ->save($ruta,10);
   	    }
         $automovil->img = $compresion->basename;

        $automovil->update();

        $marca = DB::table('marca')
            ->get();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.automovil', compact('automovil','marca'));
    }

    public function current_auto(Request $request, $id){
        $user = User::findOrFail($id);
        $user->current_auto = $request->get('current_auto');
        $user->update();
        Session::flash('succes', 'Se selecciono su pagina de edicion');
        return redirect()->route('index.automovil');
    }

/*|--------------------------------------------------------------------------
|Garaje edit - Admin
|--------------------------------------------------------------------------*/

    function index_admin(Request $request){

        $submarca = $request->get('submarca');
        $placas = $request->get('placas');

        $automovil = Automovil::orderBy('id','DESC')
            ->where('id_empresa', '=', NULL)
            ->submarca($submarca)
            ->placas($placas)
            ->paginate(6);

        $automovil2 = Automovil::orderBy('id','DESC')
            ->where('id_user', '=', NULL)
            ->submarca($submarca)
            ->placas($placas)
            ->paginate(6);
//            ->get();

          $user = DB::table('users')
            ->where('role','=', '0')
            ->get();

        return view('admin.garaje.view-garaje-admin',compact('automovil', 'automovil2', 'user'));
    }

    public function create_admin(){
         $marca = DB::table('marca')
            ->get();

         $user = DB::table('users')
            ->where('role','=', '0')
            ->get();

         $empresa = DB::table('empresa')
            ->get();


        return view('admin.garaje.create-garaje-admin',compact('marca', 'user', 'empresa', 'user'));
    }

    public function store_admin(Request $request){

        $validate = $this->validate($request,[
            'submarca' => 'required|max:191',
            'tipo' => 'required|max:191',
            'kilometraje' => 'required|max:191',
            'subtipo' => 'required|max:191',
            'año' => 'required|max:191',
            'numero_serie' => 'required|max:191',
            'color' => 'required|max:191',
            'placas' => 'required|max:191',
        ]);

        $automovil = new Automovil;
        $automovil->id_user = $request->get('id_user');
        $automovil->id_empresa = $request->get('id_empresa');
        $automovil->id_marca = $request->get('id_marca');
        $automovil->estatus = $request->get('estatus');
        $automovil->submarca = strtoupper($request->get('submarca'));
        $automovil->tipo = strtoupper($request->get('tipo'));
        $automovil->kilometraje = $request->get('kilometraje');
        $automovil->subtipo = strtoupper($request->get('subtipo'));
        $automovil->año = $request->get('año');
        $automovil->numero_serie = strtoupper($request->get('numero_serie'));
        $automovil->color = $request->get('color');
        $placa = strtoupper($request->get('placas'));
        $automovil->placas = $placa;

    	if ($request->hasFile('img')) {
    		$file=$request->file('img');
    		$file->move(public_path().'/img-auto',time().".".$file->getClientOriginalExtension());
    		$automovil->img=time().".".$file->getClientOriginalExtension();
    	}

        $automovil->save();

        $seguro = new  Seguros;
        $seguro->seguro = 'gnp';
        $seguro->tipo_cobertura = 'Amplia';
        $seguro->costo = '100';
        $seguro->estatus = 0;
        $seguro->costo_anual = '100';
        $seguro->id_user = $automovil->id_user;
        $seguro->id_empresa = $automovil->id_empresa;
        $seguro->current_auto = $automovil->id;

        $seguro->save();

        $tarjeta_circulacion = new  TarjetaCirculacion;
        $tarjeta_circulacion->id_user = $automovil->id_user;
        $tarjeta_circulacion->id_empresa = $automovil->id_empresa;
        $tarjeta_circulacion->current_auto = $automovil->id;
        $tarjeta_circulacion->estatus = 0;
        $tarjeta_circulacion->save();

        $verificacion = new  Verificacion;
        $verificacion->id_user = $automovil->id_user;
        $verificacion->id_empresa = $automovil->id_empresa;
        $verificacion->current_auto = $automovil->id;
        $verificacion->estatus = 0;
        $verificacion->save();

        $verificacion_segunda = new  VerificacionSegunda;
        $verificacion_segunda->id_verificacion = $verificacion->id;
        $verificacion_segunda->save();

        $id = $automovil->id_user;
        $user = User::findOrFail($id);
        $user->current_auto = $automovil->id;
        $verificacion->estatus = 0;
        $user->update();

        Session::flash('auto', 'Se ha guardado sus datos con exito');

        return redirect()->route('index_admin.automovil', compact('automovil'));
    }

    public function  edit_admin($id){

        $automovil = Automovil::findOrFail($id);

        $marca = DB::table('marca')
            ->get();

        $empresa = DB::table('empresa')
            ->get();

        $user = DB::table('users')
            ->where('role','=', '0')
            ->get();

        return view('admin.garaje.edit-garaje-admin',compact('automovil', 'marca', 'user','empresa'));
    }

    function update_admin(Request $request, $id){

        $validate = $this->validate($request, [
            'submarca' => 'required|max:191',
            'tipo' => 'required|max:191',
            'kilometraje' => 'required|max:191',
            'subtipo' => 'required|max:191',
            'año' => 'required|max:191',
            'numero_serie' => 'required|max:191',
            'color' => 'required|max:191',
            'placas' => 'required|max:191',
        ]);

        $automovil = Automovil::findOrFail($id);
        $automovil->id_user = $request->get('id_user');
        $automovil->id_empresa = $request->get('id_empresa');
        $automovil->id_marca = $request->get('id_marca');
        $automovil->submarca = strtoupper($request->get('submarca'));
        $automovil->tipo = strtoupper($request->get('tipo'));
        $automovil->kilometraje = $request->get('kilometraje');
        $automovil->subtipo = strtoupper($request->get('subtipo'));
        $automovil->año = $request->get('año');
        $automovil->numero_serie = strtoupper($request->get('numero_serie'));
        $automovil->color = $request->get('color');
        $placa = strtoupper($request->get('placas'));
        $automovil->placas = $placa;

    	if ($request->hasFile('img')) {
    		$file=$request->file('img');
    		$file->move(public_path().'/img-auto',time().".".$file->getClientOriginalExtension());
    		$automovil->img=time().".".$file->getClientOriginalExtension();
    	}

        $automovil->update();

        $marca = DB::table('marca')
            ->get();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index_admin.automovil', compact('automovil','marca'));
    }
}
