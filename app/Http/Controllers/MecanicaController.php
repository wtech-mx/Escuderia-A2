<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\Automovil;
use App\Models\Mecanica;
use App\Models\TarjetaCirculacion;
use App\Models\Seguros;
use App\Models\User;
use Session;
use Carbon\Carbon;
use App\Models\Alertas;

class MecanicaController extends Controller
{
/*|--------------------------------------------------------------------------
|Create Servicio Admin
|--------------------------------------------------------------------------*/
    public function view(){

        $mecanica_llantas_user = Mecanica::where('servicio','=','1')->where('id_empresa','=', NULL)->get();
        $mecanica_llantas_empresa = Mecanica::where('servicio','=','1')->where('id_user','=', NULL)->get();

        $mecanica_banda_user = Mecanica::where('servicio','=','2')->where('id_empresa','=', NULL)->get();
        $mecanica_banda_empresa = Mecanica::where('servicio','=','2')->where('id_user','=', NULL)->get();

        $mecanica_freno_user = Mecanica::where('servicio','=','3')->where('id_empresa','=', NULL)->get();
        $mecanica_freno_empresa = Mecanica::where('servicio','=','3')->where('id_user','=', NULL)->get();

        $mecanica_aceite_user = Mecanica::where('servicio','=','4')->where('id_empresa','=', NULL)->get();
        $mecanica_aceite_empresa = Mecanica::where('servicio','=','4')->where('id_user','=', NULL)->get();

        $mecanica_afinacion_user = Mecanica::where('servicio','=','5')->where('id_empresa','=', NULL)->get();
        $mecanica_afinacion_empresa = Mecanica::where('servicio','=','5')->where('id_user','=', NULL)->get();

        $mecanica_amortiguadores_user = Mecanica::where('servicio','=','6')->where('id_empresa','=', NULL)->get();
        $mecanica_amortiguadores_empresa = Mecanica::where('servicio','=','6')->where('id_user','=', NULL)->get();

        $mecanica_bateria_user = Mecanica::where('servicio','=','7')->where('id_empresa','=', NULL)->get();
        $mecanica_bateria_empresa = Mecanica::where('servicio','=','7')->where('id_user','=', NULL)->get();

        $users = DB::table('users')
        ->get();
                          // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();
          $alert2 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('start','<=', $current)
              ->where('estatus', '=', 0)
            ->get();

         //Trae la alerta Seguro
          $seguro_alerta = Seguros::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('end','<=', $current)
            ->get();
          //Trae la alerta Tc
          $tc_alerta = TarjetaCirculacion::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('end','<=', $current)
            ->get();

        return view('admin.services.view-mecanica',compact('mecanica_llantas_user','seguro_alerta','tc_alerta','mecanica_llantas_empresa', 'mecanica_banda_user', 'mecanica_banda_empresa','mecanica_freno_user','mecanica_freno_empresa','mecanica_aceite_user','mecanica_aceite_empresa','mecanica_afinacion_user','mecanica_afinacion_empresa', 'mecanica_amortiguadores_user', 'mecanica_amortiguadores_empresa', 'mecanica_bateria_user', 'mecanica_bateria_empresa', 'alert2', 'users'));
    }

    public function create_servicio()
    {
          $user = DB::table('users')
            ->where('role','=', '0')
            ->get();

         $empresa = DB::table('empresa')
            ->get();

         $marca = DB::table('marca_product')
            ->get();

         $automovil = DB::table('automovil')
            ->get();

                $users = DB::table('users')
        ->get();
                          // obtener la hora actual  - 2015-12-19 10:10:54
          $current = Carbon::now()->toDateTimeString();
          $alert2 = Alertas::
            where('id_user', '=', auth()->user()->id)
            ->where('start','<=', $current)
              ->where('estatus', '=', 0)
            ->get();
         //Trae la alerta Seguro
          $seguro_alerta = Seguros::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('end','<=', $current)
            ->get();
          //Trae la alerta Tc
          $tc_alerta = TarjetaCirculacion::
            where('id_user', '=', auth()->user()->id)
            ->where('estatus', '=', 0)
            ->where('end','<=', $current)
            ->get();

        return view('admin.services.mecanica',compact('empresa', 'marca', 'automovil', 'user', 'alert2', 'users','seguro_alerta','tc_alerta'));
    }

