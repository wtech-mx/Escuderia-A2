<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

use App\Models\Mecanica;
use App\Models\Llantas;
use App\Models\MecanicaProveedores;
use App\Models\MecanicaUsuario;
use App\Models\User;
use App\Models\Automovil;
use App\Models\Cotizacion;
use App\Models\CotizacionRemision;
use App\Models\Taller;
use Session;
use Image;
use Validator;

class MecanicaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('pagespeed');
    }
    /*|--------------------------------------------------------------------------
| Servicio User
|--------------------------------------------------------------------------*/
    public function view_user()
    {

        $mecanica_user = MecanicaUsuario::where('id_usuario', '=', auth()->user()->id)->get();

        return view('services.view-mecanica', compact('mecanica_user'));
    }


    /*|--------------------------------------------------------------------------
|Create Servicio Admin
|--------------------------------------------------------------------------*/
    public function view()
    {
        $mecanica_user = Mecanica::get();
        $mecanica_empresa = MecanicaUsuario::where('id_usuario', '=', NULL)->get();

        $mecanica_usuario = MecanicaUsuario::where('id_empresa', '=', NULL)->get();
        $proveedor = MecanicaProveedores::get();

        $cotizacion = Cotizacion::get();
        $cotizacion_remision = CotizacionRemision::where('reparacion', '!=', NULL)->where('aprobacion', '=', 1)->get();
        $taller = Taller::where('vendedor', '!=', NULL)->where('estado', '=', 1)->get();

        $users = DB::table('users')->get();
        $autos = DB::table('mecanica_usuario')->get();

        return view('admin.services.view-mecanica', compact('mecanica_user', 'mecanica_empresa', 'users', 'proveedor', 'mecanica_usuario', 'autos', 'cotizacion', 'cotizacion_remision', 'taller'));
    }

    public function create_servicio()
    {
        $user = DB::table('users')
            ->where('role', '=', '0')
            ->where('empresa', '=', 0)
            ->get();

        $empresa = DB::table('users')
            ->where('empresa', '=', 1)
            ->get();

        $marca = DB::table('marca_product')
            ->get();

        $automovil = DB::table('automovil')
            ->get();

        $users = DB::table('users')
            ->get();

        $proveedor = MecanicaProveedores::OrderBy('created_at', 'ASC')
            ->get();

        $sector = DB::table('sectores')
            ->where('id_empresa', '=', auth()->user()->id)
            ->get();

        return view('admin.services.mecanica', compact('empresa', 'marca', 'automovil', 'user', 'proveedor', 'sector'));
    }

    public function edit(Request $request, $id)
    {
        $mecanica = Mecanica::findOrFail($id);

        $mecanica->llantas_delanteras = $request->get('llantas_delanteras');
        $mecanica->llantas_traseras = $request->get('llantas_traseras');
        $mecanica->amortig_delanteras = $request->get('amortig_delanteras');
        $mecanica->amortig_traseras = $request->get('amortig_traseras');
        $mecanica->frenos_delanteras = $request->get('frenos_delanteras');
        $mecanica->frenos_traseras = $request->get('frenos_traseras');
        $mecanica->precio = $request->get('precio');
        $mecanica->servicio = $request->get('servicio');
        $mecanica->descripcion = $request->get('descripcion');
        //$mecanica->garantia = $request->get('garantia');
        $mecanica->vida_llantas = $request->get('vida_llantas');
        $mecanica->km_actual = $request->get('km_actual');
        $mecanica->km_estimado = $request->get('km_estimado');
        $mecanica->fecha_servicio = $request->get('fecha_servicio');

        $mecanica->update();

        $mecanica_usuario = new MecanicaUsuario;
        $mecanica_usuario->id_mecanica = $mecanica->id;
        $mecanica_usuario->id_usuario = $request->get('id_user');
        $mecanica_usuario->id_empresa = $request->get('id_empresa');
        $mecanica_usuario->id_automovil = $request->get('current_auto');

        $mecanica_usuario->update();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->back();
    }


    /* Trae los automoviles con el user seleccionado  */
    public function GetSubCatAgainstMainCatEdit($id)
    {
        echo json_encode(DB::table('automovil')->where('id_user', $id)->get());
    }
    public function GetEmpreAgainstMainCatEdit($id)
    {
        echo json_encode(DB::table('automovil')->where('id_empresa', $id)->get());
    }
    public function GetSectorAgainstMainCatEdit($id)
    {
        echo json_encode(DB::table('automovil')->where('id_sector', $id)->get());
    }

    public function store_servicio(Request $request)
    {
        $validate = $this->validate($request, [
            'servicio' => 'required|max:191',
            'descripcion' => 'required|max:500',
            'vida_llantas' => 'required|max:191',
            'km_actual' => 'required|max:191',
        ]);

        $mecanica = new Mecanica;

        $mecanica->llantas_delanteras = $request->get('llantas_delanteras');
        $mecanica->llantas_traseras = $request->get('llantas_traseras');
        $mecanica->amortig_delanteras = $request->get('amortig_delanteras');
        $mecanica->amortig_traseras = $request->get('amortig_traseras');
        $mecanica->frenos_delanteras = $request->get('frenos_delanteras');
        $mecanica->frenos_traseras = $request->get('frenos_traseras');
        $mecanica->precio = $request->get('precio');
        $mecanica->servicio = $request->get('servicio');
        $mecanica->descripcion = $request->get('descripcion');
        //$mecanica->garantia = $request->get('garantia');
        $mecanica->vida_llantas = $request->get('vida_llantas');
        $mecanica->km_actual = $request->get('km_actual');
        $mecanica->km_estimado = $request->get('km_estimado');
        $mecanica->fecha_servicio = $request->get('fecha_servicio');
        $mecanica->start = $request->get('start');
        $mecanica->end = $request->get('end');

        // if ($request->hasFile('video')) {
        //     $file = $request->file('video');
        //     $file->move(public_path() . '/inter-mecanica', time() . "." . $file->getClientOriginalExtension());
        //     $mecanica->video = time() . "." . $file->getClientOriginalExtension();

        //     $filepath = public_path('/inter-mecanica/' . $mecanica->video);

        //     try {
        //         \Tinify\setKey(env("TINIFY_API_KEY"));
        //         $source = \Tinify\fromFile($filepath);
        //         $source->toFile($filepath);
        //     } catch (\Tinify\AccountException $e) {
        //         // Verify your API key and account limit.
        //         return redirect()->back()->with('error', $e->getMessage());
        //     } catch (\Tinify\ClientException $e) {
        //         // Check your source image and request options.
        //         return redirect()->back()->with('error', $e->getMessage());
        //     } catch (\Tinify\ServerException $e) {
        //         // Temporary issue with the Tinify API.
        //         return redirect()->back()->with('error', $e->getMessage());
        //     } catch (\Tinify\ConnectionException $e) {
        //         // A network connection error occurred.
        //         return redirect()->back()->with('error', $e->getMessage());
        //     } catch (Exception $e) {
        //         // Something else went wrong, unrelated to the Tinify API.
        //         return redirect()->back()->with('error', $e->getMessage());
        //     }
        // }

        // if ($request->hasFile('video2')) {
        //     $file = $request->file('video2');
        //     $file->move(public_path() . '/ext-mecanica', time() . "." . $file->getClientOriginalExtension());
        //     $mecanica->video2 = time() . "." . $file->getClientOriginalExtension();

        //     $filepath = public_path('/ext-mecanica/' . $mecanica->video2);

        //     try {
        //         \Tinify\setKey(env("TINIFY_API_KEY"));
        //         $source = \Tinify\fromFile($filepath);
        //         $source->toFile($filepath);
        //     } catch (\Tinify\AccountException $e) {
        //         // Verify your API key and account limit.
        //         return redirect()->back()->with('error', $e->getMessage());
        //     } catch (\Tinify\ClientException $e) {
        //         // Check your source image and request options.
        //         return redirect()->back()->with('error', $e->getMessage());
        //     } catch (\Tinify\ServerException $e) {
        //         // Temporary issue with the Tinify API.
        //         return redirect()->back()->with('error', $e->getMessage());
        //     } catch (\Tinify\ConnectionException $e) {
        //         // A network connection error occurred.
        //         return redirect()->back()->with('error', $e->getMessage());
        //     } catch (Exception $e) {
        //         // Something else went wrong, unrelated to the Tinify API.
        //         return redirect()->back()->with('error', $e->getMessage());
        //     }
        // }

        $mecanica->save();

        $mecanica_usuario = new MecanicaUsuario;
        $mecanica_usuario->id_mecanica = $mecanica->id;
        switch ($mecanica) {
                //Llantas
            case ($mecanica->servicio == '1'):
                $mecanica_usuario->id_usuario = $request->get('id_user');
                if ($mecanica_usuario->id_usuario == NULL) {
                    $mecanica_usuario->id_empresa = $request->get('id_empresa');
                    $mecanica_usuario->id_automovil = $request->get('current_auto');
                } else {
                    $mecanica_usuario->id_automovil = $request->get('current_auto2');
                }
                break;
                //Banda
            case ($mecanica->servicio == '2'):
                $mecanica_usuario->id_usuario = $request->get('id_userbn');
                if ($mecanica_usuario->id_usuario == NULL) {
                    $mecanica_usuario->id_empresa = $request->get('id_empresabn');
                    $mecanica_usuario->id_automovil = $request->get('current_autobn2');
                } else {
                    $mecanica_usuario->id_automovil = $request->get('current_autobn');
                }
                break;
                //Frenos
            case ($mecanica->servicio == '3'):
                $mecanica_usuario->id_usuario = $request->get('id_userfr');
                if ($mecanica_usuario->id_usuario == NULL) {
                    $mecanica_usuario->id_empresa = $request->get('id_empresafr');
                    $mecanica_usuario->id_automovil = $request->get('current_autofr2');
                } else {
                    $mecanica_usuario->id_automovil = $request->get('current_autofr');
                }
                break;
                //Aceite
            case ($mecanica->servicio == '4'):
                $mecanica_usuario->id_usuario = $request->get('id_userac');
                if ($mecanica_usuario->id_usuario == NULL) {
                    $mecanica_usuario->id_empresa = $request->get('id_empresaac');
                    $mecanica_usuario->id_automovil = $request->get('current_autoac');
                } else {
                    $mecanica_usuario->id_automovil = $request->get('current_autoac2');
                }
                break;
                //Afinacion
            case ($mecanica->servicio == '5'):
                $mecanica_usuario->id_usuario = $request->get('id_useraf');
                if ($mecanica_usuario->id_usuario == NULL) {
                    $mecanica_usuario->id_empresa = $request->get('id_empresaaf');
                    $mecanica_usuario->id_automovil = $request->get('current_autoaf');
                } else {
                    $mecanica_usuario->id_automovil = $request->get('current_autoaf2');
                }
                break;
                //Amorting
            case ($mecanica->servicio == '6'):
                $mecanica_usuario->id_usuario = $request->get('id_useram');
                if ($mecanica_usuario->id_usuario == NULL) {
                    $mecanica_usuario->id_empresa = $request->get('id_empresaam');
                    $mecanica_usuario->id_automovil = $request->get('current_autoam');
                } else {
                    $mecanica_usuario->id_automovil = $request->get('current_autoam2');
                }
                break;
                //Bateria
            case ($mecanica->servicio == '7'):
                $mecanica_usuario->id_usuario = $request->get('id_userbt');
                if ($mecanica_usuario->id_usuario == NULL) {
                    $mecanica_usuario->id_empresa = $request->get('id_empresabt');
                    $mecanica_usuario->id_automovil = $request->get('current_autobt2');
                } else {
                    $mecanica_usuario->id_automovil = $request->get('current_autobt');
                }
                break;
                //Otro
            case ($mecanica->servicio == '8'):
                $mecanica_usuario->id_usuario = $request->get('id_userot');
                if ($mecanica_usuario->id_usuario == NULL) {
                    $mecanica_usuario->id_empresa = $request->get('id_empresa');
                    $mecanica_usuario->id_automovil = $request->get('current_autoot2');
                } else {
                    $mecanica_usuario->id_automovil = $request->get('current_autoot');
                }
                break;
        }

        $mecanica_usuario->save();

        $llantas = new Llantas;
        /* Calendario */
        switch ($mecanica) {
                //Llantas
            case ($mecanica->servicio == '1'):
                $llantas->id_user = $mecanica_usuario->id_usuario;
                if ($llantas->id_user == NULL) {
                    $llantas->id_user = $mecanica_usuario->id_empresa;
                }
                $llantas->title = $mecanica_usuario->Automovil->placas . '/' . $mecanica_usuario->Automovil->submarca . ' - Llantas';
                break;
                //Banda
            case ($mecanica->servicio == '2'):
                $llantas->id_user = $mecanica_usuario->id_usuario;
                if ($llantas->id_user == NULL) {
                    $llantas->id_user = $mecanica_usuario->id_empresa;
                }
                $llantas->title = $mecanica_usuario->Automovil->placas . '/' . $mecanica_usuario->Automovil->submarca . ' - Banda';
                break;
                //Frenos
            case ($mecanica->servicio == '3'):
                $llantas->id_user = $mecanica_usuario->id_usuario;
                if ($llantas->id_user == NULL) {
                    $llantas->id_user = $mecanica_usuario->id_empresa;
                }
                $llantas->title = $mecanica_usuario->Automovil->placas . '/' . $mecanica_usuario->Automovil->submarca . ' - Frenos';
                break;
                //Aceite
            case ($mecanica->servicio == '4'):
                $llantas->id_user = $mecanica_usuario->id_usuario;
                if ($llantas->id_user == NULL) {
                    $llantas->id_user = $mecanica_usuario->id_empresa;
                }
                $llantas->title = $mecanica_usuario->Automovil->placas . '/' . $mecanica_usuario->Automovil->submarca . ' - Aceite';
                break;
                //Afinacion
            case ($mecanica->servicio == '5'):
                $llantas->id_user = $mecanica_usuario->id_usuario;
                if ($llantas->id_user == NULL) {
                    $llantas->id_user = $mecanica_usuario->id_empresa;
                }
                $llantas->title = $mecanica_usuario->Automovil->placas . '/' . $mecanica_usuario->Automovil->submarca . ' - Afinación';
                break;
                //Amorting
            case ($mecanica->servicio == '6'):
                $llantas->id_user = $mecanica_usuario->id_usuario;
                if ($llantas->id_user == NULL) {
                    $llantas->id_user = $mecanica_usuario->id_empresa;
                }
                $llantas->title = $mecanica_usuario->Automovil->placas . '/' . $mecanica_usuario->Automovil->submarca . ' - Amortiguadores';
                break;
                //Bateria
            case ($mecanica->servicio == '7'):
                $llantas->id_user = $mecanica_usuario->id_usuario;
                if ($llantas->id_user == NULL) {
                    $llantas->id_user = $mecanica_usuario->id_empresa;
                }
                $llantas->title = $mecanica_usuario->Automovil->placas . '/' . $mecanica_usuario->Automovil->submarca . ' - Bateria';
                break;
                //Otro
            case ($mecanica->servicio == '8'):
                $llantas->id_user = $mecanica_usuario->id_usuario;
                if ($llantas->id_user == NULL) {
                    $llantas->id_user = $mecanica_usuario->id_empresa;
                }
                $llantas->title = $mecanica_usuario->Automovil->placas . '/' . $mecanica_usuario->Automovil->submarca . ' - Otro';
                break;
        }
        $llantas->id_mecanica = $mecanica->id;
        $llantas->descripcion = $mecanica->descripcion . ', para la fecha estimada: ' . $mecanica->start . ' tendra un Km estimado: ' . $mecanica->km_estimado;
        $llantas->color = "#2980B9";
        $llantas->image = $mecanica->image;
        $llantas->estatus = 0;
        $llantas->estado_last_week = 0;
        $llantas->estado_tomorrow = 0;
        $llantas->check = 0;
        $llantas->start = $mecanica->start;
        $llantas->end = $mecanica->end;
        $llantas->save();


        $rules = array(
            'nombre.*',
            'garantia.*',
            'marca.*',
            'proveedor.*',
            'mano_o.*',
            'costo.*',
            'costo_total.*',
            'cantidad.*',
        );
        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json([
                'error' => $error->errors()->all()
            ]);
        }

        $nombre = $request->nombre;
        $marca = $request->marca;
        $garantia = $request->garantia;
        $proveedor = $request->proveedor;
        $mano_o = $request->mano_o;
        $costo = $request->costo;
        $costo_total = $request->costo_total;
        $cantidad = $request->cantidad;

        for ($count = 0; $count < count($nombre); $count++) {
            $data = array(
                'nombre' => $nombre[$count],
                'marca' => $marca[$count],
                'garantia' => $garantia[$count],
                'proveedor' => $proveedor[$count],
                'mano_o' => $mano_o[$count],
                'costo' => $costo[$count],
                'costo_total' => $costo_total[$count],
                'cantidad' => $cantidad[$count],
                'id_servicio' => $mecanica->id,
            );
            $insert_data[] = $data;
        }

        MecanicaProveedores::insert($insert_data);

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->back();
    }
}
