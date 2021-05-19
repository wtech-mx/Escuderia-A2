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

        $llanta_user = Mecanica::where('id_user', '=', auth()->user()->id)->paginate(7);
        $banda_user = Mecanica::where('id_userbn', '=', auth()->user()->id)->paginate(7);
        $freno_user = Mecanica::where('id_userfr', '=', auth()->user()->id)->paginate(7);
        $aceite_user = Mecanica::where('id_userac', '=', auth()->user()->id)->paginate(7);
        $afinacion_user = Mecanica::where('id_useraf', '=', auth()->user()->id)->paginate(7);
        $amort_user = Mecanica::where('id_useram', '=', auth()->user()->id)->paginate(7);
        $bateria_user = Mecanica::where('id_userbt', '=', auth()->user()->id)->paginate(7);
        $otro_user = Mecanica::where('id_userot', '=', auth()->user()->id)->paginate(7);

        $mecanica_empresa = Mecanica::where('id_user', '=', NULL)->get();

        return view('services.view-mecanica', compact('llanta_user', 'banda_user', 'freno_user', 'aceite_user', 'afinacion_user', 'amort_user', 'bateria_user', 'otro_user', 'mecanica_empresa'));
    }


    /*|--------------------------------------------------------------------------
|Create Servicio Admin
|--------------------------------------------------------------------------*/
    public function view()
    {
        if (auth()->user()->role != 1) {
            return view('errors.403');
        } else {
            $mecanica_user = Mecanica::get();
            $mecanica_empresa = Mecanica::get();

            $mecanica_usuario = MecanicaUsuario::get();
            $proveedor = MecanicaProveedores::get();

            $users = DB::table('users')->get();
            $autos = DB::table('mecanica_usuario')->get();

            return view('admin.services.view-mecanica', compact('mecanica_user', 'mecanica_empresa', 'users', 'proveedor', 'mecanica_usuario', 'autos'));
        }
    }

    public function create_servicio()
    {
        if (auth()->user()->role != 1) {
            return view('errors.403');
        } else {
            $user = DB::table('users')
                ->where('role', '=', '0')
                ->get();

            $empresa = DB::table('empresa')
                ->get();

            $marca = DB::table('marca_product')
                ->get();

            $automovil = DB::table('automovil')
                ->get();

            $users = DB::table('users')
                ->get();

            $proveedor = MecanicaProveedores::OrderBy('created_at', 'ASC')
                ->get();

            return view('admin.services.mecanica', compact('empresa', 'marca', 'automovil', 'user', 'proveedor'));
        }
    }

    public function edit(Request $request, $id)
    {
        if (auth()->user()->role != 1) {
            return view('errors.403');
        } else {
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
            $mecanica_usuario->id_automovil = $request->get('current_auto');
            dd($mecanica_usuario);
            $mecanica_usuario->update();

            Session::flash('success', 'Se ha guardado sus datos con exito');
            return redirect()->back();
        }
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

        if ($request->hasFile('video')) {
            $urlfoto = $request->file('video');
            $nombre = time() . "." . $urlfoto->guessExtension();
            $ruta = public_path('/inter-mecanica/' . $nombre);
            $compresion = Image::make($urlfoto->getRealPath())
                ->save($ruta, 10);
            $mecanica->video = $compresion->basename;
        }

        if ($request->hasFile('video2')) {
            $urlfoto = $request->file('video2');
            $nombre = time() . "." . $urlfoto->guessExtension();
            $ruta = public_path('/ext-mecanica/' . $nombre);
            $compresion = Image::make($urlfoto->getRealPath())
                ->save($ruta, 10);
            $mecanica->video2 = $compresion->basename;
        }

        $mecanica->save();

        $mecanica_usuario = new MecanicaUsuario;
        $mecanica_usuario->id_mecanica = $mecanica->id;
        switch ($mecanica) {
                //Llantas
            case ($mecanica->servicio == '1'):
                $mecanica_usuario->id_usuario = $request->get('id_user');;
                $mecanica_usuario->id_automovil = $request->get('current_auto2');
                break;
                //Banda
            case ($mecanica->servicio == '2'):
                $mecanica_usuario->id_usuario = $request->get('id_userbn');
                $mecanica_usuario->id_automovil = $request->get('current_autobn');
                break;
                //Frenos
            case ($mecanica->servicio == '3'):
                $mecanica_usuario->id_usuario = $request->get('id_userfr');
                $mecanica_usuario->id_automovil = $request->get('current_autofr');
                break;
                //Aceite
            case ($mecanica->servicio == '4'):
                $mecanica_usuario->id_usuario = $request->get('id_userac');
                $mecanica_usuario->id_automovil = $request->get('current_autoac2');
                break;
                //Afinacion
            case ($mecanica->servicio == '5'):
                $mecanica_usuario->id_usuario = $request->get('id_useraf');
                $mecanica_usuario->id_automovil = $request->get('current_autoaf2');
                break;
                //Amorting
            case ($mecanica->servicio == '6'):
                $mecanica_usuario->id_usuario = $request->get('id_useram');
                $mecanica_usuario->id_automovil = $request->get('current_autoam2');
                break;
                //Bateria
            case ($mecanica->servicio == '7'):
                $mecanica_usuario->id_usuario = $request->get('id_userbt');
                $mecanica_usuario->id_automovil = $request->get('current_autobt');
                break;
                //Otro
            case ($mecanica->servicio == '8'):
                $mecanica_usuario->id_usuario = $request->get('id_userot');
                $mecanica_usuario->id_automovil = $request->get('current_autoot');
                break;
        }

        $mecanica_usuario->save();

        $llantas = new Llantas;
        /* Calendario */
        switch ($mecanica) {
                //Llantas
            case ($mecanica->servicio == '1'):
                $llantas->id_user = $mecanica_usuario->id_usuario;
                $llantas->title = $mecanica_usuario->Automovil->placas . '/' . $mecanica_usuario->Automovil->subtipo . ' - Llantas';
                break;
                //Banda
            case ($mecanica->servicio == '2'):
                $llantas->id_user = $mecanica_usuario->id_usuario;
                $llantas->title = $mecanica_usuario->Automovil->placas . '/' . $mecanica_usuario->Automovil->subtipo . ' - Banda';
                break;
                //Frenos
            case ($mecanica->servicio == '3'):
                $llantas->id_user = $mecanica_usuario->id_usuario;
                $llantas->title = $mecanica_usuario->Automovil->placas . '/' . $mecanica_usuario->Automovil->subtipo . ' - Frenos';
                break;
                //Aceite
            case ($mecanica->servicio == '4'):
                $llantas->id_user = $mecanica_usuario->id_usuario;
                $llantas->title = $mecanica_usuario->Automovil->placas . '/' . $mecanica_usuario->Automovil->subtipo . ' - Aceite';
                break;
                //Afinacion
            case ($mecanica->servicio == '5'):
                $llantas->id_user = $mecanica_usuario->id_usuario;
                $llantas->title = $mecanica_usuario->Automovil->placas . '/' . $mecanica_usuario->Automovil->subtipo . ' - Afinación';
                break;
                //Amorting
            case ($mecanica->servicio == '6'):
                $llantas->id_user = $mecanica_usuario->id_usuario;
                $llantas->title = $mecanica_usuario->Automovil->placas . '/' . $mecanica_usuario->Automovil->subtipo . ' - Amortiguadores';
                break;
                //Bateria
            case ($mecanica->servicio == '7'):
                $llantas->id_user = $mecanica_usuario->id_usuario;
                $llantas->title = $mecanica_usuario->Automovil->placas . '/' . $mecanica_usuario->Automovil->subtipo . ' - Bateria';
                break;
                //Otro
            case ($mecanica->servicio == '8'):
                $llantas->id_user = $mecanica_usuario->id_usuario;
                $llantas->title = $mecanica_usuario->Automovil->placas . '/' . $mecanica_usuario->Automovil->subtipo . ' - Otro';
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
