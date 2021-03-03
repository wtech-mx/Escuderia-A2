<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;


use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

     public function __construct(){
        $this->middleware('auth');
    }

/*|--------------------------------------------------------------------------
|USER DASHBOARD
|--------------------------------------------------------------------------*/

    public function dashboard()
    {

        $user = User::where('id','=',auth()->user()->id)
        ->first();

            if($user->role == '0'){
                return view('dashboard',compact('user'));
            }else{
                return view('admin.dashboard',compact('user'));
            }

    }
/*|--------------------------------------------------------------------------
|Create User Auto_Admin
|--------------------------------------------------------------------------*/
    public function create()
    {
        return view('admin.garaje.create-garaje-admin');
    }

    public function store_auto(Request $request)
    {
       $validate = $this->validate($request,[
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = new User;
        $user->name = $request->get('name');
        $user->role = $request->get('role');
        $user->telefono = $request->get('telefono');
        $user->email = $request->get('email');
        $user->fecha_nacimiento = $request->get('fecha_nacimiento');
        $user->direccion = $request->get('direccion');
        $user->referencia = $request->get('referencia');
        $user->genero = $request->get('genero');
        $user->password = Hash::make($request->password);

        $user->save();

        Session::flash('user', 'Se ha guardado sus datos con exito');
        return redirect()->route('create_admin.automovil');
    }

/*|--------------------------------------------------------------------------
|Edit User Profile
|--------------------------------------------------------------------------*/
    public function update(Request $request,$id){

        $validate = $this->validate($request,[
            'name' => 'max:191',
            'telefono' => 'max:191',
            'email' => 'max:191',
            'fecha_nacimiento' => 'max:191',
    		'direccion' => 'max:191',
            'referencia' => 'max:191',
            'genero' => 'max:191',
//            'password' => 'string|confirmed|min:8',
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->get('name');
        $user->telefono = $request->get('telefono');
        $user->email = $request->get('email');
        $user->fecha_nacimiento = $request->get('fecha_nacimiento');
        $user->direccion = $request->get('direccion');
        $user->referencia = $request->get('referencia');
        $user->genero = $request->get('genero');
        $user->password = Hash::make($request->password);

    	if ($request->hasFile('img')) {
    		$file=$request->file('img');
    		$file->move(public_path().'/img-perfil',time().".".$file->getClientOriginalExtension());
    		$user->img=time().".".$file->getClientOriginalExtension();
    	}

        $users = DB::table('users')
        ->get();

        dd($user);
        $user->update();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return view('profile.profile', compact('user', 'users'));
    }

    public function edit($id){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $user = User::findOrFail($id);

        $users = DB::table('users')
            ->get();

        return view('profile.profile', compact('user','users'));
    }

/*|--------------------------------------------------------------------------
|Create User Admin_Admin
|--------------------------------------------------------------------------*/
     function index_admin(){

        $user = User::where('role', '=', '0')->get();

        return view('admin.user.view-user-admin',compact('user'));
    }

    public function create_admin()
    {

        $user = DB::table('users')
        ->get();

        return view('admin.user.add-user-admin',compact('user'));
    }

    public function store_admin(Request $request)
    {
       $validate = $this->validate($request,[
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
//            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = new User;
        $user->name = $request->get('name');
        $user->role = $request->get('role');
        $user->telefono = $request->get('telefono');
        $user->email = $request->get('email');
        $user->fecha_nacimiento = $request->get('fecha_nacimiento');
        $user->direccion = $request->get('direccion');
        $user->referencia = $request->get('referencia');
        $user->genero = $request->get('genero');
        $user->password = Hash::make($request->password);

    	if ($request->hasFile('img')) {
    		$file=$request->file('img');
    		$file->move(public_path().'/img-perfil',time().".".$file->getClientOriginalExtension());
    		$user->img=time().".".$file->getClientOriginalExtension();
    	}

        $user->save();

        Session::flash('success', 'Se ha actualizado sus datos con exito');
        return redirect()->route('index_admin.user');
    }

    public function edit_admin($id){

       $user = User::findOrFail($id);

        $users = DB::table('users')
        ->get();

        return view('admin.user.edit-user-admin',compact('user','users'));
    }

    public function update_admin(Request $request,$id)
    {

        $user = User::findOrFail($id);

        $user->name = $request->get('name');
        $user->telefono = $request->get('telefono');
        $user->email = $request->get('email');
        $user->fecha_nacimiento = $request->get('fecha_nacimiento');
        $user->direccion = $request->get('direccion');
        $user->referencia = $request->get('referencia');
        $user->genero = $request->get('genero');
        $user->password = Hash::make($request->password);

    	if ($request->hasFile('img')) {
    		$file=$request->file('img');
    		$file->move(public_path().'/img-perfil',time().".".$file->getClientOriginalExtension());
    		$user->img=time().".".$file->getClientOriginalExtension();
    	}



        $user->update();

        Session::flash('success', 'Se ha actualizado sus datos con exito');
//        return redirect()->back();
         return redirect()->route('index_admin.user');

    }


}
