<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\ExpTc;
use App\Models\TarjetaCirculacion;
use Session;
use Image;

class ExptcController extends Controller
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

        $exp_tc = DB::table('exp_tc')
            ->where('id_user', '=', $auto_user)
            ->where('current_auto', '=', auth()->user()->current_auto)
            ->get();

        $img_tc = DB::table('exp_tc')
            ->where('id_user', '=', $auto_user)
            ->where('id_tc', '=', auth()->user()->current_auto)
            ->get();

        $img = TarjetaCirculacion::where('current_auto', '=', $user->current_auto)->get();

        return view('exp-fisico.view-tc', compact('exp_tc', 'img', 'img_tc'));
    }

    public function create()
    {

        return view('exp-fisico.view-tc');
    }

    public function store(Request $request)
    {

        $validate = $this->validate($request, [
            'tc' => 'mimes:jpeg,bpm,jpg,png,pdf',
        ]);

        $exp_tc = new ExpTc;

        $exp_tc->titulo = $request->get('titulo');

        if ($request->hasFile('tc')) {

            $file = $request->file('tc');
            $file->move(public_path() . '/exp-tc', time() . "." . $file->getClientOriginalExtension());
            $exp_tc->tc = time() . "." . $file->getClientOriginalExtension();

            $filepath = public_path('/exp-tc/' . $exp_tc->tc);

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

        $exp_tc->id_user = auth()->user()->id;
        $exp_tc->current_auto = auth()->user()->current_auto;

        $exp_tc->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-tc', compact('exp_tc'));
    }
    /*|--------------------------------------------------------------------------
|Create TC Admin_Admin
|--------------------------------------------------------------------------*/

    public function create_admin($id)
    {
        /* Trae los datos el auto en el que esta */
        $automovil = DB::table('automovil')
            ->where('id', '=', $id)
            ->first();

        $exp_tc = DB::table('exp_tc')
            ->where('current_auto', '=', $automovil->id)
            ->paginate(6);

        $img_tc = DB::table('exp_tc')
            ->where('current_auto', '=', $automovil->id)
            ->get();

        return view('admin.exp-fisico.view-tc-admin', compact('exp_tc', 'automovil', 'img_tc'));
    }

    public function store_admin(Request $request, $id)
    {

        $exp = new ExpTc;
        $exp->titulo = $request->get('titulo');

        if ($request->hasFile('tc')) {

            $path = 'exp-tc/';
            $file = $request->file('tc');
            $new_image_name = 'UIMG' . date('Ymd') . uniqid() . '.jpg';
            $upload = $file->move(public_path($path), $new_image_name);
            $exp->tc = $new_image_name;

            $filepath = public_path('/exp-tc/' . $exp->tc);

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
        $exp = ExpTc::findOrFail($id);
        unlink(public_path('/exp-tc/' . $exp->tc));
        $exp->delete();

        Session::flash('destroy', 'Se Elimino su Factura con exito');
        return redirect()->back();
    }
}
