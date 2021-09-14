<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Automovil;
use DB;
use App\Models\ExpFactura;
use App\Models\ExpCarta;
use App\Models\ExpDomicilio;
use App\Models\ExpIne;
use App\Models\ExpPlacas;
use App\Models\ExpPoliza;
use App\Models\ExpReemplacamiento;
use App\Models\ExpRfc;
use App\Models\ExpTc;
use App\Models\ExpTenencias;
use App\Models\ExpCertificado;
use App\Models\ExpInventario;
use Illuminate\Support\Facades\Storage;
use Session;

class ExpedientesController extends Controller
{

    public function index()
    {
        $user = DB::table('users')
            ->where('id', '=', auth()->user()->id)
            ->first();

        $auto_user = $user->{'id'};
        $automovil = auth()->user()->current_auto;

        $automovile = DB::table('automovil')
        ->where('id_user','=',$auto_user)
        ->get();

        $exp_factura = DB::table('exp_facturas')
            ->where('id_user', '=', $auto_user)
            ->where('current_auto', '=', auth()->user()->current_auto)
            ->get();

        $exp_placas = DB::table('exp_placas')
            ->where('id_user', '=', $auto_user)
            ->where('current_auto', '=', auth()->user()->current_auto)
            ->get();

        $exp_carta = DB::table('exp_carta')
            ->where('id_user', '=', $auto_user)
            ->where('current_auto', '=', auth()->user()->current_auto)
            ->get();

        $exp_certificado = DB::table('exp_certificado')
            ->where('id_user', '=', $auto_user)
            ->where('current_auto', '=', auth()->user()->current_auto)
            ->get();

        $exp_domicilio = DB::table('exp_domicilio')
            ->where('id_user', '=', $auto_user)
            ->where('current_auto', '=', auth()->user()->current_auto)
            ->get();

        $exp_ine = DB::table('exp_ine')
            ->where('id_user', '=', $auto_user)
            ->where('current_auto', '=', auth()->user()->current_auto)
            ->get();

        $exp_poliza = DB::table('exp_poliza')
            ->where('id_user', '=', $auto_user)
            ->where('current_auto', '=', auth()->user()->current_auto)
            ->get();

        $exp_reemplacamiento = DB::table('exp_reemplacamiento')
            ->where('id_user', '=', $auto_user)
            ->where('current_auto', '=', auth()->user()->current_auto)
            ->get();

        $exp_rfc = DB::table('exp_rfc')
            ->where('id_user', '=', $auto_user)
            ->where('current_auto', '=', auth()->user()->current_auto)
            ->get();

        $exp_tc = DB::table('exp_tc')
            ->where('id_user', '=', $auto_user)
            ->where('current_auto', '=', auth()->user()->current_auto)
            ->get();

        $exp_tenencias = DB::table('exp_tenencias')
            ->where('id_user', '=', $auto_user)
            ->where('current_auto', '=', auth()->user()->current_auto)
            ->get();

        $exp_inventario = DB::table('exp_inventario')
            ->where('id_user', '=', $auto_user)
            ->where('current_auto', '=', auth()->user()->current_auto)
            ->get();

        return view('exp-fisico.view', compact(
            'exp_factura',
            'exp_placas',
            'exp_carta',
            'exp_certificado',
            'exp_domicilio',
            'exp_ine',
            'exp_poliza',
            'exp_reemplacamiento',
            'exp_rfc',
            'exp_tc',
            'exp_tenencias',
            'exp_inventario',
            'automovil',
            'user',
            'automovile'
        ));
    }

    public function create()
    {
        $user = DB::table('users')
            ->where('role', '=', '0')
            ->get();

        return view('exp-fisico.create', compact('user'));
    }

