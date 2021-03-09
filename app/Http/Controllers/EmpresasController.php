<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Alertas;

class EmpresasController extends Controller
{

     public function __construct(){
        $this->middleware('auth');
    }
/*|--------------------------------------------------------------------------
|Create Empresa Auto_Admin
|--------------------------------------------------------------------------*/
    public function create_empresa(){
         $user = DB::table('users')
            ->where('role','=', '0')
            ->get();

         // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();
          $alert2 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('start','<=', $current)
            ->where('status', '=', 0)
            ->get();

        return view('admin.garaje.create-garaje-admin',compact('user', 'alert2'));
    }

    public function store_empresa(Request $request){

        $validate = $this->validate($request,[
            'nombre' => 'required|max:191',
            'email' => 'required|string|email|max:191',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $empresa = new Empresa;
        $empresa->nombre = $request->get('nombre');
        $empresa->telefono = $request->get('telefono');
        $empresa->direccion = $request->get('direccion');
        $empresa->referencia = $request->get('referencia');
        $empresa->email = $request->get('email');
        $empresa->password = Hash::make($request->password);

    	if ($request->hasFile('img')) {
    		$file=$request->file('img');
    		$file->move(public_path().'/img-empresa',time().".".$file->getClientOriginalExtension());
    		$empresa->img=time().".".$file->getClientOriginalExtension();
    	}

        $empresa->save();

    	Session::flash('empresa', 'Se ha guardado sus datos con exito');
       return redirect()->route('create_admin.automovil');
    }

/*|--------------------------------------------------------------------------
|Create Empresa Admin
|--------------------------------------------------------------------------*/
     function index_admin(){

        $empresa = Empresa::get();

        $user = DB::table('users')
            ->where('role','=', '0')
            ->get();

        // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();
          $alert2 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('start','<=', $current)
              ->where('status', '=', 0)
            ->get();

        return view('admin.empresas.view-empresas-admin',compact('empresa','user', 'alert2'));
    }

     public function create_admin(){

          $user = DB::table('users')
            ->where('role','=', '0')
            ->get();

                          // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();
          $alert2 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('start','<=', $current)
              ->where('status', '=', 0)
            ->get();

        return view('admin.empresas.add-empresa-admin',compact('user', 'alert2'));
    }

    public function store_admin(Request $request)
    {
       $validate = $this->validate($request,[
            'nombre' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
        ]);

        $empresa = new Empresa;
        $empresa->nombre = $request->get('nombre');
        $empresa->telefono = $request->get('telefono');
        $empresa->direccion = $request->get('direccion');
        $empresa->referencia = $request->get('referencia');
        $empresa->email = $request->get('email');
        $empresa->password = Hash::make($request->password);

    	if ($request->hasFile('img')) {
    		$file=$request->file('img');
    		$file->move(public_path().'/img-empresa',time().".".$file->getClientOriginalExtension());
    		$empresa->img=time().".".$file->getClientOriginalExtension();
    	}

        $empresa->save();

       Session::flash('success', 'Se ha actualizado sus datos con exito');
        return redirect()->route('index_admin.empresa');
    }

    public function edit_admin($id){

       $empresa = Empresa::findOrFail($id);

       $empresas = DB::table('empresa')
        ->get();

        $user = DB::table('users')
        ->get();

                          // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();
          $alert2 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('start','<=', $current)
              ->where('status', '=', 0)
            ->get();

        return view('admin.empresas.edit-empresa-admin',compact('empresa','empresas','user', 'alert2'));
    }

    public function update_admin(Request $request,$id)
    {
        $empresa = Empresa::findOrFail($id);

        $empresa->nombre = $request->get('nombre');
        $empresa->telefono = $request->get('telefono');
        $empresa->direccion = $request->get('direccion');
        $empresa->referencia = $request->get('referencia');
        $empresa->email = $request->get('email');
        $empresa->password = Hash::make($request->password);

    	if ($request->hasFile('img')) {
    		$file=$request->file('img');
    		$file->move(public_path().'/img-empresa',time().".".$file->getClientOriginalExtension());
    		$empresa->img=time().".".$file->getClientOriginalExtension();
    	}

        $empresa->update();

        Session::flash('success', 'Se ha actualizado sus datos con exito');

//        return redirect()->back();
        return redirect()->route('index_admin.empresa');
    }
}
