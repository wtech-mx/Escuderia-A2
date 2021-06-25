<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\ExpTenencias;
use App\Models\TarjetaCirculacion;
use Session;
use Image;

class ExptenenciasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {

        $user = DB::table('users')
            ->where('id', '=', auth()->user()->id)
            ->first();

        $auto_user = $user->{'id'};

        $exp_tenencias = DB::table('exp_tenencias')
            ->where('id_user', '=', $auto_user)
            ->where('current_auto', '=', auth()->user()->current_auto)
            ->get();

        return view('exp-fisico.view-tenencia', compact('exp_tenencias'));
    }

    public function create()
    {

        return view('exp-fisico.view-tenencia');
    }

    public function store(Request $request)
    {

        $validate = $this->validate($request, [
            'tenencia' => 'mimes:jpeg,bpm,jpg,png,pdf',
        ]);

        $exp_tenencias = new ExpTenencias;
        $exp_tenencias->titulo = $request->get('titulo');

        if ($request->hasFile('tenencia')) {

            $file = $request->file('tenencia');
            $file->move(public_path() . '/exp-tenencia', time() . "." . $file->getClientOriginalExtension());
            $exp_tenencias->tenencia = time() . "." . $file->getClientOriginalExtension();

            $filepath = public_path('/exp-tenencia/' . $exp_tenencias->tenencia);

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

        $exp_tenencias->id_user = auth()->user()->id;
        $exp_tenencias->current_auto = auth()->user()->current_auto;

        $exp_tenencias->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-tenencias', compact('exp_tenencias'));
    }

    public function create_admin($id)
    {
        /* Trae los datos el auto en el que esta */
        $automovil = DB::table('automovil')
            ->where('id', '=', $id)
            ->first();

        $exp_auto = $automovil->id;

        $exp_tenencias = DB::table('exp_tenencias')
            ->where('current_auto', '=', $exp_auto)
            ->paginate(6);


        return view('admin.exp-fisico.view-tenencia-admin', compact('exp_tenencias', 'automovil'));
    }

    public function store_admin(Request $request, $id)
    {

        $exp = new ExpTenencias;
        $exp->titulo = $request->get('titulo');

        if ($request->hasFile('tenencia')) {

            $path = 'exp-tenencia/';
            $file = $request->file('tenencia');
            $new_image_name = 'UIMG' . date('Ymd') . uniqid() . '.jpg';
            $upload = $file->move(public_path($path), $new_image_name);
            $exp->tenencia = $new_image_name;

            $filepath = public_path('/exp-tenencia/' . $exp->tenencia);

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

    function destroy($id)
    {
        $exp = ExpTenencias::findOrFail($id);
        unlink(public_path('/exp-tenencia/' . $exp->tenencia));
        $exp->delete();

        Session::flash('destroy', 'Se Elimino su Factura con exito');
        return redirect()->back();
    }
}
