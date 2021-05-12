<?php

namespace App\Http\Controllers;

use App\Models\User;
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

     public function __construct(){
        $this->middleware('auth');
        $this->middleware('pagespeed');
    }

/*|--------------------------------------------------------------------------
|Create User Auto_Admin
|--------------------------------------------------------------------------*/
    public function create()
    {
        $users = DB::table('users')
        ->get();

        return view('admin.garaje.create-garaje-admin', compact('users'));
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

    	if ($request->hasFile('img')) {
                $urlfoto = $request->file('img');
                $nombre = time().".".$urlfoto->guessExtension();
                $ruta = public_path('/img-perfil/'.$nombre);
                $compresion = Image::make($urlfoto->getRealPath())
                    ->save($ruta,10);
                $user->img = $compresion->basename;
   	    }


        $users = DB::table('users')
        ->get();

        $user->update();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return view('profile.profile', compact('user', 'users'));
    }

    public function edit($id){

        $user = User::findOrFail($id);

        $users = DB::table('users')
            ->get();

        return view('profile.profile', compact('user','users'));
    }

    public function update_password(Request $request,$id)
    {

        $user = User::findOrFail($id);

         $pass = $user->password = $request->password;
         $user->password = Hash::make($request->password);
         $email = $user->email;

        $details = array(
         'email' => $email,
         'password' => $pass,
         );

         $subject = 'Cambio de clave : '.$email ;

        if ($user->update() == TRUE){

            Mail::send('emails.actualizacion-password', $details, function ($message) use ($details,$subject) {
                $message->to($details['email'], $details['password'])
                    ->subject($subject)
                    ->from('contacto@checkngo.com.mx', 'Actualizacion de contrasena checkngo');
            });

            $to = $email;
            $subject = "Cambio de clave";

            $message = "
            <!DOCTYPE html>
            <html >
            <head>
                <meta charset='utf-8'>
                <meta name='viewport' content='width=device-width'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <meta name='x-apple-disable-message-reformatting'> y -->
                <title></title>
                <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet'>
            </head>

            <style>

            body {
                margin: 0 auto !important;
                padding: 0 !important;
                height: 100% !important;
                width: 100% !important;
                background: #f1f1f1;
            }
            * {
                -ms-text-size-adjust: 100%;
                -webkit-text-size-adjust: 100%;
            }

            div[style*='margin: 16px 0'] {
                margin: 0 !important;
            }

            table,
            td {
                mso-table-lspace: 0pt !important;
                mso-table-rspace: 0pt !important;
            }

            table {
                border-spacing: 0 !important;
                border-collapse: collapse !important;
                table-layout: fixed !important;
                margin: 0 auto !important;
            }

            img {
                -ms-interpolation-mode:bicubic;
            }

            a {
                text-decoration: none;
            }

            *[x-apple-data-detectors],
            .unstyle-auto-detected-links *,
            .aBn {
                border-bottom: 0 !important;
                cursor: default !important;
                color: inherit !important;
                text-decoration: none !important;
                font-size: inherit !important;
                font-family: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
            }

            .a6S {
                display: none !important;
                opacity: 0.01 !important;
            }

            .im {
                color: inherit !important;
            }

            img.g-img + div {
                display: none !important;
            }


            @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
                u ~ div .email-container {
                    min-width: 320px !important;
                }
            }
            @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
                u ~ div .email-container {
                    min-width: 375px !important;
                }
            }
            @media only screen and (min-device-width: 414px) {
                u ~ div .email-container {
                    min-width: 414px !important;
                }
            }

            .primary{
                background: #00f936;
            }
            .bg_white{
                background: #ffffff;
            }
            .bg_light{
                background: #fafafa;
            }
            .bg_black{
                background: #000000;
            }
            .bg_dark{
                background: rgba(0,0,0,.8);
            }
            .email-section{
                padding:2.5em;
            }


            .btn{
                padding: 10px 15px;
                display: inline-block;
            }
            .btn.btn-primary{
                border-radius: 5px;
                background: #00f936;
                color: #ffffff;
            }
            .btn.btn-white{
                border-radius: 5px;
                background: #ffffff;
                color: #000000;
            }
            .btn.btn-white-outline{
                border-radius: 5px;
                background: transparent;
                border: 1px solid #fff;
                color: #fff;
            }
            .btn.btn-black-outline{
                border-radius: 0px;
                background: transparent;
                border: 2px solid #000;
                color: #000;
                font-weight: 700;
            }

            h1,h2,h3,h4,h5,h6{
                font-family: 'Lato', sans-serif;
                color: #000000;
                margin-top: 0;
                font-weight: 400;
            }

            body{
                font-family: 'Lato', sans-serif;
                font-weight: 400;
                font-size: 15px;
                line-height: 1.8;
                color: rgba(0,0,0,.4);
            }

            a{
                color: #00f936;
            }

            table{
            }


            .logo h1{
                margin: 0;
            }
            .logo h1 a{
                color: #00f936;
                font-size: 24px;
                font-weight: 700;
                font-family: 'Lato', sans-serif;
            }

            .hero{
                position: relative;
                z-index: 0;
            }

            .hero .text{
                color: rgba(0,0,0,.3);
            }
            .hero .text h2{
                color: #000;
                font-size: 40px;
                margin-bottom: 0;
                font-weight: 400;
                line-height: 1.4;
            }
            .hero .text h3{
                font-size: 24px;
                font-weight: 300;
            }
            .hero .text h2 span{
                font-weight: 600;
                color: #00f936;
            }



            .heading-section{
            }
            .heading-section h2{
                color: #000000;
                font-size: 28px;
                margin-top: 0;
                line-height: 1.4;
                font-weight: 400;
            }
            .heading-section .subheading{
                margin-bottom: 20px !important;
                display: inline-block;
                font-size: 13px;
                text-transform: uppercase;
                letter-spacing: 2px;
                color: rgba(0,0,0,.4);
                position: relative;
            }
            .heading-section .subheading::after{
                position: absolute;
                left: 0;
                right: 0;
                bottom: -10px;
                content: '';
                width: 100%;
                height: 2px;
                background: #00f936;
                margin: 0 auto;
            }

            .heading-section-white{
                color: rgba(255,255,255,.8);
            }
            .heading-section-white h2{
                font-family:
                line-height: 1;
                padding-bottom: 0;
            }
            .heading-section-white h2{
                color: #ffffff;
            }
            .heading-section-white .subheading{
                margin-bottom: 0;
                display: inline-block;
                font-size: 13px;
                text-transform: uppercase;
                letter-spacing: 2px;
                color: rgba(255,255,255,.4);
            }


            ul.social{
                padding: 0;
            }
            ul.social li{
                display: inline-block;
                margin-right: 10px;
            }

            .footer{
                border-top: 1px solid rgba(0,0,0,.05);
                color: rgba(0,0,0,.5);
            }
            .footer .heading{
                color: #000;
                font-size: 20px;
            }
            .footer ul{
                margin: 0;
                padding: 0;
            }
            .footer ul li{
                list-style: none;
                margin-bottom: 10px;
            }
            .footer ul li a{
                color: rgba(0,0,0,1);
            }


            @media screen and (max-width: 500px) {


            }


        </style>


            <body width='100%' style='margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;'>
                <center style='width: 100%; background-color: #f1f1f1;'>
                <div style='display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;'>

                </div>
                <div style='max-width: 600px; margin: 0 auto;' class='email-container'>

                  <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%' style='margin: auto;'>
                      <tr>
                      <td valign='top' class='bg_white' style='padding: 1em 2.5em 0 2.5em;'>
                          <table role='presentation' border='0' cellpadding='0' cellspacing='0' width='100%'>
                              <tr>
                                  <td class='logo' style='text-align: center;'>
                                    <h1><a href='#'>Checkngo</a></h1>
                                    <h1><a href='#'>Hola , {{ $email }}</a></h1>
                                  </td>
                              </tr>
                          </table>
                      </td>
                      </tr>
                      <tr>
                      <td valign='middle' class='hero bg_white' style='padding: 3em 0 2em 0;'>
                        <img src='https://colorlib.com/etc/email-template/10/images/email.png' alt=' style='width: 200px; max-width: 500px; height: auto; margin: auto; display: block;'>

                      </td>
                      </tr>
                            <tr>
                      <td valign='middle' class='hero bg_white' style='padding: 2em 0 4em 0;'>
                        <table>
                            <tr>
                                <td>
                                    <div class='text' style='padding: 0 2.5em; text-align: center;'>
                                        <h2>Actualizacion de contraseña</h2>
                                        <h3>A continuación se muestran los detalles de su actualizacion de contraseña:</h3>
                                        <p style='color: #000000;font-weight: bold'><strong>Email: </strong> {{ $email }} </p>
                                        <p style='color: #000000;font-weight: bold'><strong>Clave: </strong> {{ $pass }}</p>
                                    </div>
                                </td>
                            </tr>
                        </table>
                      </td>
                      </tr>

                  </table>

                </div>
              </center>
            </body>
            </html>
            ";

            $headers = "From:contacto@checkngo.com.mx";

            mail($to,$subject,$message,$headers);
        }

         Session::flash('success', 'Se ha actualizado su contrasena con exito');
         return Redirect::back();

    }

