<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\ExpDomicilio;
use Session;
use Image;

class ExpdomicilioController extends Controller
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

        $exp_domicilio = DB::table('exp_domicilio')
        ->where('id_user','=',$auto_user)
        ->where('current_auto','=',auth()->user()->current_auto)
        ->get();

        return view('exp-fisico.view-cd',compact('exp_domicilio'));
    }

    public function create(){

        return view('exp-fisico.view-cd');
    }

    public function store(Request $request){

        $validate = $this->validate($request,[
            'domicilio' => 'mimes:jpeg,bpm,jpg,png,pdf',
        ]);

        $exp_domicilio = new ExpDomicilio;

        $exp_domicilio->titulo = $request->get('titulo');

        if ($request->hasFile('domicilio')) {

            $file = $request->file('domicilio');
            $file->move(public_path() . '/exp-domicilio', time() . "." . $file->getClientOriginalExtension());
            $exp_domicilio->domicilio = time() . "." . $file->getClientOriginalExtension();

            $filepath = public_path('/exp-domicilio/' . $exp_domicilio->domicilio);

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

        $exp_domicilio->id_user = auth()->user()->id;
    	$exp_domicilio->current_auto = auth()->user()->current_auto;
//dd($exp_domicilio);
        $exp_domicilio->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-cd', compact('exp_domicilio'));
    }

        public function create_admin($id)
    {
        /* Trae los datos el auto en el que esta */
        $automovil = DB::table('automovil')
        ->where('id','=',$id)
        ->first();

        $exp_auto = $automovil->id;

        $exp_domicilio = DB::table('exp_domicilio')
        ->where('current_auto','=', $exp_auto)
        ->paginate(6);

        return view('admin.exp-fisico.view-cd-admin',compact('exp_domicilio','automovil'));
    }

    public function store_admin(Request $request,$id){

        $validate = $this->validate($request,[
            'domicilio' => 'mimes:jpeg,bpm,jpg,png,pdf',
        ]);

        $exp = new ExpDomicilio;
        $exp->titulo = $request->get('titulo');

        if ($request->hasFile('domicilio')) {

            $path = 'exp-domicilio/';
            $file = $request->file('domicilio');
            $new_image_name = 'UIMG' . date('Ymd') . uniqid() . '.jpg';
            $upload = $file->move(public_path($path), $new_image_name);
            $exp->domicilio = $new_image_name;

            $filepath = public_path('/exp-domicilio/' . $exp->domicilio);

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

       $exp->save();

       Session::flash('success', 'Se ha guardado sus datos con exito');
       return redirect()->back();
    }

    function destroy($id){
        $exp = ExpDomicilio::findOrFail($id);
        unlink(public_path('/exp-domicilio/'.$exp->domicilio));
        $exp->delete();

        Session::flash('destroy', 'Se Elimino su Factura con exito');
        return redirect()->back();

    }
}
