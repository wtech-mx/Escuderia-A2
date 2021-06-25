<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\ExpReemplacamiento;
use Session;
use Carbon\Carbon;
use App\Models\Alertas;
use App\Models\Seguros;
use App\Models\TarjetaCirculacion;
use Image;

class ExpreemplacaminetoController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

     function index(){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $auto_user = $user->{'id'};

        $exp_reemplacamiento = DB::table('exp_reemplacamiento')
        ->where('id_user','=',$auto_user)
        ->where('current_auto','=',auth()->user()->current_auto)
        ->get();

        return view('exp-fisico.view-reemplacamiento',compact('exp_reemplacamiento'));
    }

    public function create(){

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

        return view('exp-fisico.view-reemplacamiento', compact('alert2', 'seguro_alerta','tc_alerta'));
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'reemplacamiento' => 'mimes:jpeg,bpm,jpg,png,pdf',
        ]);

        $exp_reemplacamiento = new ExpReemplacamiento;

        $exp_reemplacamiento->titulo = $request->get('titulo');

        if ($request->hasFile('reemplacamiento')) {

            $file = $request->file('reemplacamiento');
            $file->move(public_path() . '/exp-reemplacamiento', time() . "." . $file->getClientOriginalExtension());
            $exp_reemplacamiento->reemplacamiento = time() . "." . $file->getClientOriginalExtension();

            $filepath = public_path('/exp-reemplacamiento/' . $exp_reemplacamiento->reemplacamiento);

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

        $exp_reemplacamiento->id_user = auth()->user()->id;
    	$exp_reemplacamiento->current_auto = auth()->user()->current_auto;

        $exp_reemplacamiento->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-reemplacamiento', compact('exp_reemplacamiento'));
    }

        public function create_admin($id)
    {
        /* Trae los datos el auto en el que esta */
        $automovil = DB::table('automovil')
        ->where('id','=',$id)
        ->first();

        $exp_auto = $automovil->id;

        $exp_reemplacamiento = DB::table('exp_reemplacamiento')
        ->where('current_auto','=', $exp_auto)
        ->paginate(6);

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

        return view('admin.exp-fisico.view-reemplacamiento-admin',compact('exp_reemplacamiento','automovil', 'alert2','seguro_alerta','tc_alerta'));
    }

    public function store_admin(Request $request,$id){

        $validate = $this->validate($request,[
            'reemplacamiento' => 'mimes:jpeg,bpm,jpg,png,pdf',
        ]);

        $exp = new ExpReemplacamiento;

        $exp->titulo = $request->get('titulo');

        if ($request->hasFile('reemplacamiento')) {

            $path = 'exp-reemplacamiento/';
            $file = $request->file('reemplacamiento');
            $new_image_name = 'UIMG' . date('Ymd') . uniqid() . '.jpg';
            $upload = $file->move(public_path($path), $new_image_name);
            $exp->reemplacamiento = $new_image_name;

            $filepath = public_path('/exp-reemplacamiento/' . $exp->reemplacamiento);

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
           $automovil = DB::table('automovil')
           ->where('id', '=', $id)
           ->first();
       $exp->current_auto = $automovil->id;
       $exp->id_user = $automovil->id_user;
       $exp->id_empresa = $automovil->id_empresa;

       if ($exp->save()) {
           Session::flash('success', 'Se ha guardado sus datos con exito');
           return response()->json([
               'status' => 1,
               'success' => true,
               'msg' => 'La imagen ha sido recortada con éxito.'
           ]);

           //                return redirect()->back();
       } else {
           return response()->json(['status' => 0, 'msg' => 'Algo salió mal, inténtalo de nuevo más tarde.']);
       }
    }

     function destroy($id){
        $exp = ExpReemplacamiento::findOrFail($id);
        unlink(public_path('/exp-reemplacamiento/'.$exp->reemplacamiento));
        $exp->delete();

        Session::flash('destroy', 'Se Elimino su Factura con exito');
        return redirect()->back();

    }
}