    /* Trae los automoviles con el user seleccionado  */
    public function GetSubCatAgainstMainCatEdit($id){
            echo json_encode(DB::table('automovil')->where('id_user', $id)->get());
    }
    public function GetEmpreAgainstMainCatEdit($id){
            echo json_encode(DB::table('automovil')->where('id_empresa', $id)->get());
    }

    public function store_servicio(Request $request)
    {
          $validate = $this->validate($request, [
            'servicio' => 'required|max:191',
            'descripcion' => 'required|max:500',
            'garantia' => 'required|max:191',
            'vida_llantas' => 'required|max:191',
            'km_actual' => 'required|max:191',
        ]);

        $mecanica = new Mecanica;
        /* User/Auto Llantas */
        $mecanica->id_user = $request->get('id_user');
        $mecanica->id_empresa = $request->get('id_empresa');
        $mecanica->current_auto = $request->get('current_auto');
        $mecanica->current_auto2 = $request->get('current_auto2');

        /* User/Auto Banda */
        $mecanica->id_userbn = $request->get('id_userbn');
        $mecanica->id_empresabn = $request->get('id_empresabn');
        $mecanica->current_autobn2 = $request->get('current_autobn2');
        $mecanica->current_autobn = $request->get('current_autobn');

        /* User/Auto Frenos */
        $mecanica->id_userfr = $request->get('id_userfr');
        $mecanica->id_empresafr = $request->get('id_empresafr');
        $mecanica->current_autofr2 = $request->get('current_autofr2');
        $mecanica->current_autofr = $request->get('current_autofr');

        /* User/Auto aceite */
        $mecanica->id_userac = $request->get('id_userac');
        $mecanica->id_empresaac = $request->get('id_empresaac');
        $mecanica->current_autoac2 = $request->get('current_autoac2');
        $mecanica->current_autoac = $request->get('current_autoac');

        /* User/Auto afinacion */
        $mecanica->id_useraf = $request->get('id_useraf');
        $mecanica->id_empresaaf = $request->get('id_empresaaf');
        $mecanica->current_autoaf2 = $request->get('current_autoaf2');
        $mecanica->current_autoaf = $request->get('current_autoaf');

        /* User/Auto amortiguadores */
        $mecanica->id_useram = $request->get('id_useram');
        $mecanica->id_empresaam = $request->get('id_empresaam');
        $mecanica->current_autoam2 = $request->get('current_autoam2');
        $mecanica->current_autoam = $request->get('current_autoam');

        /* User/Auto bateria */
        $mecanica->id_userbt = $request->get('id_userbt');
        $mecanica->id_empresabt = $request->get('id_empresabt');
        $mecanica->current_autobt2 = $request->get('current_autobt2');
        $mecanica->current_autobt = $request->get('current_autobt');


        $mecanica->llantas_delanteras = $request->get('llantas_delanteras');
        $mecanica->llantas_traseras = $request->get('llantas_traseras');
        $mecanica->frenos_delanteras = $request->get('frenos_delanteras');
        $mecanica->frenos_traseras = $request->get('frenos_traseras');
        $mecanica->servicio = $request->get('servicio');
        $mecanica->id_marca = $request->get('id_marca');
        $mecanica->descripcion = $request->get('descripcion');
        $mecanica->garantia = $request->get('garantia');
        $mecanica->vida_llantas = $request->get('vida_llantas');
        $mecanica->km_actual = $request->get('km_actual');

        if ($request->hasFile('video')) {
    		$file=$request->file('video');
    		$file->move(public_path().'/inter-mecanica',time().".".$file->getClientOriginalExtension());
    		$mecanica->video=time().".".$file->getClientOriginalExtension();
    	}

        if ($request->hasFile('video2')) {
    		$file=$request->file('video2');
    		$file->move(public_path().'/ext-mecanica',time().".".$file->getClientOriginalExtension());
    		$mecanica->video2=time().".".$file->getClientOriginalExtension();
    	}

        /* Calendario */
        $mecanica->title = $request->get('title');
        $mecanica->color = "#2980B9";
        $mecanica->estatus = 0;
        $mecanica->check = 0;
        $mecanica->start = $request->get('start');
        $mecanica->end = $request->get('start');

        $mecanica->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->back();
    }

}
