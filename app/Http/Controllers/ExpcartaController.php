<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\ExpCarta;
use Session;
use Carbon\Carbon;
use App\Models\Alertas;
use Image;

class ExpcartaController extends Controller
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

        $auto_user = $user->{'id'};

        $exp_carta = DB::table('exp_carta')
            ->where('id_user', '=', $auto_user)
            ->where('current_auto', '=', auth()->user()->current_auto)
            ->get();

        return view('exp-fisico.view-cr', compact('exp_carta'));
    }

    public function create()
    {
        $users = DB::table('users')
            ->get();
        // obtener la hora actual  - 2015-12-19 10:10:54
        $current = Carbon::now()->toDateTimeString();
        $alert2 = Alertas::where('id_user', '=', auth()->user()->id)
            ->where('start', '<=', $current)
            ->where('estatus', '=', 0)
            ->get();

        return view('exp-fisico.view-cr', 'alert2', 'user');
    }

    public function store(Request $request)
    {

        $validate = $this->validate($request, [
            'carta' => 'mimes:jpeg,bpm,jpg,png,pdf',
        ]);

        $exp_carta = new ExpCarta;

        $exp_carta->titulo = $request->get('titulo');

        if ($request->hasFile('carta')) {

            $file = $request->file('carta');
            $file->move(public_path() . '/exp-carta', time() . "." . $file->getClientOriginalExtension());
            $exp_carta->carta = time() . "." . $file->getClientOriginalExtension();

            $filepath = public_path('/exp-carta/' . $exp_carta->carta);

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

    public function create_admin($id)
    {
        /* Trae los datos el auto en el que esta */
        $automovil = DB::table('automovil')
            ->where('id', '=', $id)
            ->first();

        $exp_auto = $automovil->id;

        $exp_carta = DB::table('exp_carta')
            ->where('current_auto', '=', $exp_auto)
            ->get();

        return view('admin.exp-fisico.view-cr-admin', compact('exp_carta', 'automovil'));
    }

    public function store_admin(Request $request, $id)
    {

        $validate = $this->validate($request, [
            'carta' => 'mimes:jpeg,bpm,jpg,png,pdf',
        ]);

        $exp = new ExpCarta;
        $exp->titulo = $request->get('titulo');

        if ($request->hasFile('carta')) {

            $file = $request->file('carta');
            $file->move(public_path() . '/exp-carta', time() . "." . $file->getClientOriginalExtension());
            $exp->carta = time() . "." . $file->getClientOriginalExtension();

            $filepath = public_path('/exp-carta/' . $exp->carta);

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
            ->where('id', '=', $id)
            ->first();

        $exp->current_auto = $automovil->id;

        $exp->id_user = $automovil->id_user;

        $exp->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');
        return redirect()->back();
    }

    function destroy($id)
    {
        $exp = ExpCarta::findOrFail($id);
        unlink(public_path('/exp-carta/' . $exp->carta));
        $exp->delete();

        Session::flash('destroy', 'Se Elimino su Factura con exito');
        return redirect()->back();
    }
}
