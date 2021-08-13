<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Licencia;
use App\Models\ModalHasRoles;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;
use Image;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('pagespeed');
    }

    /*|--------------------------------------------------------------------------
|Create User Auto_Admin
|--------------------------------------------------------------------------*/
    public function create()
    {
        $users = DB::table('users')
            ->where('empresa', '=', 0)
            ->get();

        return view('admin.garaje.create-garaje-admin', compact('users'));
    }

    public function store_auto(Request $request)
    {
        $validate = $this->validate($request, [
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
    public function update(Request $request, $id)
    {

        $validate = $this->validate($request, [
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

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $file->move(public_path() . '/img-perfil', time() . "." . $file->getClientOriginalExtension());
            $user->img = time() . "." . $file->getClientOriginalExtension();

            $filepath = public_path('/img-perfil/' . $user->img);

            try {
                \Tinify\setKey(env("TINIFY_API_KEY"));
                $source = \Tinify\fromFile($filepath);
                $source->toFile($filepath);
            } catch (\Tinify\AccountException $e) {
                // Verify your API key and account limit.
                return redirect()->back()->with('error', $e->getMessage());
            } catch (\Tinify\ClientException $e) {
                // Check your source image and request options.
                return redirect()->back()->with('error', $e->getMessage());
            } catch (\Tinify\ServerException $e) {
                // Temporary issue with the Tinify API.
                return redirect()->back()->with('error', $e->getMessage());
            } catch (\Tinify\ConnectionException $e) {
                // A network connection error occurred.
                return redirect()->back()->with('error', $e->getMessage());
            } catch (Exception $e) {
                // Something else went wrong, unrelated to the Tinify API.
                return redirect()->back()->with('error', $e->getMessage());
            }
        }


        $users = DB::table('users')
            ->get();

        $user->update();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return view('profile.profile', compact('user', 'users'));
    }

    public function edit($id)
    {

        $user = User::findOrFail($id);

        $users = DB::table('users')
            ->where('empresa', '=', 0)
            ->get();

        return view('profile.profile', compact('user', 'users'));
    }

    public function update_password(Request $request, $id)
    {

        $user = User::findOrFail($id);

        $pass = $user->password = $request->password;
        $user->password = Hash::make($request->password);
        $email = $user->email;

        $details = array(
            'email' => $email,
            'password' => $pass,
        );

        $subject = 'Cambio de clave : ' . $email;

        if ($user->update() == TRUE) {

            Mail::send('emails.actualizacion-password', $details, function ($message) use ($details, $subject) {
                $message->to($details['email'], $details['password'])
                    ->subject($subject)
                    ->from('contacto@checkngo.com.mx', 'Actualizacion de contrasena checkngo');
            });

            $to = $email;
            $subject = "Cambio de clave";

            $message = "
            <html>
                <head>
                <title>HTML email</title>
                </head>

                <body>

                <h2>Actualizacion de contraseña</h2> <br>
                <h3>A continuación se muestran los detalles de su actualizacion de contraseña:</h3>  <br>
                <p style='color: #000000;font-weight: bold'><strong>Email: </strong> $email  </p>  <br>
                <p style='color: #000000;font-weight: bold'><strong>Clave: </strong> $pass </p>

                </body>
            </html>
            ";


            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            $headers .= 'From: <contacto@checkngo.com.mx>' . "\r\n";

            mail($to, $subject, $message, $headers);
        }

        Session::flash('success', 'Se ha actualizado su contrasena con exito');
        return Redirect::back();
    }

    /*|--------------------------------------------------------------------------
|Create User Admin_Admin
|--------------------------------------------------------------------------*/
    function index_admin(Request $request)
    {
        $user = User::where('empresa', '=', 0)
            ->get();

        $users = DB::table('users')
            ->where('empresa', '=', 0)
            ->get();

        return view('admin.user.view-user-admin', compact('user', 'users'));
    }

    public function create_admin()
    {
        $user = DB::table('users')
            ->where('empresa', '=', 0)
            ->get();
        $users = DB::table('users')
            ->where('empresa', '=', 0)
            ->get();

        $roles = DB::table('roles')
            ->get();

        return view('admin.user.add-user-admin', compact('user', 'users', 'roles'));
    }

    public function store_admin(Request $request)
    {
        $validate = $this->validate($request, [
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
            $file = $request->file('img');
            $file->move(public_path() . '/img-perfil', time() . "." . $file->getClientOriginalExtension());
            $user->img = time() . "." . $file->getClientOriginalExtension();

            $filepath = public_path('/img-perfil/' . $user->img);

            try {
                \Tinify\setKey(env("TINIFY_API_KEY"));
                $source = \Tinify\fromFile($filepath);
                $source->toFile($filepath);
            } catch (\Tinify\AccountException $e) {
                // Verify your API key and account limit.
                return redirect()->back()->with('error', $e->getMessage());
            } catch (\Tinify\ClientException $e) {
                // Check your source image and request options.
                return redirect()->back()->with('error', $e->getMessage());
            } catch (\Tinify\ServerException $e) {
                // Temporary issue with the Tinify API.
                return redirect()->back()->with('error', $e->getMessage());
            } catch (\Tinify\ConnectionException $e) {
                // A network connection error occurred.
                return redirect()->back()->with('error', $e->getMessage());
            } catch (Exception $e) {
                // Something else went wrong, unrelated to the Tinify API.
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
        $user->save();

        if ($user->role == 0) {
            $licencia = new Licencia;
            $licencia->id_user = $user->id;
            $licencia->id_empresa = 0;
            $licencia->tipo = 'sin licencia';
            $licencia->save();
        }

        if ($user->role != 0) {
            $role = new ModalHasRoles;
            $role->role_id = $user->role;
            $role->model_type = 'App\Models\Alertas';
            $role->model_id = $user->id;
            $role->save();

            $role = new ModalHasRoles;
            $role->role_id = $user->role;
            $role->model_type = 'App\Models\Automovil';
            $role->model_id = $user->id;
            $role->save();

            $role = new ModalHasRoles;
            $role->role_id = $user->role;
            $role->model_type = 'App\Models\Cupon';
            $role->model_id = $user->id;
            $role->save();

            $role = new ModalHasRoles;
            $role->role_id = $user->role;
            $role->model_type = 'App\Models\Licencia';
            $role->model_id = $user->id;
            $role->save();

            $role = new ModalHasRoles;
            $role->role_id = $user->role;
            $role->model_type = 'App\Models\Mecanica';
            $role->model_id = $user->id;
            $role->save();

            $role = new ModalHasRoles;
            $role->role_id = $user->role;
            $role->model_type = 'App\Models\Notas';
            $role->model_id = $user->id;
            $role->save();

            $role = new ModalHasRoles;
            $role->role_id = $user->role;
            $role->model_type = 'App\Models\Role';
            $role->model_id = $user->id;
            $role->save();

            $role = new ModalHasRoles;
            $role->role_id = $user->role;
            $role->model_type = 'App\Models\Seguros';
            $role->model_id = $user->id;
            $role->save();

            $role = new ModalHasRoles;
            $role->role_id = $user->role;
            $role->model_type = 'App\Models\TarjetaCirculacion';
            $role->model_id = $user->id;
            $role->save();

            $role = new ModalHasRoles;
            $role->role_id = $user->role;
            $role->model_type = 'App\Models\User';
            $role->model_id = $user->id;
            $role->save();

            $role = new ModalHasRoles;
            $role->role_id = $user->role;
            $role->model_type = 'App\Models\Verificacion';
            $role->model_id = $user->id;
            $role->save();

            $role = new ModalHasRoles;
            $role->role_id = $user->role;
            $role->model_type = 'App\Models\Pronostico';
            $role->model_id = $user->id;
            $role->save();
        }

        Session::flash('success', 'Se ha actualizado sus datos con exito');
        return redirect()->route('index_admin.user');
    }

    public function edit_admin($id)
    {
        $user = User::findOrFail($id);

        $users = DB::table('users')
            ->where('empresa', '=', 0)
            ->get();

        $roles = DB::table('roles')
            ->get();

        return view('admin.user.edit-user-admin', compact('user', 'users', 'roles'));
    }

    public function update_admin(Request $request, $id)
    {

        $user = User::findOrFail($id);

        $user->name = $request->get('name');
        $user->telefono = $request->get('telefono');
        $user->email = $request->get('email');
        $user->fecha_nacimiento = $request->get('fecha_nacimiento');
        $user->direccion = $request->get('direccion');
        $user->referencia = $request->get('referencia');
        $user->genero = $request->get('genero');
        $user->role = $request->get('role');

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $file->move(public_path() . '/img-perfil', time() . "." . $file->getClientOriginalExtension());
            $user->img = time() . "." . $file->getClientOriginalExtension();

            $filepath = public_path('/img-perfil/' . $user->img);

            try {
                \Tinify\setKey(env("TINIFY_API_KEY"));
                $source = \Tinify\fromFile($filepath);
                $source->toFile($filepath);
            } catch (\Tinify\AccountException $e) {
                // Verify your API key and account limit.
                return redirect()->back()->with('error', $e->getMessage());
            } catch (\Tinify\ClientException $e) {
                // Check your source image and request options.
                return redirect()->back()->with('error', $e->getMessage());
            } catch (\Tinify\ServerException $e) {
                // Temporary issue with the Tinify API.
                return redirect()->back()->with('error', $e->getMessage());
            } catch (\Tinify\ConnectionException $e) {
                // A network connection error occurred.
                return redirect()->back()->with('error', $e->getMessage());
            } catch (Exception $e) {
                // Something else went wrong, unrelated to the Tinify API.
                return redirect()->back()->with('error', $e->getMessage());
            }
        }
        $user->update();

        if ($user->role != 0) {
            $brorrarrole = ModalHasRoles::where('model_id', '=', $id)
                ->delete();

            $role = new ModalHasRoles;
            $role->role_id = $user->role;
            $role->model_type = 'App\Models\Alertas';
            $role->model_id = $user->id;
            $role->save();

            $role = new ModalHasRoles;
            $role->role_id = $user->role;
            $role->model_type = 'App\Models\Automovil';
            $role->model_id = $user->id;
            $role->save();

            $role = new ModalHasRoles;
            $role->role_id = $user->role;
            $role->model_type = 'App\Models\Cupon';
            $role->model_id = $user->id;
            $role->save();

            $role = new ModalHasRoles;
            $role->role_id = $user->role;
            $role->model_type = 'App\Models\Licencia';
            $role->model_id = $user->id;
            $role->save();

            $role = new ModalHasRoles;
            $role->role_id = $user->role;
            $role->model_type = 'App\Models\Mecanica';
            $role->model_id = $user->id;
            $role->save();

            $role = new ModalHasRoles;
            $role->role_id = $user->role;
            $role->model_type = 'App\Models\Notas';
            $role->model_id = $user->id;
            $role->save();

            $role = new ModalHasRoles;
            $role->role_id = $user->role;
            $role->model_type = 'App\Models\Role';
            $role->model_id = $user->id;
            $role->save();

            $role = new ModalHasRoles;
            $role->role_id = $user->role;
            $role->model_type = 'App\Models\Seguros';
            $role->model_id = $user->id;
            $role->save();

            $role = new ModalHasRoles;
            $role->role_id = $user->role;
            $role->model_type = 'App\Models\TarjetaCirculacion';
            $role->model_id = $user->id;
            $role->save();

            $role = new ModalHasRoles;
            $role->role_id = $user->role;
            $role->model_type = 'App\Models\User';
            $role->model_id = $user->id;
            $role->save();

            $role = new ModalHasRoles;
            $role->role_id = $user->role;
            $role->model_type = 'App\Models\Verificacion';
            $role->model_id = $user->id;
            $role->save();

            $role = new ModalHasRoles;
            $role->role_id = $user->role;
            $role->model_type = 'App\Models\Pronostico';
            $role->model_id = $user->id;
            $role->save();
        }

        Session::flash('success', 'Se ha actualizado sus datos con exito');
        //        return redirect()->back();
        return redirect()->route('index_admin.user');
    }

    public function update_admin_password(Request $request, $id)
    {
        $validate = $this->validate($request, [
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = User::findOrFail($id);

        $pass = $user->password = $request->password;
        $user->password = Hash::make($request->password);
        $email = $user->email;

        Session::flash('success', 'Se ha actualizado su contrasena con exito');
        return redirect()->route('index_admin.user');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
