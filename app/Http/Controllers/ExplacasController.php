<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\ExpPlacas;
use Session;
use Image;
class ExplacasController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('pagespeed');
    }

    function index(){

        $user = DB::table('users')
        ->where('id','=',auth()->user()->id)
        ->first();

        $auto_user = $user->{'id'};

        $exp_placas = DB::table('exp_placas')
        ->where('id_user','=',$auto_user)
        ->where('current_auto','=',auth()->user()->current_auto)
        ->get();

        return view('exp-fisico.view-bp',compact('exp_placas'));
    }

    public function create(){

        return view('exp-fisico.view-bp');
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'placa' => 'mimes:jpeg,bpm,jpg,png,pdf',
        ]);

        $exp_placas = new ExpPlacas;

        $exp_placas->titulo = $request->get('titulo');

        if ($request->hasFile('placa')) {

            $file = $request->file('placa');
            $file->move(public_path() . '/exp-placa', time() . "." . $file->getClientOriginalExtension());
            $exp_placas->placa = time() . "." . $file->getClientOriginalExtension();

            $filepath = public_path('/exp-placa/' . $exp_placas->placa);

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

        $exp_placas->id_user = auth()->user()->id;
    	$exp_placas->current_auto = auth()->user()->current_auto;

        $exp_placas->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-bp', compact('exp_placas'));
    }

     function destroy($id){
        $exp_placas = ExpPlacas::findOrFail($id);
        unlink(public_path('/exp-placa/'.$exp_placas->placa));
        $exp_placas->delete();

        Session::flash('destroy', 'Se Elimino su Factura con exito');
        return redirect()->back();

    }
/*|--------------------------------------------------------------------------
|Exp Placas Admin
|--------------------------------------------------------------------------*/

    public function create_admin($id)
    {
        /* Trae los datos el auto en el que esta */
        $automovil = DB::table('automovil')
        ->where('id','=',$id)
        ->first();

        $exp_auto = $automovil->id;

        $exp_placas = DB::table('exp_placas')
        ->where('current_auto','=', $exp_auto)
        ->paginate(6);

        return view('admin.exp-fisico.view-bp-admin',compact('exp_placas','automovil'));
    }

    public function store_admin(Request $request,$id){

        $validate = $this->validate($request,[
            'placa' => 'mimes:jpeg,bpm,jpg,png,pdf',
        ]);

        $exp = new ExpPlacas;

        $exp->titulo = $request->get('titulo');

        if ($request->hasFile('placa')) {

            $file = $request->file('placa');
            $file->move(public_path() . '/exp-placa', time() . "." . $file->getClientOriginalExtension());
            $exp->placa = time() . "." . $file->getClientOriginalExtension();

            $filepath = public_path('/exp-placa/' . $exp->placa);

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
    	/* Compara el auto que se selecciono con la db */
        $automovil = DB::table('automovil')
        ->where('id','=',$id)
        ->first();

        $exp->current_auto = $automovil->id;
        $exp->id_user = $automovil->id_user;

        $exp->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->back();
    }

}
