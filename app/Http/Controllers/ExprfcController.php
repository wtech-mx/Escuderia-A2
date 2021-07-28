<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\ExpRfc;
use Session;
use Image;

class ExprfcController extends Controller
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

        $exp_rfc = DB::table('exp_rfc')
            ->where('id_user', '=', $auto_user)
            ->where('current_auto', '=', auth()->user()->current_auto)
            ->get();

        return view('exp-fisico.view-rfc', compact('exp_rfc'));
    }

    public function create()
    {

        return view('exp-fisico.view-rfc');
    }

    public function store(Request $request)
    {
        $exp_rfc = new ExpRfc;

        $exp_rfc->titulo = $request->get('titulo');

        if ($request->hasFile('rfc')) {

            $file = $request->file('rfc');
            $file->move(public_path() . '/exp-rfc', time() . "." . $file->getClientOriginalExtension());
            $exp_rfc->rfc = time() . "." . $file->getClientOriginalExtension();

            $filepath = public_path('/exp-rfc/' . $exp_rfc->rfc);

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

        $exp_rfc->id_user = auth()->user()->id;
        $exp_rfc->current_auto = auth()->user()->current_auto;

        $exp_rfc->save();

        Session::flash('success', 'Se ha guardado sus datos con exito');

        return redirect()->route('index.exp-rfc', compact('exp_rfc'));
    }

    public function create_admin($id)
    {
        /* Trae los datos el auto en el que esta */
        $automovil = DB::table('automovil')
            ->where('id', '=', $id)
            ->first();

        $exp_auto = $automovil->id;

        $exp_rfc = DB::table('exp_rfc')
            ->where('current_auto', '=', $exp_auto)
            ->paginate(6);

        return view('admin.exp-fisico.view-rfc-admin', compact('exp_rfc', 'automovil'));
    }

    public function store_admin(Request $request, $id)
    {

        $validate = $this->validate($request, [
            'rfc' => 'mimes:jpeg,bpm,jpg,png,pdf',
        ]);

        $exp = new ExpRfc;

        $exp->titulo = $request->get('titulo');

        if ($request->hasFile('rfc')) {

            $path = 'exp-rfc/';
            $file = $request->file('rfc');
            $new_image_name = 'UIMG' . date('Ymd') . uniqid() . '.jpg';
            $upload = $file->move(public_path($path), $new_image_name);
            $exp->rfc = $new_image_name;

            $filepath = public_path('/exp-rfc/' . $exp->rfc);

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

    function destroy($id)
    {
        $exp = ExpRfc::findOrFail($id);
        unlink(public_path('/exp-rfc/' . $exp->rfc));
        $exp->delete();

        Session::flash('destroy', 'Se Elimino su Factura con exito');
        return redirect()->back();
    }
}