    public function store(Request $request)
    {
        $numero = $request->get('numero');
        $automovil = auth()->user()->current_auto;
        switch ($numero) {
            case ($numero == 1):
                $ruta = '/exp-factura';
                $new = new ExpFactura;
                break;
            case ($numero == 2):
                $ruta = '/exp-placa';
                $new = new ExpPlacas;
                break;
            case ($numero == 3):
                $ruta = '/exp-domicilio';
                $new = new ExpDomicilio;
                break;
            case ($numero == 4):
                $ruta = '/exp-carta';
                $new = new ExpCarta;
                break;
            case ($numero == 5):
                $ruta = '/exp-ine';
                $new = new ExpIne;
                break;
            case ($numero == 6):
                $ruta = '/exp-poliza';
                $new = new ExpPoliza;
                break;
            case ($numero == 7):
                $ruta = '/exp-reemplacamiento';
                $new = new ExpReemplacamiento;
                break;
            case ($numero == 8):
                $ruta = '/exp-rfc';
                $new = new ExpRfc;
                break;
            case ($numero == 9):
                $ruta = '/exp-tc';
                $new = new ExpTc;
                break;
            case ($numero == 10):
                $ruta = '/exp-tenencia';
                $new = new ExpTenencias;
                break;
            case ($numero == 11):
                $ruta = '/exp-certificado';
                $new = new ExpCertificado;
                break;
            case ($numero == 12):
                $ruta = '/exp-inventario';
                $new = new ExpInventario;
                break;
        }

        $exp = $new;
        $exp->titulo = $request->get('titulo');

        if ($request->hasFile('img')) {

            //dd($request->hasFile('img'));

            $file = $request->file('img');
            $file->move(public_path() . $ruta . '/', time() . "." . $file->getClientOriginalExtension());
            $exp->img = time() . "." . $file->getClientOriginalExtension();

            $filepath = public_path($ruta . '/' . $exp->img);

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

        $exp->id_user = auth()->user()->id;
        $exp->current_auto = auth()->user()->current_auto;

        $exp->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->back();
        //return response()->json(['success'=>'Successfully uploaded.']);
    }

    public function upload_user( Request $request, $id)
    {
        $file = $request->file('file');

        $numero = $request->get('numero');
        $automovil = DB::table('automovil')
            ->where('id', '=', $id)
            ->first();
        switch ($numero) {
            case ($numero == 1):
                $ruta = '/exp-factura';
                $new = new ExpFactura;
                break;
            case ($numero == 2):
                $ruta = '/exp-placa';
                $new = new ExpPlacas;
                break;
            case ($numero == 3):
                $ruta = '/exp-domicilio';
                $new = new ExpDomicilio;
                break;
            case ($numero == 4):
                $ruta = '/exp-carta';
                $new = new ExpCarta;
                break;
            case ($numero == 5):
                $ruta = '/exp-ine';
                $new = new ExpIne;
                break;
            case ($numero == 6):
                $ruta = '/exp-poliza';
                $new = new ExpPoliza;
                break;
            case ($numero == 7):
                $ruta = '/exp-reemplacamiento';
                $new = new ExpReemplacamiento;
                break;
            case ($numero == 8):
                $ruta = '/exp-rfc';
                $new = new ExpRfc;
                break;
            case ($numero == 9):
                $ruta = '/exp-tc';
                $new = new ExpTc;
                break;
            case ($numero == 10):
                $ruta = '/exp-tenencia';
                $new = new ExpTenencias;
                break;
            case ($numero == 11):
                $ruta = '/exp-certificado';
                $new = new ExpCertificado;
                break;
            case ($numero == 12):
                $ruta = '/exp-inventario';
                $new = new ExpInventario;
                break;
        }

        $exp = $new;
        $exp->titulo = $request->get('titulo');

        if ($request->file('file')) {

            $file = $request->file('file');
            $file->move(public_path() . $ruta . '/', time() . "." . $file->getClientOriginalExtension());
            $exp->img = time() . "." . $file->getClientOriginalExtension();

            $filepath = public_path($ruta . '/' . $exp->img);

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

        $exp->current_auto = $automovil->id;
        $exp->id_user = $automovil->id_user;
        $exp->id_empresa = $automovil->id_empresa;

        $exp->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        // return redirect()->back();
        return response()->json(['success' => 'Successfully uploaded.']);
    }


    /*|--------------------------------------------------------------------------
    |Create Doc Admin_Admin
    |--------------------------------------------------------------------------*/
    function index_admin()
    {
        $automovil = Automovil::where('id_empresa', '=', NULL)
            ->get();

        $automovil2 = Automovil::where('id_user', '=', NULL)
            ->get();

        if(auth()->user()->empresa == 1){
            if(auth()->user()->id_sector == NULL){
                $automovil_empresa = Automovil::
                where('id_empresa', '=', auth()->user()->id)
                ->get();
            }else{
                $automovil_empresa = Automovil::
                where('id_sector', '=', auth()->user()->id_sector)
                ->get();
            }
            return view('admin.exp-fisico.view-exp-fisico-admin', compact('automovil', 'automovil2', 'automovil_empresa'));
        }

        return view('admin.exp-fisico.view-exp-fisico-admin', compact('automovil', 'automovil2'));
    }

    public function create_admin($id)
    {
        /* Trae los datos el auto en el que esta */
        $automovil = DB::table('automovil')
            ->where('id', '=', $id)
            ->first();

        $user = DB::table('users')
            ->where('role', '=', '0')
            ->get();

        $exp_factura = DB::table('exp_facturas')
            ->where('current_auto', '=', $automovil->id)
            ->get();

        $exp_placas = DB::table('exp_placas')
            ->where('current_auto', '=', $automovil->id)
            ->get();

        $exp_carta = DB::table('exp_carta')
            ->where('current_auto', '=', $automovil->id)
            ->get();

        $exp_certificado = DB::table('exp_certificado')
            ->where('current_auto', '=', $automovil->id)
            ->get();

        $exp_domicilio = DB::table('exp_domicilio')
            ->where('current_auto', '=', $automovil->id)
            ->get();

        $exp_ine = DB::table('exp_ine')
            ->where('current_auto', '=', $automovil->id)
            ->get();

        $exp_poliza = DB::table('exp_poliza')
            ->where('current_auto', '=', $automovil->id)
            ->get();

        $exp_reemplacamiento = DB::table('exp_reemplacamiento')
            ->where('current_auto', '=', $automovil->id)
            ->get();

        $exp_rfc = DB::table('exp_rfc')
            ->where('current_auto', '=', $automovil->id)
            ->get();

        $exp_tc = DB::table('exp_tc')
            ->where('current_auto', '=', $automovil->id)
            ->get();

        $exp_tenencias = DB::table('exp_tenencias')
            ->where('current_auto', '=', $automovil->id)
            ->get();

        $exp_inventario = DB::table('exp_inventario')
            ->where('current_auto', '=', $automovil->id)
            ->get();

        return view('admin.exp-fisico.view', compact(
            'exp_factura',
            'exp_placas',
            'exp_carta',
            'exp_certificado',
            'exp_domicilio',
            'exp_ine',
            'exp_poliza',
            'exp_reemplacamiento',
            'exp_rfc',
            'exp_tc',
            'exp_tenencias',
            'exp_inventario',
            'automovil',
            'user'
        ));
    }

    public function store_admin(Request $request, $id)
    {
        $numero = $request->get('numero');
        $automovil = DB::table('automovil')
            ->where('id', '=', $id)
            ->first();

        switch ($numero) {
            case ($numero == 1):
                $ruta = '/exp-factura';
                $new = new ExpFactura;
                break;
            case ($numero == 2):
                $ruta = '/exp-placa';
                $new = new ExpPlacas;
                break;
            case ($numero == 3):
                $ruta = '/exp-domicilio';
                $new = new ExpDomicilio;
                break;
            case ($numero == 4):
                $ruta = '/exp-carta';
                $new = new ExpCarta;
                break;
            case ($numero == 5):
                $ruta = '/exp-ine';
                $new = new ExpIne;
                break;
            case ($numero == 6):
                $ruta = '/exp-poliza';
                $new = new ExpPoliza;
                break;
            case ($numero == 7):
                $ruta = '/exp-reemplacamiento';
                $new = new ExpReemplacamiento;
                break;
            case ($numero == 8):
                $ruta = '/exp-rfc';
                $new = new ExpRfc;
                break;
            case ($numero == 9):
                $ruta = '/exp-tc';
                $new = new ExpTc;
                break;
            case ($numero == 10):
                $ruta = '/exp-tenencia';
                $new = new ExpTenencias;
                break;
            case ($numero == 11):
                $ruta = '/exp-certificado';
                $new = new ExpCertificado;
                break;
            case ($numero == 12):
                $ruta = '/exp-inventario';
                $new = new ExpInventario;
                break;
        }

        $exp = $new;

        $Y = date('Y') ;
        $M = date('m');
        $D = date('d') ;
        $Fecha = $Y."-".$M."-".$D;

        $exp->titulo = $request->get('titulo');

        if ($request->hasFile('img')) {

            $file = $request->file('img');
            $file->move(public_path() . $ruta . '/', time() . "." . $file->getClientOriginalExtension());
            $exp->img = time() . "." . $file->getClientOriginalExtension();

            $filepath = public_path($ruta . '/' . $exp->img);

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

        $exp->current_auto = $automovil->id;
        $exp->id_user = $automovil->id_user;
        $exp->id_empresa = $automovil->id_empresa;



        $exp->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        // return redirect()->back();
        return response()->json(['success' => 'Successfully uploaded.']);
    }

    public function upload( Request $request, $id)
    {
        $file = $request->file('file');

        $numero = $request->get('numero');
        $automovil = DB::table('automovil')
            ->where('id', '=', $id)
            ->first();
        switch ($numero) {
            case ($numero == 1):
                $ruta = '/exp-factura';
                $new = new ExpFactura;
                break;
            case ($numero == 2):
                $ruta = '/exp-placa';
                $new = new ExpPlacas;
                break;
            case ($numero == 3):
                $ruta = '/exp-domicilio';
                $new = new ExpDomicilio;
                break;
            case ($numero == 4):
                $ruta = '/exp-carta';
                $new = new ExpCarta;
                break;
            case ($numero == 5):
                $ruta = '/exp-ine';
                $new = new ExpIne;
                break;
            case ($numero == 6):
                $ruta = '/exp-poliza';
                $new = new ExpPoliza;
                break;
            case ($numero == 7):
                $ruta = '/exp-reemplacamiento';
                $new = new ExpReemplacamiento;
                break;
            case ($numero == 8):
                $ruta = '/exp-rfc';
                $new = new ExpRfc;
                break;
            case ($numero == 9):
                $ruta = '/exp-tc';
                $new = new ExpTc;
                break;
            case ($numero == 10):
                $ruta = '/exp-tenencia';
                $new = new ExpTenencias;
                break;
            case ($numero == 11):
                $ruta = '/exp-certificado';
                $new = new ExpCertificado;
                break;
            case ($numero == 12):
                $ruta = '/exp-inventario';
                $new = new ExpInventario;
                break;
        }

        $exp = $new;
        $exp->titulo = $request->get('titulo');

        if ($request->file('file')) {

            $file = $request->file('file');
            $file->move(public_path() . $ruta . '/', time() . "." . $file->getClientOriginalExtension());
            $exp->img = time() . "." . $file->getClientOriginalExtension();

            $filepath = public_path($ruta . '/' . $exp->img);

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

        $exp->current_auto = $automovil->id;
        $exp->id_user = $automovil->id_user;
        $exp->id_empresa = $automovil->id_empresa;

        $exp->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        // return redirect()->back();
        return response()->json(['success' => 'Successfully uploaded.']);
    }


    public function destroy(Request $request, $id)
    {

        $numero = $request->get('numero');
        switch ($numero) {
            case ($numero == 1):
                $ruta = '/exp-factura';
                $new = ExpFactura::find($id);
                break;
            case ($numero == 2):
                $ruta = '/exp-placa';
                $new = ExpPlacas::findOrFail($id);
                break;
            case ($numero == 3):
                $ruta = '/exp-domicilio';
                $new = ExpDomicilio::findOrFail($id);
                break;
            case ($numero == 4):
                $ruta = '/exp-carta';
                $new = ExpCarta::findOrFail($id);
                break;
            case ($numero == 5):
                $ruta = '/exp-ine';
                $new = ExpIne::findOrFail($id);
                break;
            case ($numero == 6):
                $ruta = '/exp-poliza';
                $new = ExpPoliza::findOrFail($id);
                break;
            case ($numero == 7):
                $ruta = '/exp-reemplacamiento';
                $new = ExpReemplacamiento::findOrFail($id);
                break;
            case ($numero == 8):
                $ruta = '/exp-rfc';
                $new = ExpRfc::findOrFail($id);
                break;
            case ($numero == 9):
                $ruta = '/exp-tc';
                $new = ExpTc::findOrFail($id);
                break;
            case ($numero == 10):
                $ruta = '/exp-tenencia';
                $new = ExpTenencias::findOrFail($id);
                break;
            case ($numero == 11):
                $ruta = '/exp-certificado';
                $new = ExpCertificado::findOrFail($id);
                break;
            case ($numero == 12):
                $ruta = '/exp-inventario';
                $new = ExpInventario::findOrFail($id);
                break;
        }

        $exp = $new;
        unlink(public_path($ruta . '/' . $exp->img));

        $exp->delete();

        Session::flash('destroy', 'Se Elimino su Foto con exito');
        return redirect()->back();
    }
}