/*|--------------------------------------------------------------------------
|Create User Admin_Admin
|--------------------------------------------------------------------------*/
     function index_admin(Request $request){

        $name = $request->get('name');

        $user = User::orderBy('id','DESC')
            ->name($name)
            ->paginate(5);

        $users = DB::table('users')
        ->get();


        return view('admin.user.view-user-admin',compact('user', 'users'));
    }

    public function create_admin()
    {

        $user = DB::table('users')
        ->get();
        $users = DB::table('users')
        ->get();

        return view('admin.user.add-user-admin',compact('user', 'users'));
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
                $urlfoto = $request->file('img');
                $nombre = time().".".$urlfoto->guessExtension();
                $ruta = public_path('/img-perfil/'.$nombre);
                $compresion = Image::make($urlfoto->getRealPath())
                    ->save($ruta,10);
                $user->img = $compresion->basename;
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
        $user->role = $request->get('role');

    	if ($request->hasFile('img')) {
                $urlfoto = $request->file('img');
                $nombre = time().".".$urlfoto->guessExtension();
                $ruta = public_path('/img-perfil/'.$nombre);
                $compresion = Image::make($urlfoto->getRealPath())
                    ->save($ruta,10);
                 $user->img = $compresion->basename;
   	    }


        $user->update();

        Session::flash('success', 'Se ha actualizado sus datos con exito');
//        return redirect()->back();
         return redirect()->route('index_admin.user');

    }

    public function update_admin_password(Request $request,$id)
    {

        $user = User::findOrFail($id);

         $pass = $user->password = $request->password;
         $user->password = Hash::make($request->password);
         $email = $user->email;

        $details = array(
         'email' => $email,
         'password' => $pass,
         );

         $subject = 'Cambio de clave : '.$email ;

         if ($user->update() == TRUE){

            Mail::send('emails.actualizacion-password', $details, function ($message) use ($details,$subject) {
                $message->to($details['email'], $details['password'])
                    ->subject($subject)
                    ->from('contacto@checkngo.com.mx', 'Actualizacion de contrasena checkngo');
            });

        }

        Session::flash('success', 'Se ha actualizado su contrasena con exito');
         return redirect()->route('index_admin.user');

    }

    public function export(){
        return Excel::download(new UsersExport, 'users.xlsx');
    }

}
