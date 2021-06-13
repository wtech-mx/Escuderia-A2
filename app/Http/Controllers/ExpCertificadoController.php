<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpCertificado;
use Session;
use DB;
use Image;

class ExpCertificadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('pagespeed');
    }

    function index()
    {

        $user = DB::table('users')
            ->where('id', '=', auth()->user()->id)
            ->first();

        $exp_certificado = DB::table('exp_certificado')
            ->where('id_user', '=', $user->id)
            ->where('current_auto', '=', auth()->user()->current_auto)
            ->get();

        return view('exp-fisico.view-certificado', compact('exp_certificado'));
    }

    public function create()
    {

        return view('exp-fisico.view-certificado');
    }

    public function store(Request $request)
    {

        $validate = $this->validate($request, [
            'certificado' => 'mimes:jpeg,bpm,jpg,png,pdf',
        ]);

        $exp_certificados = new ExpCertificado;

        $exp_certificados->titulo = $request->get('titulo');

        if ($request->hasFile('certificado')) {

            $file = $request->file('certificado');
            $file->move(public_path() . '/exp-certificado', time() . "." . $file->getClientOriginalExtension());
            $exp_certificados->certificado = time() . "." . $file->getClientOriginalExtension();

            $filepath = public_path('/exp-certificado/' . $exp_certificados->certificado);

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

        $exp_certificados->id_user = auth()->user()->id;
        $exp_certificados->current_auto = auth()->user()->current_auto;

        $exp_certificados->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-certificado', compact('exp_certificados'));
    }

    function destroy($id)
    {
        $exp_certificados = ExpCertificado::findOrFail($id);
        unlink(public_path('/exp-certificado/' . $exp_certificados->certificado));
        $exp_certificados->delete();

        Session::flash('destroy', 'Se Elimino su Factura con exito');
        return redirect()->back();
    }
    /*|--------------------------------------------------------------------------
|Exp Certificado Admin
|--------------------------------------------------------------------------*/

    public function create_admin($id)
    {
        /* Trae los datos el auto en el que esta */
        $automovil = DB::table('automovil')
            ->where('id', '=', $id)
            ->first();

        $exp_certificados = DB::table('exp_certificado')
            ->where('current_auto', '=', $automovil->id)
            ->paginate(6);

        return view('admin.exp-fisico.view-certificado-admin', compact('exp_certificados', 'automovil'));
    }

    public function store_admin(Request $request, $id)
    {

        $exp = new ExpCertificado;
        $exp->titulo = $request->get('titulo');

        if ($request->hasFile('certificado')) {

            $path = 'exp-certificado/';
            $file = $request->file('certificado');
            $new_image_name = 'UIMG' . date('Ymd') . uniqid() . '.jpg';
            $upload = $file->move(public_path($path), $new_image_name);
            $exp->certificado = $new_image_name;

            $filepath = public_path('/exp-certificado/' . $exp->certificado);

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
}
