<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Automovil;
use App\Models\Seguros;
use App\Models\User;
use Session;

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

        return view('garaje.create-garaje',compact('marca'));
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
        $automovil->estatus = $request->get('estatus');
        $automovil->submarca = $request->get('submarca');
        $automovil->tipo = $request->get('tipo');
        $automovil->kilometraje = $request->get('kilometraje');
        $automovil->subtipo = $request->get('subtipo');
        $automovil->año = $request->get('año');
        $automovil->numero_serie = $request->get('numero_serie');
        $automovil->color = $request->get('color');
        $automovil->placas = $request->get('placas');

        $automovil->id_user = auth()->user()->id;
        $automovil->save();

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $seguro = new  Seguros;
        $seguro->seguro = 'gnp';
        $seguro->tipo_cobertura = 'total';
        $seguro->costo = '100';
        $seguro->costo_anual = '100';
        $seguro->id_user = $user->id;
        $seguro->current_auto = $automovil->id;
        $seguro->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.automovil', compact('automovil'));
    }

    public function  edit($id){

        $automovil = Automovil::findOrFail($id);

        $marca = DB::table('marca')
            ->get();

        return view('garaje.edit-garaje',compact('automovil', 'marca'));
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
        $automovil->submarca = $request->get('submarca');
        $automovil->tipo = $request->get('tipo');
        $automovil->kilometraje = $request->get('kilometraje');
        $automovil->subtipo = $request->get('subtipo');
        $automovil->año = $request->get('año');
        $automovil->numero_serie = $request->get('numero_serie');
        $automovil->color = $request->get('color');
        $automovil->placas = $request->get('placas');

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

    function index_admin(){

        $automovil = Automovil::where('id_empresa', '=', NULL)->get();

        $automovil2 = Automovil::where('id_user', '=', NULL)->get();
        return view('admin.garaje.view-garaje-admin',compact('automovil', 'automovil2'));
    }

    public function create_admin(){
         $marca = DB::table('marca')
            ->get();

         $user = DB::table('users')
            ->where('role','=', '0')
            ->get();

         $empresa = DB::table('empresa')
            ->get();

        return view('admin.garaje.create-garaje-admin',compact('marca', 'user', 'empresa'));
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
        $automovil->submarca = $request->get('submarca');
        $automovil->tipo = $request->get('tipo');
        $automovil->kilometraje = $request->get('kilometraje');
        $automovil->subtipo = $request->get('subtipo');
        $automovil->año = $request->get('año');
        $automovil->numero_serie = $request->get('numero_serie');
        $automovil->color = $request->get('color');
        $automovil->placas = $request->get('placas');
//dd($automovil);
        $automovil->save();

        $seguro = new  Seguros;
        $seguro->seguro = 'gnp';
        $seguro->tipo_cobertura = 'total';
        $seguro->costo = '100';
        $seguro->costo_anual = '100';
        $seguro->id_user = $automovil->id_user;
        $seguro->id_empresa = $automovil->id_empresa;
        $seguro->current_auto = $automovil->id;
        $seguro->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index_admin.automovil', compact('automovil'));
    }

    public function  edit_admin($id){

        $automovil = Automovil::findOrFail($id);

        $marca = DB::table('marca')
            ->get();

        $user = DB::table('users')
            ->where('role','=', '0')
            ->get();

        return view('admin.garaje.edit-garaje-admin',compact('automovil', 'marca', 'user'));
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
        $automovil->submarca = $request->get('submarca');
        $automovil->tipo = $request->get('tipo');
        $automovil->kilometraje = $request->get('kilometraje');
        $automovil->subtipo = $request->get('subtipo');
        $automovil->año = $request->get('año');
        $automovil->numero_serie = $request->get('numero_serie');
        $automovil->color = $request->get('color');
        $automovil->placas = $request->get('placas');

        $automovil->update();

        $marca = DB::table('marca')
            ->get();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index_admin.automovil', compact('automovil','marca'));
    }
}
